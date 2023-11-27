<div class="padding-ajax">
    <div class="list-product grid-4 padding-20">
        @foreach($products as $row)
        <div class="item-product">
            <div class="product-img">
                <img src="img/fruit/{{$row->Anh}}" alt="">
                <img class="hover-img" src="img/fruit/{{$row->Anh}}" alt="">
            </div>
            <div class="product-desc">
                <div class="product-meta-data">
                    <a class="product-name text-decoration-none" href="ct{{$row->MaTraiCay}}">
                        <h3><b>{{$row->TenTraiCay}}</b></h3>
                    </a>
                    <p class="product-price">${{round($row->GiaBan-(($row->GiaBan*$row->Discount)/100))}}</p>
                </div>
                <div class="ratings-cart">
                    <div class="ratings">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <div class="cart">
                        <a class="btn btn-success" href="javascript:addcart({{$row->MaTraiCay}})" data-toggle="tooltip"
                            data-placement="left" title="Add to Cart">Thêm giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<span>{{ $products->links() }}</span>