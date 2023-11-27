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
        $muahe=DB::table('traicay')->where('MaLoai',1)->select('*')->get();
        $muadong=DB::table('traicay')->where('MaLoai',2)->select('*')->get();
        $traicays = DB::table('traicay')->select('*')->get();
        $album=DB::table('album')->select('*')->get();
        $new=DB::table('news')->where('Type','like','%'.'bai viet'.'%')->select('*')->get();
        if(isset($_COOKIE['id']))
          $cookie=$_COOKIE['id'];
        else
          $cookie=0;
     // $this->tonghopgiohang();
        return view("home",compact('traicays','muahe','muadong','album','new','cookie'));
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
}