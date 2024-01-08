<div class="container">
    <div class="container">
        <form id="insertbaivietForm" action="{{ route('insert.data.baiviet') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="inputImage">Image:</label>
                <input type="file" name="image" id="inputImage"
                    class="form-control @error('image') is-invalid @enderror" required>
            </div>
            <div class="container-input grid-3 padding-20 mb-3">
                <div class="item-input">
                    <span>Chiều rộng hình ảnh:</span>
                    <input type='text' name="with" required>
                </div>
                <div class="item-input">
                    <span>Chiều dài hình ảnh:</span>
                    <input type='text' name="hight" required>
                </div>
            </div>
            <div class="container-input grid-3 padding-20">
                <div class="item-input">
                    <span>Tiêu đề :</span>
                    <input type='text' name="TieuDe" required>
                </div>
                <div class=" item-input">
                    <span>Mô tả:</span>
                    <input type='text' name="MoTa">
                </div>
                <div class=" item-input">
                    <span>Tình trạng:</span>
                    <select name="tinhtrang">
                        <option value="2">Chọn tình trạng</option>
                        <option value="0">Ẩn</option>
                        <option value="1">Hiện</option>
                    </select>
                </div>
                <input type="hidden" name="loai" value="{{$loais}}">
            </div>
            <div class="item-input item-input-mota">
                <span>Nội dung :</span>
                <textarea name="" id="editor" class="" cols="30" rows="10"></textarea>
            </div>
            <button class="btn btn-success mt-4" type="submit">Submit</button>
        </form>
    </div>
</div>
<script>
ClassicEditor
    .create(document.querySelector('#editor'))
    .then(editor => {
        theEditor = editor;
    })
    .catch(error => {
        console.error(error);
    });
$(document).ready(function() {
    $('#insertbaivietForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var noidung = theEditor.getData();
        formData.append('noidung', noidung);
        $.ajax({
            type: 'POST',
            url: '{{ route("insert.data.baiviet") }}',
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