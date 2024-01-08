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
                        <span class="number">6</span>
                        <span class="desc">Đơn giao dịch thành công</span>
                    </div>
                    <div class="tag-noidung">
                        <h3 class="tieude">Đang xử lý</h3>
                        <span class="number">7</span>
                        <span class="desc">Số lượng đơn hàng xử lý</span>
                    </div>
                    <div class="tag-noidung">
                        <h3 class="tieude">Doanh số</h3>
                        <span class="number">4000000VND</span>
                        <span class="desc">Doanh số hệ thống</span>
                    </div>
                    <div class="tag-noidung">
                        <h3 class="tieude">Đơn hàng hủy</h3>
                        <span class="number">1</span>
                        <span class="desc">Số đơn bị hủy</span>
                    </div>
                </div>
                <!-- <div class="bettwen">
                    <table>
                        <tr>
                            <th>Mã</th>
                            <th>Khách hàng </th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Thời gian</th>
                            <th>Chi tiết</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                        </tr>
                    </table>
                </div> -->
                <div class="bo-loc-doanh-thu">
                    <select name="" id="yeartk">
                        @for($i=now()->year; $i>=(now()->year)-5;$i--)
                        <option value="{{$i}}">Năm {{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="noidung-chart">
                    @include("admin/templates/dashboard_data")
                </div>
            </div>

        </div>
    </div>

</body>

</html>