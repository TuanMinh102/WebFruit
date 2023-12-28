<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
   // Load San Pham
    public function welcomeview()
    {   
     return view('welcome');
    }
  
    public function homeview()
    {
      $loaisp=DB::table('loaitraicay')->select('*')->get();
      $fruits=DB::table('traicay') 
      ->leftJoin('banggia', function($join) {
            $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
            ->where('NgayBatDau', '<=', Carbon::now())
            ->where('NgayKetThuc', '>=', Carbon::now());
        })
        ->join('donvi','traicay.UnitID','donvi.MaDonVi')
        ->select('*')->get();
  
      //   $muahe=DB::table('traicay')
      //   ->where('MaLoai',1) 
      //   ->leftJoin('banggia', function($join) {
      //     $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
      //     ->where('NgayBatDau', '<=', Carbon::now())
      //     ->where('NgayKetThuc', '>=', Carbon::now());
      // })
      // ->join('donvi','traicay.UnitID','donvi.MaDonVi')
      // ->select('traicay.*','banggia.*','donvi.*')->get();
      //   ////////
      //   $muadong=DB::table('traicay')
      //   ->where('MaLoai',2) 
      //   ->leftJoin('banggia', function($join) {
      //     $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
      //     ->where('NgayBatDau', '<=', Carbon::now())
      //     ->where('NgayKetThuc', '>=', Carbon::now());
      // })
      // ->join('donvi','traicay.UnitID','donvi.MaDonVi')
      // ->select('traicay.*','banggia.*','donvi.*')->get();
        /////////
        $traicays = DB::table('traicay') 
        ->leftJoin('banggia', function($join) {
          $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
          ->where('NgayBatDau', '<=', Carbon::now())
          ->where('NgayKetThuc', '>=', Carbon::now());
      })
      ->join('donvi','traicay.UnitID','donvi.MaDonVi')
      ->select('traicay.*','banggia.*','donvi.*')->get();
        //////
        $album=DB::table('album')->select('*')->get();
        $new=DB::table('news')->where('Type','like','%'.'bai viet'.'%')->select('*')->get();
        if(isset($_COOKIE['id']))
          $cookie=$_COOKIE['id'];
        else
          $cookie=0;
     // $this->tonghopgiohang();
        return view("home/home",compact('traicays','loaisp','fruits','album','new','cookie'));
    }
    public function tonghopgiohang()
    {
       $cart=session()->get('cart',[]);
       $sl=session()->get('sl',[]);
       if(count($cart)>0&&isset($_COOKIE['id'])){
       foreach($cart as $possion)
       {
           $value=DB::table('giohang')->where('MaTaiKhoan',$_COOKIE['id'])->where('MaSanPham',$possion)->select('*')->get();
           if($value->count()>0)
           {
               DB::table('giohang')->where('MaTaiKhoan',$_COOKIE['id'])->where('MaSanPham',$possion)->increment('SoLuong', 1);
           }
           else{
               DB::table('giohang')->insert(
                   array(
                           'MaGioHang' => (DB::table('giohang')->max('MaGioHang'))+1,
                           'MaTaiKhoan'=>$_COOKIE['id'],
                           'MaSanPham'=>$possion,
                           'SoLuong'=> $sl[$possion],
                   ));
           }
       }
       session()->forget('cart');
       session()->forget('sl');
    }
  }
  public function contactview()
  {
    $contact=DB::table('lienhe')->where('MaLienHe',1)->select('*')->get();
    return view('contact/lienhe',compact('contact'));
  }
  public function sendFeedback(Request $request)
  {
    $max=DB::table('feedback')->max('FeedbackID');
    if($max==0)
      $id=1;
    else {
      $contact=DB::table('feedback')->select("*")->get();
      for($i=1;$i<=$max;$i++)
      { $flag=false;
        foreach($contact as $row)
        {
          if($i==$row->FeedbackID)
          {
             $flag=true;break;
          }
        }
        if($i==$max&&$flag==true)
          $id=$max+1;
        else if($flag==false){
           $id=$i;
           break;
        }
      }
    }
      DB::table('feedback')->insert(
        array(
            'FeedBackID'=>$id,
            'Name'=>$request->fullname,
            'Email'=>$request->email,
            'Content'=>$request->content,
            'NgayPhanHoi'=>Carbon::now()
        ));
  }
}