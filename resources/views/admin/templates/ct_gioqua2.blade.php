<div class="container mt-3 mb-3">
    @foreach($gioquas as $row)
    <div class="container">
        <form id="updategioquaForm" action="{{ route('update.data.gioqua') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="inputImage">Image:</label>
                <div class="mt-3">
                    <img src="/images/gioqua/{{$row->Anh}}" style="width: 150px; height: 150px; object-fit: cover;"
                        alt="">
                </div>
                <input type="file" name="image" value="/images/gioqua/{{$row->Anh}}" id="inputImage"
                    class="form-control @error('image') is-invalid @enderror">
            </div>
            <div class="container-input grid-3 padding-20 ">
                <div class="item-input">
                    <span>Chiều rộng hình ảnh:</span>
                    <input type='number' name="with" min="0" required>
                </div>
                <div class="item-input">
                    <span>Chiều dài hình ảnh:</span>
                    <input type='number' name="hight" min="0" required>
                </div>
            </div>
            <div class="mb-3">
                <span>Kích thước đề cử 600px-600px</span>
            </div>
            <div class="container-input grid-3 padding-20">
                <div class="item-input">
                    <span>Tên Giỏ Quà:</span>
                    <input type='text' name="TenGioQua" value="{{ $row->TenGioQua }}">
                </div>
                <div class="item-input">
                    <span>Tình Trạng:</span>
                    <select name="tinhtrang">
                        <option value="0" @if($row->TinhTrang == 0) selected @endif>Hết hàng</option>
                        <option value="1" @if($row->TinhTrang == 1) selected @endif>Còn hàng</option>
                    </select>
                </div>

                <div class="item-input">
                    <span>Giá Bán:</span>
                    <input type='number' name="GiaBan" value="{{ $row->GiaBan }}" required>
                </div>

                <div class="item-input">
                    <span>Số Lượng:</span>
                    <input type='number' name="soluong" value="{{ $row->SoLuong }}" required>
                </div>
                <div class="item-input">
                    <span>Mô Tả Giỏ Quà:</span>
                    <textarea name="MoTaGQ">{{ $row->MoTaGQ }}</textarea>
                </div>
                <div class="item-input">
                    <span>Loại giỏ quà:</span>
                    <select name="loaigioqua" id="loaigioqua">
                        @foreach($loaigioquas as $row2)
                        <option value="{{$row2->MaLoai}}" @if($row2->MaLoai == $row->MaLoaiGQ) selected
                            @endif>{{$row2->TenLoai}}</option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" name="MaGioQua" value="{{$row->MaGioQua}}">
            </div>
            <div class="container-input mt-3">
                <div class=" item-input">
                    <span>Album hình ảnh :</span>
                    <input type="file" name="images[]" multiple>
                </div>
            </div>
            <div class="container-input data-gallery grid-5 padding-10 mt-3">
                @foreach($albums as $row3)
                <div>
                    <img src="/images/gallery/{{ $row3->Anh}}" style="width: 200px; height: 200px; object-fit: cover;"
                        alt="">
                    <a class="xoa-du-lieu-btn"
                        onclick="routeTodeletegallery('{{ $row3->MaGallery }}', '{{ $row3->Loai }}','{{$row->MaGioQua}}')"><i
                            class="fa-solid fa-trash"></i></a>
                </div>
                @endforeach
            </div>
            <div class="item-input grid-4 mt-3">
                @foreach($traicays as $row)
                <div class="item-traicay mb-3">
                    <input type="checkbox" id="traiCay{{$row->MaTraiCay}}" name="traiCay[{{$row->MaTraiCay}}][id]"
                        value="{{$row->MaTraiCay}}" @if(isset($quantities[$row->MaTraiCay])) checked @endif>
                    <label for="traiCay{{$row->MaTraiCay}}">{{$row->TenTraiCay}}</label>
                    <input class="d-block" type="number" name="traiCay[{{$row->MaTraiCay}}][quantity]"
                        placeholder="Số lượng" value="{{ $quantities[$row->MaTraiCay] ?? '' }}">
                </div>
                @endforeach
            </div>
            <button class="btn btn-success mt-4" type="submit">Submit</button>
        </form>
    </div>
    @endforeach
</div>
<script>
$(document).ready(function() {
    $('#updategioquaForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '{{ route("update.data.gioqua") }}',
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