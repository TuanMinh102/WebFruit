<div class="container mt-3 mb-3">
    <form id="insertgioquaForm" action="{{ route('insert.data.gioqua') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="inputImage">Image:</label>
            <input type="file" name="image" id="inputImage" class="form-control @error('image') is-invalid @enderror"
                required>

        </div>
        <div class="container-input grid-3 padding-20">
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
                <input type='text' name="TenGioQua">
            </div>
            <div class="item-input">
                <span>Giá Bán:</span>
                <input type='number' name="GiaBan" required>
            </div>
            <div class="item-input">
                <span>Số Lượng:</span>
                <input type='number' name="soluong" required>
            </div>
            <div class="item-input">
                <span>Tình Trạng:</span>
                <select name="tinhtrang">
                    <option value="0">Hết hàng</option>
                    <option value="1">Còn hàng</option>
                </select>
            </div>
            <div class="item-input">
                <span>Mô Tả Giỏ Quà:</span>
                <textarea name="MotaGQ"></textarea>
            </div>
            <div class="item-input">
                <span>Loại giỏ quà:</span>
                <select name="loaigioqua" id="loaigioqua">
                    @foreach($loaigioquas as $row)
                    <option value="{{$row->MaLoai}}">{{$row->TenLoai}}</option>
                    @endforeach
                </select>
            </div>
            <div class=" item-input">
                <input type="file" name="images[]" multiple>
            </div>
        </div>
        <div class="item-input grid-4 mt-3">
            @foreach($traicays as $row)
            <div class="item-traicay mb-3">
                <input type="checkbox" id="traiCay{{$row->MaTraiCay}}" name="traiCay[{{$row->MaTraiCay}}][id]"
                    value="{{$row->MaTraiCay}}">
                <label for="traiCay{{$row->MaTraiCay}}">{{$row->TenTraiCay}}</label>
                <input class="d-block" type="number" name="traiCay[{{$row->MaTraiCay}}][quantity]"
                    placeholder="Số lượng">
            </div>
            @endforeach
        </div>
        <button class="btn btn-success mt-4" type="submit">Submit</button>
    </form>
</div>

<style>
.item-input {
    margin-bottom: 10px;
}

input[type="checkbox"] {
    display: inline-block;
    margin-right: 5px;
}

label {
    display: inline-block;
}
</style>
<script>
$(document).ready(function() {
    $('#insertgioquaForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '{{ route("insert.data.gioqua") }}',
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