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
    // public function index()
    // {
    //     return view('index');
    // }

    // public function broadcast(Request $request)
    // {
    //     broadcast(new PusherBroadcast($request->get('message')))->toOthers();

    //     return view('broadcast', ['message' => $request->get('message')]);
    // }

    // public function receive(Request $request)
    // {
    //     return view('receive', ['message' => $request->get('message')]);
    // }

            //----------------------------------------------------------//
            //---------------------------------------------------------//

    public function index()
    {
        if(isset($_COOKIE['id']))
        {
            $chat=DB::table('chatbox')
            ->join('history_chat','chatbox.chatID','=','history_chat.MaChat')
            ->where('chatbox.MaTK',$_COOKIE['id'])
            ->select('*')->get();
            return view('pusher-chat',compact('chat'));
         }
         else return redirect()->to('login');
    }

    public function broadcast(Request $request)
    {
              DB::table('history_chat')->insert(
            array(
                'MaChat'=> $_COOKIE['id'],
                'NoiDung'=>$request->get('message'),
                'ThoiGian'=> Carbon::now(),
                'IsUser'=>1,
            ));
            broadcast(new PusherBroadcast($request->get('message')))->toOthers();
            return view('BroadcastMessage', ['message' => $request->get('message'),'time'=>Carbon::now()]);
    }

    public function receive(Request $request)
    {
           return view('ReceiveMessage', ['message' => $request->get('message'),'time'=>Carbon::now()]);
    }
}