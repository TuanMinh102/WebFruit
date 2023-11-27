<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function AdminView(Request $request)
    {
        $tmp=0;
        if($request->ajax())
        {
            if($request->tmp=='m')
            {
                  $dulieu=DB::table('hoadon')
              ->join('ct_hoadon','ct_hoadon.MaHD','=','hoadon.MaHD')
             ->whereMonth('hoadon.NgayLapHD',$request->m)
             ->select('hoadon.*','ct_hoadon.DonGia')->get();
           $tmp=0;
            }
            else{
                $dulieu=[];
                for($i=1;$i<=12;$i++)
                {
                    $dulieu[$i]=DB::table('hoadon')
                ->join('ct_hoadon','ct_hoadon.MaHD','=','hoadon.MaHD')
                ->whereMonth('hoadon.NgayLapHD',$i)
               ->whereYear('hoadon.NgayLapHD',$request->y)
              ->sum('ct_hoadon.DonGia');
                }
               $tmp=1;
            }
        return view('chart',compact('tmp'),['dulieu'=>$dulieu]);
        }
        else{
          $dulieu=DB::table('hoadon')
          ->join('ct_hoadon','ct_hoadon.MaHD','=','hoadon.MaHD')
          ->whereMonth('hoadon.NgayLapHD',1)
          ->select('hoadon.*','ct_hoadon.DonGia')->get();
          return view('admin',compact('dulieu','tmp'));
        }
      //  return view("login-admin");
    }
    public function login(Request $request)
    {
        $username=$request->input('username');
        $password=$request->input('password');
        $tk=DB::table('taikhoan')->select("*")->get();
        $flag=0;
        foreach($tk as $row)
        {
            if($row->TaiKhoan==$username &&$row->MatKhau==$password)
            {
                return view('admin');
                break;
            }
            if($row->TaiKhoan==$username)
            {
                $flag=1;
            }
        }
        return view('login-admin',['flag'=>$flag]);
    }
}