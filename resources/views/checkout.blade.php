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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- ##### Main Content Wrapper Start ##### -->
    <div>
        <a href="home"><img src="img/logo2.jpg" alt=""></a>
    </div>
    <div>
        <h1>THANH TOÁN</h1>
    </div>
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
            <form action="ttoan" method="get">
                <div class="row">
                    <div class="row-input">
                        <input type="text" name="first_name" id="first_name" value="" placeholder="Họ" required>
                    </div>
                    <div class="row-input">
                        <input type="text" id="last_name" value="" placeholder="Tên" required>
                    </div>
                    <div class="col-input">
                        <input type="text" id="company" placeholder="Công ty" value="">
                    </div>
                    <div class="col-input">
                        <input type="email" name="email" id="email" placeholder="Email" value="">
                    </div>
                    <div class="col-input">
                        <select class="w-100" id="Quận">
                            <option value="usa">Bình Tân</option>
                            <option value="uk">Tân Phú</option>
                            <option value="ger">Quận Gò Vấp</option>
                            <option value="fra">Quận 1</option>
                            <option value="ind">Quận 2</option>
                            <option value="aus">Quận 3</option>
                            <option value="bra">Quận 4</option>
                            <option value="cana">Quận 5</option>
                        </select>
                    </div>
                    <div class="col-input">
                        <input type="text" class="form-control mb-3" name="address" id="address" placeholder="Địa chỉ"
                            value="">
                    </div>
                    <div class="col-input">
                        <input type="text" id="city" placeholder="Thành Phố" value="">
                    </div>
                    <div class="row-input">
                        <input type="text" id="zipCode" placeholder="Mã Zip" value="">
                    </div>
                    <div class="row-input">
                        <input type="number" name="phone" id="phone_number" min="0" placeholder="Số Điện Thoại"
                            value="">
                    </div>
                    <div class="col-input">
                        <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10"
                            placeholder="Nhận xét"></textarea>
                    </div>
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

</html>