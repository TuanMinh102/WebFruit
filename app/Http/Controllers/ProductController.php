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
            if(isset($_COOKIE['id'])){
                $cart =(new CartController)->getCartByAccountId_query($_COOKIE['id']);
                $count=$this->count_products();
                $sl=null;
            }
            else{
                $cart =(new CartController)->getCartBySession_query();
                $sl=session()->get('sl',[]);
                $count=$this->count_products();  
            }
                $maloai=DB::table('traicay')->where('MaTraiCay',1)->select('traicay.MaLoai')->get();
                foreach($maloai as $row)$maloai=$row->MaLoai;
                ////
                $cungloai =$this->getProductBySameCategory_query($maloai,1);
                ////
                $product=$this->getProductById1_query();
                ////
                $gallery=DB::table('gallery')->where('MaTCay',1)->select('*')->get();
                //
                $comments=DB::table('review')->join('taikhoan','taikhoan.MaTaiKhoan','=','review.MaTk')->where('MaSp',1)->select('*')->get();
          return view("detail/detail",compact('product','gallery','comments','cungloai','count','cart','sl'));
      }
  
     //phan loai theo the loai
     public function Catogories(Request $request,$id)
     { 
        if($request->ajax())
        {
            if($id=='catagory')
                $products =$this->getAllProduct_query();
            else
            $products = $this->getProductByCategoryId_query_ToPaginate($id);
            return view('shop/data',compact('products'))->render();
        }
     }
     // phan loai theo hang
     public function Brands(Request $request,$id)
     { 
        if($request->ajax())
        {
            if($id=='brands')
                $products =$this->getAllProduct_query();
            else
            $products = $this->getProductByBrandId_query_ToPaginate($id);
            return view('shop/data',compact('products'))->render();
        }
     }
     // chi tiet san pham
     public function details($id)
     { 
            $maloai=DB::table('traicay')->where('MaTraiCay',$id)->select('traicay.MaLoai')->get();
            foreach($maloai as $row)$maloai=$row->MaLoai;
            $cungloai =$this->getProductBySameCategory_query($maloai,$id);
            ////
            $comments=DB::table('review')
            ->join('taikhoan','taikhoan.MaTaiKhoan','=','review.MaTk')
            ->where('MaSp',$id)
            ->select('*')
            ->get();
            ////
            $product=$this->getProductById_query($id);
            ////
            $gallery=DB::table('gallery')->where('MaTCay',$id)->select('*')->get();
         if(isset($_COOKIE['id']))
         {
            $cart =(new CartController)->getCartByAccountId_query($_COOKIE['id']);
            $count=$this->count_products();
            $sl=null;
        }
        else
        {
            $cart = (new CartController)->getCartBySession_query();
            $sl=session()->get('sl',[]);
            $count=$this->count_products();  
        }
            return view("detail/detail",compact('product','cungloai','gallery','comments','count','cart','sl'));
     }
       // Phan loai san pham
       public function Shopview(Request $request)
       {
            $routeName=$request->path();
            $cats = DB::table('loaitraicay')->select('*')->get();
            $brand = DB::table('nhacungcap')->select('*')->get();
          if($routeName=='basket')
            $products = $this->getProductByCategoryId_query_ToPaginate(3);
          else
            $products =$this->getAllProduct_query();

           if(isset($_COOKIE['id']))
           {
                $cart = (new CartController)->getCartByAccountId_query($_COOKIE['id']);
                $count=$this->count_products();
            return view('shop/shop', compact('cats', 'brand', 'products','count','cart'),['name'=>$routeName]);
            }
            else
            {
                $cart = (new CartController)->getCartBySession_query();
                $sl=session()->get('sl',[]);
                $count=$this->count_products();
            return view('shop/shop', compact('cats', 'brand', 'products','count','cart','sl'),['name'=>$routeName]);
            }
       }
       // tim kiem san pham bang tu khoa
       public function timkiem(Request $request)
       {  
            if ($request->ajax()) {
                $products = DB::table('traicay')
                ->leftJoin('banggia', function($join) {
                    $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
                    ->where('NgayBatDau', '<=', Carbon::now())
                    ->where('NgayKetThuc', '>=', Carbon::now());
                })
                ->where('TenTraiCay','like','%'.($request->tukhoa).'%')
                ->join('donvi','donvi.MaDonVi','traicay.UnitID')
                ->select('traicay.*','banggia.*','donvi.*')
                ->paginate(8);
                return view('shop/data', compact('products'))->render();
            }
    }
      // tim kiem san pham gia
      public function RangePrice(Request $request)
      {  
           if ($request->ajax()) {
               $products = DB::table('traicay')
               ->leftJoin('banggia', function($join) {
                $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
                ->where('NgayBatDau', '<=', Carbon::now())
                ->where('NgayKetThuc', '>=', Carbon::now());
            })
               ->whereBetween(
                DB::raw("CASE WHEN banggia.ChietKhau 
               IS NOT NULL THEN banggia.GiaBan
               ELSE traicay.GiaGoc END"),[1,$request->price])
               ->orderBy( DB::raw("CASE WHEN banggia.ChietKhau 
               IS NOT NULL THEN banggia.GiaBan
               ELSE traicay.GiaGoc END",'asc'))
               ->join('donvi','donvi.MaDonVi','traicay.UnitID')
               ->select('traicay.*','banggia.*','donvi.*')
               ->paginate(8);
               return view('shop/data', compact('products'))->render();
           }
   }
   //
   public function RangeBetween(Request $request)
   {  
        if ($request->ajax()) {
            $products = DB::table('traicay')
            ->leftJoin('banggia', function($join) {
             $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
             ->where('NgayBatDau', '<=', Carbon::now())
             ->where('NgayKetThuc', '>=', Carbon::now());
         })
            ->whereBetween(
             DB::raw("CASE WHEN banggia.ChietKhau 
            IS NOT NULL THEN banggia.GiaBan
            ELSE traicay.GiaGoc END"),[intval($request->min),intval($request->max)])
            ->orderBy( DB::raw("CASE WHEN banggia.ChietKhau 
            IS NOT NULL THEN banggia.GiaBan
            ELSE traicay.GiaGoc END",'asc'))
            ->join('donvi','donvi.MaDonVi','traicay.UnitID')
            ->select('traicay.*','banggia.*','donvi.*')
            ->paginate(8);
            return view('shop/data', compact('products'))->render();
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
// dem san pham trong gio hang
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
    public function upload(Request $request)
    {
       $mahd = $_POST['mahd'];
       $img='';
        $dataArray = json_decode($request->input('data_arr'), true);
        for($i=0; $i< count($dataArray) ;$i++)
        {
            $id=$dataArray[$i];
            if ($request->hasFile('fileToUpload1-'.$id)) {
                $image = $request->file('fileToUpload1-'.$id);
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('img/danhgia/'), $imageName);
                $img.="<img src='img/danhgia/".$imageName."' width=100 height=100 style='margin-left:5px'>";
            } 
            if ($request->hasFile('fileToUpload2-'.$id)) {
                $image = $request->file('fileToUpload2-'.$id);
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('img/danhgia/'), $imageName);
                $img.="<img src='img/danhgia/".$imageName."' width=100 height=100 style='margin-left:5px'>";
            } 
            DB::table('review')->insert(
                array(
                    'MaTk'=>$_COOKIE['id'],
                    'MaSp'=>$id,
                    'Comment'=>$_POST['textarea'.$id],
                    'ReviewIMG'=>$img,
                    'Rating'=>intval($_POST['sao'.$id]),
                    'NgayThang'=>Carbon::now(),
                    'TinhTrang'=>'true',
                ));
                $img='';
        }
            DB::table('hoadon')->where('MaHD','=',$mahd) 
            ->update([
                'DanhGia'=>'true',
            ]);
            session()->get('mess');
            session()->put('mess','Cảm ơn bạn đã phản hồi sản phẩm.');
            return redirect('/gh');
    }

////////////////////////////////////////////////////////////////
////////////////////////QUERY----HERE///////////////////////////

    public function getAllProduct_query()
    {
       $products= DB::table('traicay') 
            ->leftJoin('banggia', function($join) {
                $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
                ->where('NgayBatDau', '<=', Carbon::now())
                ->where('NgayKetThuc', '>=', Carbon::now());
            })
            ->join('donvi','donvi.MaDonVi','traicay.UnitID')
            ->select('traicay.*','banggia.*','donvi.*')->paginate(8);
            return $products;
    }
    //
    public function getProductById1_query()
    {
       $product=DB::table('traicay')
                ->leftJoin('banggia', function($join) {
                        $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
                        ->where('NgayBatDau', '<=', Carbon::now())
                        ->where('NgayKetThuc', '>=', Carbon::now());
                    })
                ->where('traicay.MaTraiCay', '=', 1)
                ->join('donvi','donvi.MaDonVi','traicay.UnitID')
                ->select('traicay.*','banggia.*','donvi.*')->get();
                return $product;
    }
    //
    public function getProductById_query($id)
    {
        $product=DB::table('traicay')
        ->leftJoin('banggia', function($join) {
                $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
                ->where('NgayBatDau', '<=', Carbon::now())
                ->where('NgayKetThuc', '>=', Carbon::now());
            })
        ->where('traicay.MaTraiCay', '=', $id)
        ->join('donvi','donvi.MaDonVi','traicay.UnitID')
        ->select('traicay.*','banggia.*','donvi.*')->get();
        return $product;
    }
    //
    public function getProductByCategoryId_query($id)
    {
        $loai = DB::table('traicay')
        ->leftJoin('banggia', function($join) {
            $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
            ->where('NgayBatDau', '<=', Carbon::now())
            ->where('NgayKetThuc', '>=', Carbon::now());
        })
        ->where('traicay.MaLoai', '=', $id)
        ->join('donvi','donvi.MaDonVi','traicay.UnitID')
        ->select('traicay.*','banggia.*','donvi.*')->get();
        return $loai;
    }
    //
    public function getProductBySameCategory_query($maloai,$id)
    {
        $loai = DB::table('traicay')
        ->leftJoin('banggia', function($join) {
            $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
            ->where('NgayBatDau', '<=', Carbon::now())
            ->where('NgayKetThuc', '>=', Carbon::now());
        })
        ->where('traicay.MaLoai', '=', $maloai)
        ->where('traicay.MaTraiCay','!=',$id)
        ->join('donvi','donvi.MaDonVi','traicay.UnitID')
        ->select('traicay.*','banggia.*','donvi.*')->get();
        return $loai;
    }
    //
    public function getProductByCategoryId_query_ToPaginate($id)
    {
        $loai = DB::table('traicay')
        ->leftJoin('banggia', function($join) {
            $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
            ->where('NgayBatDau', '<=', Carbon::now())
            ->where('NgayKetThuc', '>=', Carbon::now());
        })
        ->where('traicay.MaLoai', '=', $id)
        ->join('donvi','donvi.MaDonVi','traicay.UnitID')
        ->select('traicay.*','banggia.*','donvi.*')->paginate(8);
        return $loai;
    }
    //
    public function getProductByBrandId_query($id)
    {
        $ncc = DB::table('traicay')
        ->leftJoin('banggia', function($join) {
            $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
            ->where('NgayBatDau', '<=', Carbon::now())
            ->where('NgayKetThuc', '>=', Carbon::now());
        })
        ->where('traicay.MaNcc', '=', $id)
        ->join('donvi','donvi.MaDonVi','traicay.UnitID')
        ->select('traicay.*','banggia.*','donvi.*')->get();
        return $ncc;
    }
    //
    public function getProductByBrandId_query_ToPaginate($id)
    {
        $ncc = DB::table('traicay')
        ->leftJoin('banggia', function($join) {
            $join->on('traicay.MaTraiCay', '=', 'banggia.MaSanPham')
            ->where('NgayBatDau', '<=', Carbon::now())
            ->where('NgayKetThuc', '>=', Carbon::now());
        })
        ->where('traicay.MaNcc', '=', $id)
        ->join('donvi','donvi.MaDonVi','traicay.UnitID')
        ->select('traicay.*','banggia.*','donvi.*')->paginate(8);
        return $ncc;
    }
}