<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>TD Shop | Đăng nhập</title>

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/animate.min.css" />
    <link rel="stylesheet" href="bootstrap/bootstrap.css" />
</head>

<body>
    @include("header")
    <div id="container-login">
        <div id="menu-login">
            <ul>
                <li><a href="home">Trang Chủ</a></li>
                <li><a href="shop">Trái Cây</a></li>
                <li><a href="ct">Chi Tiết</a></li>
                <li><a href="gh">Giỏ Hàng</a></li>
                <li><a href="tt">Thanh Toán</a></li>
            </ul>
        </div>
        <div id="content-login">
            <div id="form-container">
                @empty($ck)
                <div id="loginform">
                    <form>
                        <div class="tiltle">
                            <h2>Đăng Nhập</h2>
                        </div>
                        <div>
                            <b>Tài khoản <a style="color:red;">*</a></b><br>
                            <input type="text" id="username" name="user_name" value="" placeholder="Username" required>
                        </div>
                        <div>
                            <b>Mật khẩu <a style="color:red;">*</a></b><br>
                            <input type="password" id="password" name="pass_word" value="" placeholder="Password"
                                required>
                        </div>
                        <div>
                            <input type="checkbox" onclick="showPass('password')" style="width:14px;height:12px;">
                            Hiện mật khẩu
                        </div>
                        <div class="option">
                            <i class="i">Chưa có tài khoản?<a href="javascript:show_hide(1);" style="color:blue;"> Đăng
                                    ký</a></i>
                        </div>
                        <div class="option">
                            <i class="i">Quên mật khẩu?<a href="javascript:show_hide(2);" style="color:blue;"> Khôi
                                    phục</a></i>
                        </div>
                    </form>
                    <div class="submit">
                        <button class="btn btn-success" onclick="signIn();">Đăng nhập</button>
                        <h4 style="color:red;" id="error-login"></h4>
                    </div>
                </div>
                <div id="signUpform">
                    <form>
                        <div class="tiltle">
                            <h2>Đăng Ký</h2>
                        </div>
                        <div>
                            <b>Tài khoản<a style="color:red;">*</a></b><br>
                            <input type="text" id="user_name" name="user_name" value="" placeholder="Username" required>
                        </div>
                        <div>
                            <b>Mật khẩu <a style="color:red;">*</a></b><br>
                            <input type="password" id="pass_word" name="pass_word" value="" placeholder="Password"
                                required>
                        </div>
                        <div>
                            <b>Xác nhận mật khẩu <a style="color:red;">*</a></b>
                            <input type="password" id="confirm_pass-signup" name="confirm_pass" value=""
                                placeholder="Confirm Password" required>
                        </div>
                        <div>
                            <input type="checkbox" onclick="showPass('pass_word')" style="width:14px;height:12px;">
                            Hiện mật khẩu
                        </div>
                        <br>
                    </form>
                    <div class="submit">
                        <button class="btn btn-success" onclick="signUp();">Đăng
                            ký</button>
                        <h4 style="color:red;" id="error-signUp"></h4>
                    </div>
                </div>
                <div id="recoverPassform">
                    <form action="#" method="get">
                        <div class="tiltle">
                            <h2>Khôi phục mật khẩu</h2>
                        </div>
                        <div>
                            <b>Email<a style="color:red;">*</a></b><br>
                            <input type="email" id="email_otp" name="email" value=""
                                placeholder="Mã OTP sẽ gửi về địa chỉ email tại đây!" required>
                        </div>
                        <br>
                    </form>
                    <div class="submit">
                        <button class="btn btn-secondary" onclick="next();">Tiếp
                            tục</button>
                    </div>
                </div>
                <div id="OTPform">
                    <form action="#" method="get">
                        <div class="tiltle">
                            <h2>Xác nhận mã OTP</h2>
                        </div>
                        <p>Mã chỉ có tác dụng trong:</p>
                        <p id="countdown" style="font-size:33px;"></p>
                        <p id="email_to"></p>
                        <div id="inputs" class="inputs">
                            <input class="input-otp" id="i1" type="text" inputmode="numeric" maxlength="1" require />
                            <input class="input-otp" id="i2" type="text" inputmode="numeric" maxlength="1" require />
                            <input class="input-otp" id="i3" type="text" inputmode="numeric" maxlength="1" require />
                            <input class="input-otp" id="i4" type="text" inputmode="numeric" maxlength="1" require />
                            <input class="input-otp" id="i5" type="text" inputmode="numeric" maxlength="1" require />
                        </div><br>
                    </form>
                    <button onclick="checkcode();" class="btn btn-primary" style="margin-left:35%;">Xác
                        nhận</button>
                    <button onclick="reloadcode();" class="btn btn-secondary" style="margin-left:5%;">Gửi
                        lại <i class="fa fa-refresh fa-spin" style="font-size:15px"></i></button>
                    <br>
                    <h4 style="color:red;text-align:center;" id="error-otp"></h4>
                </div>
                <div id="newPassform">
                    <form action="#" method="get">
                        <div class="tiltle">
                            <h2>Xác nhận mật khẩu mới</h2>
                        </div>
                        <div>
                            <p>Mật khẩu mới gồm ...</p>
                        </div>
                        <div>
                            <b>Mật khẩu mới<a style="color:red;">*</a></b><br>
                            <input id="new_pass" type="password" placeholder="Mật khẩu mới" require />
                        </div>
                        <div>
                            <b>Nhập lại mật khẩu mới<a style="color:red;">*</a></b><br>
                            <input id="confirm_pass" type="password" placeholder="Nhập lại mật khẩu mới" require />
                        </div>
                        <div>
                            <input type="checkbox" onclick="showPass('new_pass')" style="width:14px;height:12px;">
                            Hiện mật khẩu
                        </div>
                        <br>
                    </form>
                    <div class="submit">
                        <button onclick="checkpass();" class="btn btn-primary">Xác
                            nhận</button>
                        <h4 style="color:red;" id="error-newpass"></h4>
                    </div>
                </div>
                @endempty
                @isset($ck)
                @foreach($info as $row)
                <div class="text-center" id="info">
                    <h3>Thông tin tài khoản</h3>
                    <p><b>Tài Khoản:</b> {{$row->TaiKhoan}}</p>
                    <p><b>Email:</b> {{$row->Email}}</p>
                    <p><b>Số Điện Thoại:</b> {{$row->Phone}}</p>
                    <p><b>Địa Chỉ:</b> {{$row->DiaChi}}</p>
                    <p><b>Họ Tên:</b> {{$row->HoTen}}</p>
                    <a href="javascript:show_edit();" style="color:green;">Chỉnh sửa</a><br>
                    <a href="logout" style="color:red;">Đăng Xuất</a>
                </div>
                <div id="edit-form" style="display:none">
                    <a href="login">
                        << Back</a>
                            <form>
                                <div class="tiltle">
                                    <h2>Edit Profile</h2>
                                </div>
                                <div>
                                    <b>Ho Ten<a style="color:red;">*</a></b><br>
                                    <input type="text" id="username-edit" name="username-edit" value="{{$row->HoTen}}"
                                        placeholder="Full Name" required>
                                </div>
                                <div>
                                    <b>Dia Chi<a style="color:red;">*</a></b><br>
                                    <input type="text" id="address-edit" name="address-edit" value="{{$row->DiaChi}}"
                                        placeholder="Your Address" required>
                                </div>
                                <div>
                                    <b>Email<a style="color:red;">*</a></b><br>
                                    <input type="email" id="email-edit" name="email-edit" value="{{$row->Email}}"
                                        placeholder="Your Email" required>
                                </div>
                                <div>
                                    <b>Phone number<a style="color:red;">*</a></b><br>
                                    <input type="text" id="phone-edit" name="phone-edit" value="{{$row->Phone}}"
                                        placeholder="Phone Number" required>
                                </div>
                                <br>
                            </form>
                            <div class="submit">
                                <button class="btn btn-success" onclick="editProfile({{$row->MaTaiKhoan}});">Cập
                                    nhật</button>
                                <h4 style="color:green;" id="error-edit"></h4>
                            </div>
                </div>
                @endforeach
                @endisset
            </div>
        </div>
    </div>
    @include("footer")

    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/login.js"></script>
    <script>
    function show_edit() {
        document.getElementById('edit-form').style.display = "block";
        document.getElementById('info').style.display = "none";
    }
    </script>
</body>

</html>