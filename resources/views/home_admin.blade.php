<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include("admin/templates/css")
    @include("admin/templates/js")
</head>

<body>
    <div class="bao-noidung">
        <div class="container-admin">
            @include("admin/templates/menu")
            <div class="noidung">
                <div class="top grid-4 padding-20 pb-5">
                    <div class="tag-noidung">
                        <h3 class="tieude">Đơn hàng thành công</h3>
                        <span class="number">{{$donhangthanhcong}}</span>
                        <span class="desc">Đơn giao dịch thành công</span>
                    </div>
                    <div class="tag-noidung">
                        <h3 class="tieude">Đơn hàng đang xử lý</h3>
                        <span class="number">{{$donhangxuly}}</span>
                        <span class="desc">Số lượng đơn hàng xử lý</span>
                    </div>
                    <div class="tag-noidung">
                        <h3 class="tieude">Doanh thu</h3>
                        <span class="number">{{number_format($doanhthu,0, ',', '.')}}.000<u>đ</u></span>
                        <span class="desc">Doanh thu hệ thống</span>
                    </div>
                    <div class="tag-noidung">
                        <h3 class="tieude">Đơn hàng hủy</h3>
                        <span class="number">{{$donhanghuy}}</span>
                        <span class="desc">Số đơn bị hủy</span>
                    </div>
                </div>
                <div style="display:flex;">
                    <div class="bo-loc-doanh-thu">
                        <select name="" id="yeartk">
                            @for($i=now()->year; $i>=(now()->year)-5;$i--)
                            <option value="{{$i}}">Năm {{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="dang-bieu-do">
                        <select name="" id="dangbieudo">
                            <option value="bar">Biểu đồ cột</option>
                            <option value="pie">Biểu đồ tròn</option>
                            <option value="line">Biểu đồ đường</option>
                            <option value="doughnut">Biểu đồ bánh quy</option>
                        </select>
                    </div>
                </div>
                <div class="noidung-chart">
                    @include("admin/templates/dashboard_data")
                </div>
            </div>

        </div>
    </div>

</body>
<script>
// window.addEventListener('beforeunload', function(event) {
//     // Thực hiện các hành động trước khi tab hoặc trình duyệt đóng
//     var confirmationMessage = 'Bạn có chắc chắn muốn rời khỏi trang này?';
//     (event || window.event).returnValue = confirmationMessage;

//     return confirmationMessage;
// });
</script>

</html>