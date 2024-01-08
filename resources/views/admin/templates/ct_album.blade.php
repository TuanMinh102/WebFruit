<div class="container">
    <div class="container">
        <form id="insertalbumForm" action="{{ route('insert.data.album') }}" method="POST"
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
                    <input type='text' name="tieude" required>
                </div>
                <div class="item-input">
                    <span>Link video:</span>
                    <input type='text' name="linkvideo">
                </div>
                <div class="item-input">
                    <span>link:</span>
                    <input type='text' name="link">
                </div>
                <input type="hidden" name="loai" value="{{$loais}}">
            </div>
            <button class="btn btn-success mt-4" type="submit">Submit</button>
        </form>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#insertalbumForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            method: 'POST',
            url: '{{ route("insert.data.album") }}',
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