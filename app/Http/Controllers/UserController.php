<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
     // View dang nhap
     public function loginview()
     {
         if(empty($_COOKIE['id']))
         {
         $cookie=0;
         }
         else
         $cookie=$_COOKIE['id'];
         if(isset($cookie)){
         $info=DB::table('taikhoan')->where('MaTaiKhoan',$cookie)->select('*');
         $info = $info->get();
         return view("login",['ck'=>$cookie],compact('info'));
         } 
         else
         {
             $info=null;
         return view("login",['ck'=>$cookie],compact('info'));
         }
     }
    
     //Dang xuat
     public function logout()
     {
         setcookie("id", null, time()-3600); 
         return redirect("login");
     }
     // Kiem Tra Dang Nhap
     public function dangnhap(Request $request)
     {
         $username= $request->tendangnhap;
         $password=$request->matkhau;
         $tk = DB::table('taikhoan')->select('*')->get();
         foreach($tk as $row)
            {
         if($username==$row->TaiKhoan && $password==$row->MatKhau)
         {
             setcookie("id",$row->MaTaiKhoan, time()+3600);
             return response()->json(['flag'=>true]);break;
         }
     }
          return response()->json(['flag'=>false]);
     }
     // Chinh sua thong tin ca nhan
     function editProfile(Request $request,$id)
     {
                    DB::table('taikhoan')
                    ->where('MaTaiKhoan', $id)
                    ->update([
                        'HoTen'=>$request->name,
                        'DiaChi'=>$request->address,
                        'Phone'=>$request->phone,
                        'Email'=>$request->email,
                    ]);
        }
     // Dang Ky
     public function dangky(Request $request)
     {
         $tk = DB::table('taikhoan')->select('*')->get();
         foreach($tk as $row){
         if($request->tendangnhap==$row->TaiKhoan)
         {
        return response()->json(['SignUpError'=>"Tên Đăng Nhập Tồn Tại",'flag'=>'false']);
         }
        }
        if($request->matkhau!=$request->xacnhanmatkhau)
        {
         return response()->json(['SignUpError'=>"Mật Khẩu Không Trùng khớp",'flag'=>'false']);
        }
        else
        {
            $max=(DB::table('taikhoan')->max('MaTaiKhoan'));
            for($i=1;$i<=$max;$i++)
            {
                $lag=false;
                foreach($tk as $row)
                {
                    if($i==$row->MaTaiKhoan)
                    {
                        $lag=true;
                        break;
                    }
                }
                if($i==$max)
                {
                    $i=$max+1;
                    $lag=false;
                }
                if($lag==false)
                {
                    DB::table('taikhoan')->insert(
                        array(
                                'MaTaiKhoan' => $i,
                               'TaiKhoan'     =>   $request->tendangnhap, 
                               'MatKhau'   =>   $request->matkhau,
                               'Email'=>'',
                               'Phone'=>'',
                               'DiaChi'=>'',
                               'HoTen'=>'',
                               'IsAdmin'=> 0,
                               'Avatar'=>'',
                               'TrangThai'=>''
                        ));
                   DB::table('chatbox')->insert(
                    array(
                        'chatID' => $i,
                        'MaTK'=>$i,
                    ));
                   break;
                }
            }
        return response()->json(['SignUpError'=>"Đăng Ký Thành Công",'flag'=>"true"]);
     }
     }
     public function SendOTP(Request $request)
     {  
        $random_otp=$request->random_otp; 
        $mail=$request->email;
        Mail::send('otpform',compact('random_otp'),function($email) use ($mail){
        $email->to($mail);
      });
     }

     public function Laylaimk(Request $request)
     {
        $user= DB::table('taikhoan')->where('Email',$request->gmail)->update(['MatKhau'=>$request->newpassword]);
     }
     
}