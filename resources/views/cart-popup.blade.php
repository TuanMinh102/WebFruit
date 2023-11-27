<div style="float:right;"><a style="color:red" href="javascript:show_hide(1)">X</a></div>
<h3 class="text-center">Cart popup</h3>
<div id="mycartpopup">
    <div id="listcontainer">
        @foreach($cart as $row)
        <div class="single-cart-popup">
            <div><img src="img/fruit/{{$row->Anh}}" style="width:60px;margin-top:10px;" alt=""></div>
            <div>
                <div class="text-center"><b>{{$row->TenTraiCay}}</b></div>
                <div class="substract-add">
                    <button onclick="tang_giam(0,{{$row->MaTraiCay}});">-</button>
                    @if(isset($sl))
                    <input min="1" value="{{$sl[$row->MaTraiCay]}}" id="qty{{$row->MaTraiCay}}" style="color:black"
                        disabled>
                    @else
                    <input min="1" value="{{$row->SoLuong}}" id="qty{{$row->MaTraiCay}}" style="color:black" disabled>
                    @endif
                    <button onclick="tang_giam(1,{{$row->MaTraiCay}});">+</button>
                </div>
            </div>
            <div style="margin-top:20px;">${{round($row->GiaBan-(($row->GiaBan*$row->Discount)/100))}} /Kg</div>
            <div style="margin-top:20px;"><a href="javascript:delProduct({{$row->MaTraiCay}});" class="fa fa-trash"
                    style="color:red;"></a></div>
        </div>
        @endforeach
    </div>
</div>
<div class="text-center">
    <a href="gh">Chuyển đến giỏ hàng</a>
</div>