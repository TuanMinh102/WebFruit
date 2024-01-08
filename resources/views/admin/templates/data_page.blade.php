<div class="padding-ajax">
    <div class="list-product grid-4 padding-20">
        @foreach($traicays as $row)
        <div class="item-product">
            <div class="product-img">
                <img src="img/bg-img/{{$row->Anh}}" alt="">
                <img class="hover-img" src="img/bg-img/{{$row->Anh}}" alt="">
            </div>
            <div class="product-desc">
                <div class="product-meta-data">
                    <a class="product-name text-decoration-none" href="ct">
                        <h3>{{$row->TenTraiCay}}</h3>
                    </a>
                    <p class="product-price">{{$row->GiaBan}}</p>
                </div>
  
            </div>
        </div>
        @endforeach
    </div>
</div>
{!! $traicays->render() !!}