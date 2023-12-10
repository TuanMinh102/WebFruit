<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
class ProductController extends Controller
{
      // Chi Tiet San Pham
      public function chitiet()
      {
          $maloai=DB::table('traicay')->where('MaTraiCay',1)->select('traicay.MaLoai')->get();
          foreach($maloai as $row)$maloai=$row->MaLoai;
          $cungloai = DB::table('traicay')->where('MaLoai',$maloai)->select('*')->get();
          $product=DB::table('traicay')->where('MaTraiCay',1)->select('*')->get();
          $gallery=DB::table('gallery')->where('MaTCay',1)->select('*')->get();
          $comments=DB::table('review')->join('taikhoan','taikhoan.MaTaiKhoan','=','review.MaTk')->where('MaSp',1)->select('*')->get();
          return view("detail",compact('product','gallery','comments','cungloai'));
      }
  
     //phan loai theo the loai
     public function Catogories(Request $request,$id)
     { 
        if($request->ajax())
        {
            if($id=='catagory')
            $products = DB::table('traicay')->paginate(8);
            else
            $products = DB::table('traicay')->where('MaLoai',$id)->paginate(8);
            return view('data',compact('products'))->render();
        }
     }
     // phan loai theo hang
     public function Brands(Request $request,$id)
     { 
        if($request->ajax())
        {
            if($id=='brands')
            $products = DB::table('traicay')->paginate(8);
            else
            $products = DB::table('traicay')->where('MaNcc',$id)->paginate(8);
            return view('data',compact('products'))->render();
        }
     }
     // chi tiet san pham
     public function details($id)
     { 
         $maloai=DB::table('traicay')->where('MaTraiCay',$id)->select('traicay.MaLoai')->get();
         foreach($maloai as $row)$maloai=$row->MaLoai;
         $cungloai = DB::table('traicay')->where('MaLoai',$maloai)->select('*')->get();
         $comments=DB::table('review')
         ->join('taikhoan','taikhoan.MaTaiKhoan','=','review.MaTk')
         ->where('MaSp',$id)
         ->select('*')
         ->get();
         $product=DB::table('traicay')->where('MaTraiCay',$id)->select('*')->get();
         $gallery=DB::table('gallery')->where('MaTCay',$id)->select('*')->get();
           return view("detail",compact('product','cungloai','gallery','comments'));
     }
       // Phan loai san pham
       public function Shopview(Request $request)
       {
           $routeName=$request->path();
           $cats = DB::table('loaitraicay')->select('*')->get();
           $brand = DB::table('nhacungcap')->select('*')->get();
          if($routeName=='basket')
            $products = DB::table('traicay')->where('MaLoai',3)->paginate(8);
          else
            $products = DB::table('traicay')->paginate(8);
           if(isset($_COOKIE['id'])){
            $cart = DB::table('traicay')
            ->join('giohang', 'traiCay.MaTraiCay', '=', 'giohang.MaSanPham')->where('MaTaiKhoan',$_COOKIE['id'])
            ->select('traicay.*', 'giohang.SoLuong')
            ->get();
            $count=$this->count_products();
            return view('shop', compact('cats', 'brand', 'products','count','cart'),['name'=>$routeName]);
            }
            else
            {
                $cart = DB::table('traicay')->whereIn('MaTraiCay',session()->get('cart',[]))->get();
                $sl=session()->get('sl',[]);
                $count=$this->count_products();
            return view('shop', compact('cats', 'brand', 'products','count','cart','sl'),['name'=>$routeName]);
            }
       }
       // tim kiem san pham bang tu khoa
       public function timkiem(Request $request)
       {  
            if ($request->ajax()) {
                $products = DB::table('traicay')->where('TenTraiCay','like','%'.($request->tukhoa).'%')->paginate(8);
                return view('data', compact('products'))->render();
            }
    }
      // tim kiem san pham gia
      public function RangePrice(Request $request)
      {  
           if ($request->ajax()) {
               $products = DB::table('traicay')
               ->whereBetween(('GiaBan'),[1,$request->price])
               ->orderBy('GiaBan','asc')->paginate(8);
               return view('data', compact('products'))->render();
           }
   }
   //
public function product_item($products)
{
    $string='';
    foreach($products as $row)
    {
            $string.= '<div class="item-product">
            <div class="product-img">
                <img src="img/fruit/'.$row->Anh.'" alt="">
                <img class="hover-img" src="img/fruit/'.$row->Anh.'" alt="">
            </div>
            <div class="product-desc">
                <div class="product-meta-data">
                    <a class="product-name text-decoration-none" href="ct'.$row->MaTraiCay.'">
                        <h3><b>'.$row->TenTraiCay.'</b></h3>
                    </a>
                    <p class="product-price">$'.round($row->GiaBan-(($row->GiaBan*$row->Discount)/100)).'</p>
                </div>
                <div class="ratings-cart">
                    <div class="ratings">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <div class="cart">
                        <a class="btn btn-success" href="javascript:addcart('.$row->MaTraiCay.')" data-toggle="tooltip"
                            data-placement="left" title="Add to Cart">Thêm giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>';
    }
    return $string;
}
// so san pham trong gio hang
    public function count_products()
    {
    $count=0;
    if(isset($_COOKIE['id']))
    {
         $products=DB::table('giohang')->where('MaTaiKhoan',$_COOKIE['id'])->select('*')->get();
        $count=$products->count();
    }
    else{
        $cart=session()->get('cart',[]);
        if(count($cart)>0)
            $count=count($cart);
    }
    return $count;
    }
    //
    public function insertReview(Request $request)
    {
        DB::table('review')->insert(
            array(
                'MaTk'=>$_COOKIE['id'],
                'MaSp'=>$request->idsp,
                'Comment'=>$request->text,
                'Rating'=>$request->star,
                'NgayThang'=>Carbon::now(),
                'TinhTrang'=>'true',
            ));
            DB::table('hoadon')->where('MaHD','=',$request->mahd)
            ->update([
                'DanhGia'=>'true',
            ]);
    }
}