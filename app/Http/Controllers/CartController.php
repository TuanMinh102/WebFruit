<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;
use Carbon\Carbon;
class CartController extends Controller
{
    // lay du lieu gio hang tu tai khoan
    public function getcart()
    {      
        if(isset($_COOKIE['id'])){
        $cart =$this->getCartByAccountId_query($_COOKIE['id']);
        return view("cart/cart",compact('cart'),['total'=>$this->gettotal(),'bill'=>$this->get_historyBill()]);
        }
        else 
        {
           $cart=$this->getCartBySession_query();
           $sl=session()->get('sl',[]);
           return view("cart/cart",compact('cart','sl'),['total'=>$this->gettotal(),'bill'=>$this->get_historyBill()]);
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
              $cart =$this->getCartByAccountId_query($_COOKIE['id']);
              $name=DB::table('traicay')->where('MaTraiCay',$id)->select('TenTraiCay')->get();
              foreach($name as $row){ $name=$row->TenTraiCay;}
              $view=view('cart/cart-popup',compact('cart'))->render();
            return response()->json(['html'=>$view,'count'=>$count,'name'=>$name]);
        } 
        else{
            $cart=session()->get('cart',[]);
            $sl=session()->get('sl',[]);
            $sl[$id]=isset($sl[$id]) ?$sl[$id]+1 : 1;
            $cart[$id]=$id;
            session()->put('cart',$cart);
            session()->put('sl',$sl);
            $count= count($cart);
            $cart = $this->getCartBySession_query();
            $sl=session()->get('sl',[]);
            $name=DB::table('traicay')->where('MaTraiCay',$id)->select('TenTraiCay')->get();
            foreach($name as $row){ $name=$row->TenTraiCay;}
            $view=view('cart/cart-popup',compact('cart','sl'))->render();
          return response()->json(['html'=>$view,'count'=>$count,'name'=>$name]);
        }
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
    $cart = $this->getCartByAccountId_query($_COOKIE['id']);
    foreach($cart as $row)
    {
        if($row->ChietKhau!=null)
            $sum2=($row->SoLuong*$row->GiaBan);
        else
            $sum2=($row->SoLuong*$row->GiaGoc);
         $sum+=$sum2;
    }
   }
   else{
    $cart=session()->get('cart',[]);
    $sl=session()->get('sl',[]);
    $cart = $this->getCartBySession_query();
    foreach($cart as $row)
    {
        if($row->ChietKhau!=null)
            $sum2=($sl[$row->MaTraiCay]*$row->GiaBan);
        else
            $sum2=($sl[$row->MaTraiCay]*$row->GiaGoc);
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
// Lay lich su hoa don cua tai khoan
public function get_historyBill()
{
 if(isset($_COOKIE['id']))
 {
   $his=DB::table('hoadon')
   ->join('ct_hoadon', 'hoadon.MaHD', '=', 'ct_hoadon.MaHD')
   ->where('MaTaiKhoan',$_COOKIE['id'])
   ->select('hoadon.*','ct_hoadon.HoTen')
   ->distinct()->get();
 } 
 else{
     $his=DB::table('hoadon')->join('ct_hoadon', 'hoadon.MaHD', '=', 'ct_hoadon.MaHD')->where('MaTaiKhoan',0)
     ->select('hoadon.*')->get();
 }
   return $his;
}
//Lay chi tiet hoa don cua tai khoan
public function get_detailBill(Request $request)
{
    $detail=DB::table('hoadon')
    ->where('hoadon.MaHD','=',$request->id)
    ->where('MaTaiKhoan',$_COOKIE['id'])
    ->join('ct_hoadon', 'hoadon.MaHD', '=', 'ct_hoadon.MaHD')
    ->join('traicay','traicay.MaTraiCay','=','ct_hoadon.MaTraiCay')
    ->leftJoin('banggia', function($join) {
        $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
        ->where('NgayBatDau', '<=', Carbon::now())
        ->where('NgayKetThuc', '>=', Carbon::now());
    })
    ->join('donvi','donvi.MaDonVi','traicay.UnitID')
   ->select('hoadon.*','ct_hoadon.*','traicay.TenTraiCay','traicay.MaTraiCay','traicay.GiaGoc','banggia.GiaBan','donvi.*')
   ->get();
   $info=DB::table('hoadon')
   ->join('ct_hoadon', 'hoadon.MaHD', '=', 'ct_hoadon.MaHD')
   ->where('hoadon.MaHD','=',$request->id)->select('hoadon.*','ct_hoadon.HoTen')
   ->take(1)->get();
   return view('cart/detail-invoices',compact('detail','info'));
}
//Danh gia san pham
public function reviewProduct(Request $request)
{
    $list_products=DB::table('ct_hoadon')
    ->where('MaHD','=',$request->id)
    ->join('traicay','traicay.MaTraiCay','=','ct_hoadon.MaTraiCay')->select('*')->get();
    return view('cart/review_products',compact('list_products'));
}

///////////////////////////////////////////////////////////////////
//////////////////////QUERY---HERE/////////////////////////////////

public function getCartByAccountId_query($id)
{
    $cart = DB::table('traicay')
    ->join('giohang', 'traicay.MaTraiCay', '=', 'giohang.MaSanPham')
    ->leftJoin('banggia', function($join) {
        $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
        ->where('NgayBatDau', '<=', Carbon::now())
        ->where('NgayKetThuc', '>=', Carbon::now());
    })
    ->where('MaTaiKhoan',$id)
    ->join('donvi','donvi.MaDonVi','traicay.UnitID')
    ->select('traicay.*','giohang.SoLuong','banggia.*','donvi.*')->get();
    return $cart;
}
//
public function getCartBySession_query()
{
    $cart = DB::table('traicay')
    ->leftJoin('banggia', function($join) {
        $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
        ->where('NgayBatDau', '<=', Carbon::now())
        ->where('NgayKetThuc', '>=', Carbon::now());
    })
    ->whereIn('MaTraiCay',session()->get('cart',[]))
    ->join('donvi','donvi.MaDonVi','traicay.UnitID')
    ->select('traicay.*','banggia.*','donvi.*')->get();
    return $cart;
}
public function upload2(Request $request)
{
    if ($request->hasFile('upload')) {
        $originName = $request->file('upload')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('upload')->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;
        $request->file('upload')->move(public_path('img/danhgia'), $fileName);
        $url = asset('img/danhgia/' . $fileName);
        return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
    }
}

public function tmp(Request $request)
{
DB::table('demo')->insert(array(
    'id'=>1,
    'text'=>$request->data
));
}
}