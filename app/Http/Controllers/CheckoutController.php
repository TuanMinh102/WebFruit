<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    // view form thanh toan
  public function checkoutview()
  {
    if(isset($_COOKIE['id']))
     return view("checkout/checkout",['total'=>(new CartController)->gettotal()]);
    return view("checkout/checkout",['total'=>0]);
  }
  // thanh toan
  public function thanhtoan()
  {  
    if((new CartController)->gettotal()==0)
    {
      session()->get('mess-false');
      session()->put('mess-false','Bạn chưa có sản phẩm để thanh toán! >>');
     return redirect("/tt");
    }
    $mahd=DB::table('hoadon')->max('MaHD');
    if(isset($_COOKIE['id']))
    {   
        DB::table('hoadon')->insert(
            array(
                    'MaHD' => ($mahd+1),
                    'MaTaiKhoan' =>  $_COOKIE['id'],
                   'NgayLapHD'  => Carbon::now(), 
                   'DiaChiGiaoHang'=>$_POST['address'],
                   'Phone'=>$_POST['phone'],
                   'ThanhTien'=>(new CartController)->gettotal(),
                   'TinhTrang'=>'Đang Chờ',
                   'DanhGia'=>'true'
            ));
       foreach($this->getProducts_arr() as $row)
       {
       DB::table('ct_hoadon')->insert(
        array(
               'MaHD' => ($mahd+1),
               'MaTraiCay'  => $row->MaTraiCay, 
               'SoLuong' => $row->Sl,
               'DonGia'=> $this->getProductPrice($row->MaTraiCay),
               'TongGia'=> $this->get_SingleTotal_price($row->MaTraiCay),
               'HoTen'=>$_POST['first_name'],
               'Email'=>$_POST['email'],
               'Note'=>$_POST['comment'],
        ));
  }
        (new CartController)->xoatoanbo();
        $this->SendMail();
        session()->get('mess-true');
        session()->put('mess-true','Cảm ơn bạn đã mua hàng.');
       return redirect("/tt");
    }
    return (new UserController)->loginview();
  }
  // lay ma cac san pham trong gio hang
  public function getProducts_arr()
  {  
    if(isset($_COOKIE['id']))
    {   
        $products = DB::table('traicay')
        ->join('giohang', 'traicay.MaTraiCay', '=', 'giohang.MaSanPham')
        ->where('MaTaiKhoan',$_COOKIE['id'])
        ->select('traicay.MaTraiCay','giohang.SoLuong as Sl')
        ->get();
        return $products;
       }
  }
  // lay tong so luong cac san pham trong gio hang
  public function get_SingleTotal_price($id)
  {   $amount=0;
    if(isset($_COOKIE['id']))
    {   
        $product = DB::table('traicay')
        ->join('giohang', 'traicay.MaTraiCay', '=', 'giohang.MaSanPham')
        ->where('MaTaiKhoan',$_COOKIE['id'])
        ->where('giohang.MaSanPham','=',$id)
        ->leftJoin('banggia', function($join) {
          $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
          ->where('NgayBatDau', '<=', Carbon::now())
          ->where('NgayKetThuc', '>=', Carbon::now());
      })
        ->select('traicay.GiaGoc','giohang.SoLuong','banggia.GiaBan')->get();
        foreach($product as $row)
        {
          if(isset($row->GiaBan))
          $amount+=($row->SoLuong*$row->GiaBan);
        else 
          $amount+=($row->SoLuong*$row->GiaGoc);
        }
       } return $amount;
  }
   public function SendMail()
   {
    if(isset($_COOKIE['id']))
    {
      $user=DB::table('ct_hoadon')
      ->join('hoadon','hoadon.MaHD','=','ct_hoadon.MaHD')
      ->where('hoadon.MaTaiKhoan','=',$_COOKIE['id'])
      ->select('ct_hoadon.HoTen','ct_hoadon.Email')
      ->get();
      foreach($user as $row)
      {
         $name=$row->HoTen;
        $mail=$row->Email;
      }
     
       Mail::send('checkout/mailform',compact('name','mail'),function($email){
      $user2=DB::table('ct_hoadon')
      ->join('hoadon','hoadon.MaHD','=','ct_hoadon.MaHD')
      ->where('hoadon.MaTaiKhoan','=',$_COOKIE['id'])
      ->select('ct_hoadon.HoTen','ct_hoadon.Email')
      ->get();
      foreach($user2 as $row2)
       $mail2=$row2->Email;
       $email->to($mail2);
    });
    }
   }
   public function sendMail2()
   {
     $name='tuan';
     $mail="tuanww";
       Mail::send('checkout/mailform',compact('name','mail'),function($email){
      $email->to('tuanww012@gmail.com','tuanpro');
    });
    }

    public function getProductPrice($id)
    {
      $price= DB::table('traicay')
    ->leftJoin('banggia', function($join) {
        $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
        ->where('NgayBatDau', '<=', Carbon::now())
        ->where('NgayKetThuc', '>=', Carbon::now());
    })
    ->where('MaTraiCay',$id)
    ->select('traicay.GiaGoc','banggia.GiaBan')->get();
    foreach($price as $row)
    if(isset($row->GiaBan))
    {
       $price=$row->GiaBan;return $price;
    }
    else 
    {
        $price=$row->GiaGoc;return $price;
    }
    }
}