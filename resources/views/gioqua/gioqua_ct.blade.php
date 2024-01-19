<!DOCTYPE html>
<html lang="en">

<head>
    @include("home/templates/head")
    @include("home/templates/css")
</head>

<body>
    @include("home/templates/header")
    @include("home/templates/menu")
    @include("home/templates/breadcrumb")
    <div class=" wrap-main">
        @foreach($gioquas as $row)
        <div class="title-trangtrong">
            <h3>{{$row->TenGioQua}}</h3>
        </div>
        @endforeach
        <div class="container-ct-product">
            <div class="img-ct-product">
                <div class="product-deail">
                    @foreach($gioquas as $row)
                    <div class="img-active">
                        <a href="images/gioqua/{{$row->Anh}}" id="Zoom-1" class="MagicZoom"
                            data-options="zoomMode: true; hint: true; rightClick: true; selectorTrigger: hover; expandCaption: fasle; history: fasle;">
                            <img src="images/gioqua/{{$row->Anh}}" alt="">
                        </a>
                        @php $idsp=$row->MaGioQua; @endphp
                    </div>
                    @endforeach
                </div>
                <div class="product-galary mt-3">
                    @foreach($gallery as $row)
                    <div style="width:100px;height: 100px;">
                        <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="images/gallery/{{$row->Anh}}">
                            <img src="images/gallery/{{$row->Anh}}"></a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="product_desc">
                @foreach( $gioquas as $row)
                <h3 class="name-product-ct">
                    {{$row->TenGioQua}}
                </h3><br>
                <span class="price-product-ct"><b>Giá: </b><span>{{$row->GiaBan}}.000<u>đ</u>
                    </span>/Giỏ</span><br><br>

                <span><b>Tình Trạng:</b>@if($row->TinhTrang=='true')<span> Còn
                        hàng</span>@else<span style="color:red;"> Hết hàng</span>@endif</span>
                <form class="cart clearfix" method="get" action="gh{{$row->MaGioQua}}">
                    <div class="cart-btn d-flex mb-3 mt-3 align-items-center">
                        <span><b>Số lượng: {{$row->SoLuong}}</b></span>
                    </div>
                    <button type="submit" name="addtocart" class="btn btn-primary">
                        <span>
                            <a class="text-decoration-none" style="color:white" target="_blank" href="pusher">Liên
                                hệ</a>
                        </span>
                    </button>
                </form>
                <div class="mota-product-ct mt-3">
                    <b>Mô Tả:</b> {{$row->MoTaGQ}}
                </div>
                @endforeach
            </div>
        </div>
        <div class="product-cung-loai">
            <div class="title-product-cungloai">
                <span>Sản phẩm cùng loại</span>
            </div>
            <div class="list-product grid-4 padding-20 text-center">
                @foreach($gioquacls as $row)
                <div class="item-sanpham">
                    <div class="container-sanphan">
                        <div class="img-sanpham scale-img">
                            <img src="images/gioqua/{{$row->Anh}}" alt="">
                        </div>
                        <a class="name-sanpham text-decoration-none" href="getgioqua_home_ct{{$row->MaGioQua}}">
                            <h3>{{$row->TenGioQua}}</h3>
                        </a>

                        <div class="price-sanpham">
                            <span>
                                <span>Giá:</span> {{$row->GiaBan}}.000<u>đ</u>/Giỏ
                            </span>
                        </div>
                        <div class="cart mt-2">
                            <a class="text-decoration-none" target="_blank" href="pusher">Liên hệ</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @include("footer2")
    @include("home/templates/js")

</body>

</html>