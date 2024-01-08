<div class="container mt-3 mb-3">
    <div class="mt-2 mb-2">
        <span><?=$thongbao?></span>
    </div>
    @if(count($albums))
    @foreach($albums as $row)
    <div class="container">
        <form id="oneimgForm" action="{{ route('update.data.oneimg') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="file" name="image" id="inputImage">
            </div>
            <div class="container-input grid-3 padding-20">
                <div class="item-input">
                    <img src="/images/album/{{$row->HinhAnh}}" style="width: 200px; height: 200px; object-fit: cover;"
                        alt="">
                </div>
            </div>
            <div class="container-input grid-3 padding-20 mt-3">
                <div class=" item-input">
                    <span>Chiều rộng hình ảnh:</span>
                    <input type="text" name="with" required>
                </div>
                <div class=" item-input">
                    <span>Chiều dài hình ảnh:</span>
                    <input type="text" name="hight" required>
                </div>
            </div>
            <div class=" item-input">
                <input type="hidden" name="MaAlbum" value="{{$row->MaAlbum}}">
            </div>
            <div class=" item-input">
                <input type="hidden" name="loai" value="{{$loais}}">
            </div>
            <button class="btn btn-success mt-4" type="submit">Submit</button>
        </form>
    </div>
    @endforeach
    @else
    <div class="container">
        <form id="oneimgForm" action="{{ route('update.data.oneimg') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="file" name="image" id="inputImage">
            </div>
            <div class=" item-input">
                <input type="hidden" name="loai" value="{{$loais}}">
            </div>
            <div class="container-input grid-3 padding-20 mt-3">
                <div class=" item-input">
                    <span>Chiều rộng hình ảnh:</span>
                    <input type="text" name="with" required>
                </div>
                <div class=" item-input">
                    <span>Chiều dài hình ảnh:</span>
                    <input type="text" name="hight" required>
                </div>
            </div>
            <button class="btn btn-success mt-4" type="submit">Submit</button>
        </form>
    </div>
    @endif
</div>
<script>
$(document).ready(function() {
    $('#oneimgForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            method: 'POST',
            url: '{{ route("update.data.oneimg") }}',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                $(".noidung").html(response);
            },
        });
    });
});
</script>