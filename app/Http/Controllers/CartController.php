<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;

class CartController extends Controller
{
    // lay du lieu gio hang tu tai khoan

    public function getcart()
    {      
        if(isset($_COOKIE['id'])){
        $products = DB::table('traicay')
        ->join('giohang', 'traicay.MaTraiCay', '=', 'giohang.MaSanPham')
        ->where('MaTaiKhoan',$_COOKIE['id'])
        ->select('traicay.*', 'giohang.SoLuong')
        ->get();
        return view("cart",compact('products'),['total'=>$this->gettotal(),'bill'=>$this->get_historyBill()]);
        }
        else 
        {
            $products = DB::table('traicay')->whereIn('MaTraiCay',session()->get('cart',[]))->get();
           $sl=session()->get('sl',[]);
           return view("cart",compact('products','sl'),['total'=>$this->gettotal(),'bill'=>$this->get_historyBill()]);
        }
    }
  //xoa toan bo san pham khoi gio hang
    public function xoatoanbo()
    {
        if(isset($_COOKIE['id']))
        {  
               DB::table('giohang')
                ->where('MaTaiKhoan',$_COOKIE['id'])
                ->delete();
        }
        else{
            session()->forget('cart');
            session()->forget('sl');
        }
    }
 //them 1 san pham vao gio hang
    public function addcart($id)
    { 
        if(isset($_COOKIE['id']))
        {
            $cart= DB::table('giohang')->where('MaTaiKhoan',$_COOKIE['id'])->where('MaSanPham', $id)->select('*')->get();
            if($cart->count()>0)
            {
                DB::table('giohang')->where('MaTaiKhoan',$_COOKIE['id'])->where('MaSanPham', $id)->increment('SoLuong', 1);
            }
             else
              {
                DB::table('giohang')->insert(
                    array(
                            'MaGioHang' => (DB::table('giohang')->max('MaGioHang'))+1,
                            'MaTaiKhoan'=>$_COOKIE['id'],
                            'MaSanPham'=>$id,
                            'SoLuong'=> 1,
                    ));
              }
              $count= DB::table('giohang')->where('MaTaiKhoan',$_COOKIE['id'])->select('*')->get()->count();
              $cart = DB::table('traicay')
              ->join('giohang', 'traiCay.MaTraiCay', '=', 'giohang.MaSanPham')->where('MaTaiKhoan',$_COOKIE['id'])
              ->select('traicay.*', 'giohang.SoLuong')
              ->get();
              $name=DB::table('traicay')->where('MaTraiCay',$id)->select('TenTraiCay')->get();
              foreach($name as $row){ $name=$row->TenTraiCay;}
            $view=view('cart-popup',compact('cart'))->render();
            return response()->json(['html'=>$view,'count'=>$count,'flag'=>true,'name'=>$name]);
        } 
        else{
            $cart=session()->get('cart',[]);
            $sl=session()->get('sl',[]);
            $sl[$id]=isset($sl[$id]) ?$sl[$id]+1 : 1;
            $cart[$id]=$id;
            session()->put('cart',$cart);
            session()->put('sl',$sl);
            $count= count($cart);
            $cart =  DB::table('traicay')->whereIn('MaTraiCay',session()->get('cart',[]))->get();
            $sl=session()->get('sl',[]);
            $name=DB::table('traicay')->where('MaTraiCay',$id)->select('TenTraiCay')->get();
            foreach($name as $row){ $name=$row->TenTraiCay;}
          $view=view('cart-popup',compact('cart','sl'))->render();
          return response()->json(['html'=>$view,'count'=>$count,'flag'=>true,'name'=>$name]);
        }
            return response()->json(['flag'=>false]);
    }

  //cap nhat gio hang
  public function capnhatgh(Request $request,$id)
    {   
            if(isset($_COOKIE['id']))
            {
                DB::table('giohang')
                ->where('MaTaiKhoan',$_COOKIE['id'])
                ->where('MaSanPham',$id)
                ->update(['SoLuong'=>$request->SoLuong]);
            }          
            else
            {
                $sl = session()->get('sl', []);
                $sl[$id]=$request->SoLuong;
                session()->put('sl',$sl);
            }
} 
// //lay tong tien trong gio hang
public  function gettotal()
{    
  $sum=0;
 if(isset($_COOKIE['id']))
 {   
    $products = DB::table('traicay')
    ->join('giohang', 'traicay.MaTraiCay', '=', 'giohang.MaSanPham')->where('MaTaiKhoan',$_COOKIE['id'])
    ->select('traicay.*', 'giohang.SoLuong')
    ->get();
    foreach($products as $row)
    {
        $sum2=($row->SoLuong*round($row->GiaBan-(($row->GiaBan*$row->Discount)/100)));
        $sum+=$sum2;
    }
   }
   else{
    $cart=session()->get('cart',[]);
    $sl=session()->get('sl',[]);
    $products = DB::table('traicay')->whereIn('MaTraiCay',session()->get('cart',[]))
    ->select('traicay.*')
    ->get();
    foreach($products as $row)
    {
        $sum2=($sl[$row->MaTraiCay]*round($row->GiaBan-(($row->GiaBan*$row->Discount)/100)));
        $sum+=$sum2;
    }
   }
    return $sum;
}
// // Xoa 1 san pham trong gio hang
public function delProduct($id)
{
    if(isset($_COOKIE['id'])){
    DB::table("giohang")->where("MaSanPham",$id)->where('MaTaiKhoan',$_COOKIE['id'])->delete();
}
    else{
        $cart = session()->get('cart', []);
        $sl = session()->get('sl', []);
        unset($cart[$id]);
        unset($sl[$id]);
        session()->put('cart', $cart);
        session()->put('sl', $sl);
    }
}

public function get_historyBill()
{
 if(isset($_COOKIE['id']))
 {
   $his=DB::table('hoadon')->join('ct_hoadon', 'hoadon.MaHD', '=', 'ct_hoadon.MaHD')->where('MaTaiKhoan',$_COOKIE['id'])
  ->select('hoadon.*', 'ct_hoadon.MaTraiCay','ct_hoadon.SoLuong','ct_hoadon.DonGia','ct_hoadon.HoTen')
  ->get();
 } 
 else{
     $his=DB::table('hoadon')->join('ct_hoadon', 'hoadon.MaHD', '=', 'ct_hoadon.MaHD')->where('MaTaiKhoan',0)
     ->select('hoadon.*', 'ct_hoadon.MaTraiCay','ct_hoadon.SoLuong','ct_hoadon.DonGia','ct_hoadon.HoTen')
     ->get();
 }
   return $his;
}
}