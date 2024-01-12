<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PusherController extends Controller
{
    public function index()
    {
        if(session()->has('user'))
        { 
            $type=1; 
            $chater1=session()->get('user');
            $chater2=3;
            $chat=DB::table('chatbox')
            ->join('history_chat','chatbox.chatID','=','history_chat.MaChat')
            ->where('chatbox.MaTK',session()->get('user'))
            ->select('*')->get();
            $list=null;
            //////////
            $unread=array();
            $name='Admin';
            return view('chat/pusher-chat',compact('chat','list','chater1','chater2','unread','name'),['type'=>$type]);             
         }
          else if(session()->has('admin'))
         {
            $type=0;
            $chater1=3;
            $chater2=0;
            $chat=null;
            $list=DB::table('chatbox')
            ->join('taikhoan','taikhoan.MaTaiKhoan','=','chatbox.MaTk')
            ->where('IsAdmin','=',0)
            ->select('taikhoan.*')->get();
            ///////////
            $unread=$this->get_unseen();
            $name='Username';
            return view('chat/pusher-chat',compact('chat','list','chater1','chater2','unread','name'),['type'=>$type]);
         }
         else return redirect('login');
    }
    /////////////////
    public function get_history_chat($id)
    {
        $type=0;
        $chater1=3;
        $chater2=$id;
        $chat=DB::table('chatbox')->join('history_chat','chatbox.chatID','=','history_chat.MaChat')->where('chatbox.MaTK',$id)->select('*')->get();
        $list=DB::table('chatbox')->join('taikhoan','chatbox.MaTK','=','taikhoan.MaTaiKhoan')->where('IsAdmin','=',0)->select('*')->get();  
        ////////////
        DB::table('history_chat')->where('MaChat',$id)->update(['Seen'=>'true']);
        $unread=$this->get_unseen();
        $name=DB::table('taikhoan')->where('MaTaiKhoan',$id)->select('TaiKhoan')->get()->first();
        $name=$name->TaiKhoan;
        return view('chat/pusher-chat',compact('chat','list','chater1','chater2','unread','name'),['type'=>$type]);
    }
    ////////////
    public function broadcast(Request $request)
    {
       // broadcast(new PusherBroadcast($request->get('message')))->toOthers();
        
            if(intval($request->get('type'))==1)
                $machat=intval($request->get('my'));
            else
                $machat=intval($request->get('chatwith'));
                    DB::table('history_chat')->insert(
                        array(
                            'MaChat'=> $machat,
                            'NoiDung'=>$request->get('message'),
                            'ThoiGian'=> Carbon::now(),
                            'IsUser'=>intval($request->get('type')),
                            'Seen'=>'false'
                        ));
            
            event(new PusherBroadcast($request->get('message'),intval($request->get('chatwith')),intval($request->get('my')),'online'));
            return view('chat/BroadcastMessage', ['message' => $request->get('message'),'time'=>Carbon::now()]);
    }
    ///////////
    public function receive(Request $request)
    {
        return view('chat/ReceiveMessage', ['message' => $request->get('message'),'time'=>Carbon::now()]);
    }
    //////////
    public function get_unseen()
    {
        $arr=array();
        $list=DB::table('chatbox')
        ->join('taikhoan','taikhoan.MaTaiKhoan','=','chatbox.MaTk')
        ->where('IsAdmin','=',0)
        ->select('taikhoan.*')->get();
        foreach($list as $row)
        {
            $count=DB::table('chatbox')
            ->join('history_chat','chatbox.chatID','history_chat.MaChat')
            ->where('history_chat.MaChat','=',$row->MaTaiKhoan)
            ->where('IsUser','=',1)
            ->where('Seen','=','false')
            ->select('*')->get()->count();
            if($count>0)
              $arr[$row->MaTaiKhoan]=$count;
            else 
              $arr[$row->MaTaiKhoan]=0;
        }
        return $arr;
    }
}