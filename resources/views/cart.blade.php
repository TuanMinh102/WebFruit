<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Cart</title>

    <!-- Favicon  -->
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <!-- ##### Main Content Wrapper Start ##### -->
    <div>
        <a href="home"><img src="img/logo2.jpg" alt=""></a>
    </div>
    <div>
        <h1>Shopping Cart</h1>
    </div>
    <div id="container-cart">
        <div id="menu-cart">
            <ul>
                <li><a href="home">Home</a></li>
                <li><a href="shop">Shop</a></li>
                <li><a href="ct">Product</a></li>
                <li><a>=> </a><a class="active" href="gh">Cart</a></li>
                <li><a href="tt">Checkout</a></li>
            </ul>
        </div>
        <div id="content-cart">
            <div class="del-his" style="width:98%;">
                <a href="javascript:delAllproduct()" style="color:red;">Xóa toàn bộ</a>
                <a href="javascript:show_hide(0)" style="float:right;"><i class="fa fa-history"></i>Lịch sử thanh
                    toán</a>
            </div>
            <div id="result">
                <div id="my">
                    <table style="width:100%;">
                        <thead>
                            <tr>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quatity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $row)
                            <tr>
                                <td>
                                    <a href="#"><img src="img/fruit/{{$row->Anh}}" alt="Product" class="img-cart"></a>
                                </td>
                                <td>
                                    <h3>{{$row->TenTraiCay}}</h3>
                                </td>
                                <td>
                                    <span>${{round($row->GiaBan-(($row->GiaBan*$row->Discount)/100))}}</span>
                                </td>
                                <td>
                                    <div class="qty">
                                        <div class="substract-add">
                                            <button onclick="tang_giam(0,{{$row->MaTraiCay}});">-</button>
                                            @if(isset($sl))
                                            <input min="1" value="{{$sl[$row->MaTraiCay]}}" id="qty{{$row->MaTraiCay}}"
                                                disabled>
                                            @else
                                            <input min="1" value="{{$row->SoLuong}}" id="qty{{$row->MaTraiCay}}"
                                                disabled>
                                            @endif
                                            <button onclick="tang_giam(1,{{$row->MaTraiCay}});">+</button>
                                            <b> /Kg</b>
                                            <a href="javascript:delProduct({{$row->MaTraiCay}});"
                                                style="font-size:20px;margin-left:10px;"><i class="fa fa-trash"
                                                    style="color:red;"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="total-checkout">
            <div class="summary-table">
                <div>
                    <h2 style="text-align:center;">Checkout Total</h2>
                </div>
                <ul>
                    <li><span>Subtotal:</span><span class="cost"> ${{$total}}.000 VND</span></li>
                    <li><span>Delivery:</span><span class="cost"> ${{$total}}.000 VND Free</span></li>
                    <li><span>Total:</span><span id="total" class="cost"> ${{$total}}.000 VND</span></li>
                </ul>
                <br><br>
                <button class="bt" onclick="location.href='tt'">Checkout</button>
            </div>
        </div>
    </div>
    <div id="child">
        <div><button id="cancel" onclick="show_hide(1);">X</button></div>
        <div style="text-align:center;">
            <h3>Lịch sử thanh toán</h3>
        </div>
        <div>
            <table style="width:100%; border-collapse: collapse;">
                <thead style="background-color:#f8f9fa;">
                    <tr>
                        <th>Mã các sản phẩm</th>
                        <th>Tên người nhận</th>
                        <th>Tổng số lượng</th>
                        <th>Đơn giá</th>
                        <th>Ngày Lập</th>
                        <th>Nơi nhận</th>
                        <th>Tình trạng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bill as $row)
                    <tr class="tr">
                        <td>{{$row->MaTraiCay}}</td>
                        <td>{{$row->HoTen}}</td>
                        <td>{{$row->SoLuong}}</td>
                        <td>${{$row->DonGia}}</td>
                        <td>{{$row->NgayLapHD}}</td>
                        <td>{{$row->NoiChuyen}}</td>
                        <td>{{$row->TinhTrang}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include("footer2")
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/cart.js"></script>
</body>

</html>