<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" type="text/css" href="css/home.css" />
    <link rel="stylesheet" type="text/css" href="css/contact.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    @include('header')
    <div class="container-contact">
        <div class="banner-contact">
            <div>
                <h1>Liên Hệ</h1>
            </div>
            <div class="route"><a>Trang chủ </a><a class='arrow right'></a><a class="active"> Liên hệ</a></div>
        </div>
        @foreach($contact as $row)
        <div class="container-noidung">
            <div class="info-form">
                <div class="info">
                    <div><i style="font-size:15px" class="fa fa-contact">&#xf041;</i> {{$row->DiaChi}}</div>
                    <div><i style="font-size:15px" class="fa fa-contact">&#xf095;</i> {{$row->Sdt}}</div>
                    <div><i style="font-size:15px" class="fa fa-contact">&#xf0e0;</i> {{$row->Email}}</div>
                </div>
                <hr width=90%>
                <div class="form">
                    <h3>Liên hệ với chúng tôi</h3>
                    <div><input type="text" id="fullname" placeholder="Họ và tên" required></div>
                    <div><input type="email" id="mail" placeholder="Email" required></div>
                    <div><textarea id="content" cols="30" rows="10" placeholder="Nội dung" required></textarea></div>
                    <div><button class="btn-contact" onclick="Feedback()">Gửi liên hệ</button></div>
                </div>
            </div>
            <div class="ggmap">
                <iframe src="{{$row->Map}}" width="800" height="550" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
    @endforeach
    @include('footer2')
    <script src="js/jquery.min.js"></script>
    <script>
    function Feedback() {
        var name = $('#fullname').val();
        var mail = $('#mail').val();
        var content = $('#content').val();
        var flag = true;
        if (name == '') {
            $('#fullname').css({
                'border': '1px solid red'
            });
            flag = false;
        } else
            $('#fullname').css({
                'border': '1px solid grey'
            });
        //
        if (mail == '') {
            $('#mail').css({
                'border': '1px solid red'
            });
            flag = false;
        } else {
            $('#mail').css({
                'border': '1px solid grey'
            });
        }
        // 
        if (content == '') {
            $('#content').css({
                'border': '1px solid red'
            });
            flag = false;
        } else
            $('#content').css({
                'border': '1px solid grey'
            });
        //
        if (!isValidEmail(mail)) {
            $('#mail').css({
                'border': '1px solid red'
            });
            flag = false;
        } else
            $('#mail').css({
                'border': '1px solid grey'
            });
        //
        if (flag == true) {
            $.ajax({
                type: "get",
                url: "sendFeedback",
                data: {
                    'fullname': name,
                    'email': mail,
                    'content': content,
                },
                success: function() {
                    $('#fullname,#mail,#content').val('');
                    alert('Gửi phản hồi thành công.');
                }
            });
        }
    }
    //
    function isValidEmail(email) {
        // Sử dụng một biểu thức chính quy để kiểm tra định dạng email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    </script>

</body>

</html>