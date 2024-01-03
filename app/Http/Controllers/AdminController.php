<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function AdminView(Request $request)
    {
            if(isset($_COOKIE['admin']))
             return view("admin/admin");
            return view('admin/login-admin');
       
    }
    public function login(Request $request)
    {
        $username=$request->input('username');
        $password=md5($request->input('password'));
        $tk=DB::table('taikhoan')->where('IsAdmin','=',1)->select("*")->get();
        $flag=0;
        foreach($tk as $row)
        {
            if($row->TaiKhoan==$username &&$row->MatKhau==$password)
            {
                setcookie("admin",$row->MaTaiKhoan, time()+7200);
                setcookie("id", null, time()-7200); 
                return view('admin/admin');
                break;
            }
            if($row->TaiKhoan==$username)
            {
                $flag=1;
            }
        }
        return view('admin/login-admin',['flag'=>$flag]);
    }
    public function logout()
    {
        setcookie("admin", null, time()-7200); 
        return back();
    }
   
}