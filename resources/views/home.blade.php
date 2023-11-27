<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/home.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/style_now.css" />
    <link rel="stylesheet" type="text/css" href="owlcarousel2/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="owlcarousel2/owl.theme.default.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-style.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="accset/fotorama/fotorama-style.css" />
    <link rel="stylesheet" href="accset/fotorama/fotorama.css" />
    <link rel="stylesheet" type="text/css" href="css/animate.min.css" />

    @include("function")
</head>

<body>
    <div class="header">
        <div class="header-top">
            <div class="wrap-content">
                <div class="address-header"><img class="mr-2" src="img/icon-dc.png" alt="">
                    <span>Địa chỉ: Huỳnh Thúc Kháng ,Quận 1,TP HCM</span>
                </div>
                <div class="email-header">
                    <img class="mr-2" src="img/icon-gmail.png" alt="">
                    <span>Email: TDShopPanpage@gmail.com</span>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="wrap-content">
                <div class="logo-header">
                    <img class="mr-2" src="img/logo2.jpg" alt="">
                </div>
                <div class="banner-header">
                    <!-- <img class="mr-2" src="img/banner.png" alt=""> -->
                    <h2 style="color:red;font-style: italic;font-family:serif;font-weight: 900;">TRÁI CÂY TƯƠI TD SHOP -
                        TRÁI CÂY TP.HCM</h2>
                </div>
                <div class="hotline-header">
                    <p>Hotline tư vấn</p>
                    <span>0981965197</span>
                    <span>0981965197</span>
                </div>
            </div>
        </div>
    </div>
    <div class="menu">
        <div class="wrap-content">
            <ul class="menu-main">
                <li><a class="active" href="home">Trang chủ</a></li>
                <li><a href="">Giới thiệu</a></li>
                <li><a href="basket">Giỏ trái cây</a></li>
                <li><a href="shop">Trái cây</a></li>
                <li><a href="news">Tin tức</a></li>
                <li><a href="">Liên Hệ</a></li>
                <li><a href="login">Đăng nhập</a></li>
            </ul>
        </div>
    </div>
    <div class="slider">
        <div id="wowslider-container1">
            <div class="ws_images">
                <ul>
                    @foreach($traicays as $row)
                    <li><img src="img/fruit/{{$row->Anh}}" alt="" title="" id="{{$row->MaTraiCay}}" /></li>
                    <!-- <li><img src="img/ha2.jpg" alt="" title="" id="wows1_1" /></li>
                    <li><img src="img/ha3.jpg" alt="" title="" id="wows1_2" /></li>
                    <li><img src="img/ha4.jpg" alt="" title="" id="wows1_3" /></li> -->

                    @endforeach
                </ul>
            </div>
            <div class="ws_script" style="position:absolute;left:-99%"><a href=""></a></div>
            <div class="ws_shadow"></div>
        </div>
    </div>
    <div class="san-phan-nb padding-45-50">
        <div class="wrap-content">
            <div class="title-mau1">
                <h3>Sản phẩm nổi bật</h3>
            </div>
            <div class="slick-sanpham text-center">
                @foreach($traicays as $row)
                <div class="item-sanpham">
                    <div class="container-sanphan">
                        <div class="img-sanpham scale-img">
                            <img src="img/fruit/{{$row->Anh}}" alt="">
                        </div>
                        <a class="name-sanpham text-decoration-none" href="ct{{$row->MaTraiCay}}">
                            <h3>{{$row->TenTraiCay}}</h3>
                        </a>
                        <div class="price-sanpham">
                            <span><span>Giá:
                                </span>{{round($row->GiaBan-(($row->GiaBan*$row->Discount)/100))}}VND/KG</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="statistical-nb">
        <div class="wrap-content ">
            <div class="container-statistical text-center">
                <div class="owl-carousel">
                    <div class="item-statistical text-split ">
                        <img src="img/tk.png" alt="">
                        <div class="statistical-name">
                            <span>+</span>
                            <a class='numscroller text-decoration-none' data-min='1' data-max='1000' data-delay='100'
                                data-increment='10' title="">1000</a>
                        </div>
                        <div class="desc-statistical">
                            <span>Nhân viên</span>
                        </div>
                    </div>
                    <div class="item-statistical text-split ">
                        <img src="img/tk2.png" alt="">
                        <div class="statistical-name">
                            <span>+</span>
                            <a class='numscroller text-decoration-none' data-min='1' data-max='1000' data-delay='50'
                                data-increment='10' title="">1000</a>
                        </div>
                        <div class="desc-statistical">
                            <span>Nhân viên</span>
                        </div>
                    </div>
                    <div class="item-statistical text-split ">
                        <img src="img/tk4.png" alt="">
                        <div class="statistical-name">
                            <span>+</span>
                            <a class='numscroller text-decoration-none' data-min='1' data-max='1000' data-delay='50'
                                data-increment='10' title="">1000</a>
                        </div>
                        <div class="desc-statistical">
                            <span>Nhân viên</span>
                        </div>
                    </div>
                    <div class="item-statistical text-split ">
                        <img src="img/tk3.png" alt="">
                        <div class="statistical-name">
                            <span>+</span>
                            <a class='numscroller text-decoration-none' data-min='1' data-max='1000' data-delay='50'
                                data-increment='10' title="">1000</a>
                        </div>
                        <div class="desc-statistical">
                            <span>Nhân viên</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="list-san-phan-nb padding-45-50">
        <div class="wrap-content">
            <div class="title-mau1">
                <h3>Trái cây mùa hè</h3>
            </div>
            <div class="list-sanpham grid-4 padding-20 text-center">
                @foreach($muahe as $row)
                <div class="item-sanpham">
                    <div class="container-sanphan">
                        <div class="img-sanpham scale-img">
                            <img src="img/fruit/{{$row->Anh}}" alt="">
                        </div>
                        <a class="name-sanpham text-decoration-none" href="ct{{$row->MaTraiCay}}">
                            <h3>{{$row->TenTraiCay}}</h3>
                        </a>
                        <div class="price-sanpham">
                            <span><span>Giá:
                                </span>{{round($row->GiaBan-(($row->GiaBan*$row->Discount)/100))}}VND/KG</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="list-san-phan-nb padding-45-50">
        <div class="wrap-content">
            <div class="title-mau1">
                <h3>Trái cây mùa đông</h3>
            </div>
            <div class="list-sanpham grid-4 padding-20 text-center">
                @foreach($muadong as $row)
                <div class="item-sanpham">
                    <div class="container-sanphan">
                        <div class="img-sanpham scale-img">
                            <img src="img/fruit/{{$row->Anh}}" alt="">
                        </div>
                        <a class="name-sanpham text-decoration-none" href="ct{{$row->MaTraiCay}}">
                            <h3>{{$row->TenTraiCay}}</h3>
                        </a>
                        <div class="price-sanpham">
                            <span><span>Giá:
                                </span>{{round($row->GiaBan-(($row->GiaBan*$row->Discount)/100))}}VND/KG</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="tin-tuc-nb padding-45-50">
        <div class="wrap-content">
            <div class="title-mau1">
                <h3>Bài viết nóng hổi</h3>
            </div>
            <div class="swiper-tintuc">
                <div class="swiper-wrapper text-center">
                    @foreach($new as $row)
                    <div class="item-tintuc swiper-slide ">
                        <div class="container-tintuc">
                            <div class="img-tintuc scale-img">
                                <img src="img/new/{{$row->Anh}}" alt="">
                            </div>
                            <a class="name-tintuc text-decoration-none" href="">
                                <h3>{{$row->Title}}</h3>
                            </a>
                            <div class="mota-tintuc text-split-3">
                                <span>{{$row->MoTa}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <div class="library-nb padding-45-50">
        <div class="wrap-content text-center">
            <div class="title-mau1">
                <h3>Album hình ảnh</h3>
            </div>
            <div class="list-library-nb grid-3 grid-2-sm padding-10">
                @foreach($album as $row)
                <div class="item-library">
                    <div class="library-img">
                        <a class="scale-img " data-fancybox="images2" href data-src="img/album/{{$row->HinhAnh}}"
                            title="">
                            <img src="img/album/{{$row->HinhAnh}}" alt="">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="wrap-content text-center">
        <div class="fotorama" data-nav="thumbs" data-width="100%" data-width="100%" data-thumbmargin="10"
            data-height="330" data-fit="cover" data-thumbwidth="140" data-thumbheight="80" data-allowfullscreen="true"
            data-nav="thumbs">
            <a href="https://youtube.com/watch?v=<?= getYoutube("https://www.youtube.com/watch?v=nidTI-XxXgc") ?>"
                data-img="http://img.youtube.com/vi/<?= getYoutube("https://www.youtube.com/watch?v=nidTI-XxXgc") ?>/0.jpg">
                <img
                    src="http://img.youtube.com/vi/<?= getYoutube("https://www.youtube.com/watch?v=nidTI-XxXgc") ?>/0.jpg">
            </a>
            <a href="https://youtube.com/watch?v=<?= getYoutube("https://www.youtube.com/watch?v=tDpu3JRg8WY") ?>"
                data-img="http://img.youtube.com/vi/<?= getYoutube("https://www.youtube.com/watch?v=tDpu3JRg8WY") ?>/0.jpg">
                <img
                    src="http://img.youtube.com/vi/<?= getYoutube("https://www.youtube.com/watch?v=tDpu3JRg8WY") ?>/0.jpg">
            </a>
            <a href="https://youtube.com/watch?v=<?= getYoutube("https://www.youtube.com/watch?v=tuWvTMsTJrQ") ?>"
                data-img="http://img.youtube.com/vi/<?= getYoutube("https://www.youtube.com/watch?v=tuWvTMsTJrQ") ?>/0.jpg">
                <img
                    src="http://img.youtube.com/vi/<?= getYoutube("https://www.youtube.com/watch?v=tuWvTMsTJrQ") ?>/0.jpg">
            </a>
        </div>
    </div>
    <div class="footer">
        <div class="footer-article">
            <div class="wrap-content">
                <div class="row">
                    <div class="footer-news col-sm-5">
                        <h2 class="footer-title">Thông tin chung</h2>
                        <div class="footer-info">Nhập thông tin web site</div>
                    </div>
                    <div class="footer-news col-sm-3">
                        <h2 class="footer-title">Chính sách </h2>
                        <ul>
                            <li>
                                <a href="">Chính sách mua hàng</a>
                            </li>
                            <li>
                                <a href="">Chính sách trả hàng</a>
                            </li>
                        </ul>
                    </div>

                    <div class="footer-news col-sm-4">
                        <div class="fb-page" data-href="https://www.facebook.com/profile.php?id=61552248569435"
                            data-tabs="timeline" data-width="300" data-height="200" data-small-header="true"
                            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <div class="fb-xfbml-parse-ignore">
                                <blockquote cite="https://www.facebook.com/profile.php?id=61552248569435">
                                    <a href="https://www.facebook.com/profile.php?id=61552248569435">Facebook</a>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-powered">
            <div class="wrap-content">
                <div class="row">
                    <div class="footer-copyright col-md-6">2020 Copyright
                    </div>
                    <div class="footer-statistic col-md-6">
                        <span>Đang online : 2</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="google-map">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15674.069268600488!2d106.61756025!3d10.848202500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b4579d7f44f%3A0xacb532ebd03dbad9!2sToyota%20An%20S%C6%B0%C6%A1ng%20-%20TAS!5e0!3m2!1svi!2s!4v1697099812512!5m2!1svi!2s"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

    </div>
    <a class="btn-zalo btn-frame text-decoration-none" target="_blank" href="chat{{$cookie}}">
        <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i><img src="img/chat.png" alt=""></i>
    </a>
    <a class="btn-phone btn-frame text-decoration-none" href="tel:<?= preg_replace('/[^0-9]/', '', "0981965197"); ?>">
        <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i><img src="img/hl.png" alt=""></i>
    </a>
    <script src="js/jquery.min.js"></script>
    <script src="js/wowslider.js"></script>
    <script src="js/script.js"></script>
    <script src="owlcarousel2/owl.carousel.js"></script>
    <script src="bootstrap/bootstrap.js"></script>
    <script src="slick/slick.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/numscroller-1.0.js"></script>
    <script src="accset/fotorama/fotorama.js"></script>
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
    const progressCircle = document.querySelector(".autoplay-progress svg");
    const progressContent = document.querySelector(".autoplay-progress span");
    var swiper = new Swiper(".swiper-tintuc", {
        slidesPerView: 3,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        on: {
            autoplayTimeLeft(s, time, progress) {
                progressCircle.style.setProperty("--progress", 1 - progress);
                progressContent.textContent = `${Math.ceil(time / 1000)}s`;
            }
        }
    });
    </script>
    <script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.async = true;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";

        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
</body>

</html>