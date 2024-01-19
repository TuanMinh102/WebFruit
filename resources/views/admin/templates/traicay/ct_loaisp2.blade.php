 <div class="container mt-3 mb-3">
     @foreach($loaisps as $row)
     <div class="container">
         <form id="updateloaispForm" action="{{ route('update.data.loaisp') }}" method="POST"
             enctype="multipart/form-data">
             @csrf
             <div class="container-input grid-3 padding-20">
                 <div class="item-input">
                     <span>Tên Loại :</span>
                     <input type='text' name="tenloai" value="{{$row->TenLoai}}" required>
                 </div>
                 <div class="item-input">
                     <span>Mô tả :</span>
                     <input type='text' name="mota" value="{{$row->MoTa}}">
                 </div>
                 <input type="hidden" name="maloai" value="{{$row->MaLoai}}">
             </div>
             <button class="btn btn-success mt-4" type="submit">Lưu</button>
         </form>
     </div>
     @endforeach
 </div>
 <script>
$(document).ready(function() {
    $('#updateloaispForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '{{ route("update.data.loaisp") }}',
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