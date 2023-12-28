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
                <div id="include">
                    @include('auth/login-form')
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