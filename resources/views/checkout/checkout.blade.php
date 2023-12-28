<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>TD Shop | Thanh Toán</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/checkout.css">
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- ##### Main Content Wrapper Start ##### -->
    <!-- <div>
        <a href="home"><img src="img/logo2.jpg" alt=""></a>
    </div> -->
    <div>
        <h1>THANH TOÁN</h1>
    </div>
    @if(session()->has('mess-true'))
    <div class="alert alert-success">
        <b>Thành công! </b><?php echo session()->get('mess-true'); session()->forget('mess-true');?>
        <button style="float:right" onclick="hideMess()">X</button>
    </div>
    @elseif(session()->has('mess-false'))
    <div class="alert alert-danger">
        <b>Thất bại! </b><?php echo session()->get('mess-false'); session()->forget('mess-false');?>
        <a href="/shop">Go to shop</a>
        <button class="btn-close" style="float:right" onclick="hideMess()">X</button>
    </div>
    @endif
    <div id="container-checkout">
        <div id="menu-checkout">
            <ul>
                <li><a href="home">Trang Chủ</a></li>
                <li><a href="shop">Trái Cây</a></li>
                <li><a href="ct">Sản Phẩm</a></li>
                <li><a href="gh">Giỏ Hàng</a></li>
                <li><a>=> </a><a class="active" href="tt">Thanh Toán</a></li>
            </ul>
        </div>
        <div id="content-checkout">
            <form action="ttoan" method="post">
                @csrf
                <div class="row">
                    <div class="line">
                        <label for="">Họ</label>
                        <input type="text" name="first_name" id="first_name" value="" placeholder="Họ" required>
                    </div>
                    <div class="line">
                        <label for=""><i style="font-size:15px" class="fa">&#xf007;</i> Tên</label>
                        <input type="text" id="last_name" value="" placeholder="Tên" required>
                    </div>
                </div>
                <div class="col">
                    <label for=""><i style="font-size:15px" class="fa">&#xf2bc;</i> Công ty</label>
                    <input type="text" id="company" placeholder="Công ty" value="">
                </div>
                <div class="col">
                    <label for=""><i style="font-size:15px" class="fa">&#xf0e0;</i> Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" value="" required>
                </div>
                <div class="row">
                    <div class="line">
                        <label for=""><i style="font-size:15px" class="fa">&#xf19c;</i> Thành phố</label>
                        <input type="text" id="city" placeholder="Thành Phố" value="" required>
                    </div>
                    <div class="line">
                        <label for="">Quận</label>
                        <select class="w-100" id="Quận">
                            <option value="usa">Bình Tân</option>
                            <option value="uk">Tân Phú</option>
                            <option value="ger">Quận Gò Vấp</option>
                            <option value="fra">Quận 1</option>
                            <option value="ind">Quận 2</option>
                            <option value="aus">Quận 3</option>
                            <option value="bra">Quận 4</option>
                            <option value="cana">Quận 5</option>
                            <option value="cana">Quận 6</option>
                            <option value="cana">Quận 7</option>
                            <option value="cana">Quận 8</option>
                            <option value="cana">Quận 9</option>
                            <option value="cana">Quận 10</option>
                            <option value="cana">Quận 11</option>
                            <option value="cana">Quận 12</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <label for=""><i style="font-size:15px" class="fa">&#xf1ad;</i> Địa chỉ</label>
                    <input type="text" class="form-control mb-3" name="address" id="address" placeholder="Địa chỉ"
                        value="" required>
                </div>
                <div class="row">
                    <div class="line">
                        <label for="">Mã zip</label>
                        <input type="text" id="zipCode" placeholder="Mã Zip" value="">
                    </div>
                    <div class="line">
                        <label for=""><i style="font-size:15px" class="fa">&#xf095;</i> Số điện thoại</label>
                        <input type="number" name="phone" id="phone_number" min="0" placeholder="Số Điện Thoại" value=""
                            required>
                    </div>
                </div>
                <div class="col">
                    <label for=""><i style="font-size:15px" class="fa">&#xf0e6;</i> Nhận xét</label>
                    <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10"
                        placeholder="Nhận xét"></textarea>
                </div>
        </div>
        <div id="total-checkout">
            <div>
                <h2 style="text-align:center;">Tổng Thanh Toán</h2>
            </div>
            <ul class="summary-table">
                <li><span>Tạm Tính:</span><span class="cost"> ${{$total}}.000 VND</span></li>
                <li><span>Vận Chuyển:</span><span class="cost"> ${{$total}}.000 VND Free</span></li>
                <li><span>Tổng:</span><span id="total" class="cost"> ${{$total}}.000 VND</span></li>
            </ul>
            <div class="payment-method">
                <!-- Cash on delivery -->
                <div class="">
                    <img class="ml-15" style="width:30px;" src="img/visa.png" alt="">
                    <input type="checkbox" class="" id="cod" checked>
                    <label class="" for="cod">Cash on Delivery</label>
                </div>
                <!-- Paypal -->
                <div class="">
                    <img class="ml-15" style="width:30px;" src="img/paypal.png" alt="">
                    <input type="checkbox" class="" id="paypal">
                    <label class="" for="paypal">Paypal</label>
                </div>
            </div>
            <br><br>
            <button class="btn-checkout">Thanh Toán</button>
        </div>
        </form>
    </div>
    @include("footer2")

</body>
<script>
function hideMess() {
    document.getElementsByClassName('alert')[0].style.display = 'none';
}
</script>

</html>