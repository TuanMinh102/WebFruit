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
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />

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
                @include('auth/profile')
                @endisset
            </div>
        </div>
    </div>

    @include("footer")

    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/login.js"></script>
    <script>
    function show_edit() {
        document.getElementById('edit-form').style.display = "block";
        document.getElementById('info').style.display = "none";
    }

    var fancybox = document.getElementsByClassName('fancybox');

    function loadImg(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img-avatar').attr('src', e.target.result);
                fancybox[0].setAttribute('data-src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
    </script>
</body>

</html>