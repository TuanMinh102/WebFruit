<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NewsController extends Controller
{
    //
    public function editor()
     {
        return view("editor");
     }
     public function newsList()
     {
        $news=DB::table('news')->where('Type','like','%'.'tin tuc'.'%')->select('*')->get();
        return view('news',compact('news'));
     }
     public function getNews($id)
     {
        $article=DB::table('news')->where('News_ID',$id)->select('*')->get();
        return view('articles',compact('article'));
     }
     public function insert(Request $request)
     {
        $max=(DB::table('news')->max('News_ID'))+1;
        DB::table('news')->insert(
         array(
            'News_ID'=>$max,
            'Title'=>$request->title,
            'Content'=>$request->content,
            'MoTa'=>$request->mota,
            'Type'=>$request->loai,
            'Created_at'=> Carbon::now(),
            'Update_at'=>Carbon::now(),
            'Anh'=>$request->anh,
        ));
     }
}