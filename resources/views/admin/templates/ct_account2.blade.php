 <div class="container">
     @foreach($accounts as $row)
     <div class="container">
         <form id="updateaccountForm" action="{{ route('update.data.account') }}" method="POST" enctype="multipart/form-data">
             @csrf
             <div class="mb-3">
                 <label class="form-label" for="inputImage">Image:</label>
                 <img src="/images/avatar/{{$row->Avatar}}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                 <input type="file" name="image" id="inputImage" class="form-control @error('image') is-invalid @enderror" required>
             </div>
             <div class="container-input grid-3 padding-20">
                 <div class="item-input">
                     <span>Tài Khoản :</span>
                     <input type='text' name="taikhoan" value="{{$row->TaiKhoan}}" required>
                 </div>
                 <div class="item-input">
                     <span>Mật khẩu :</span>
                     <input type='password' name="matkhau" value="{{$row->MatKhau}}" required>
                 </div>
                 <div class="item-input">
                     <span>Email:</span>
                     <input type='text' name="email" value="{{$row->Email}}">
                 </div>
                 <div class="item-input">
                     <span>Phone:</span>
                     <input type='number' name="phone" value="{{$row->Phone}}">
                 </div>
                 <div class="item-input">
                     <span>Địa chỉ:</span>
                     <input type='text' name="diachi" value="{{$row->DiaChi}}">
                 </div>
                 <div class="item-input">
                     <span>Họ tên:</span>
                     <input type='text' name="hoten" value="{{$row->HoTen}}">
                 </div>
                 <div class="item-input">
                     <span>Trạng thái:</span>
                     <select name="trangthai">
                         <option value="0" @if($row->TrangThai == 0) selected @endif>Không hoạt động</option>
                         <option value="1" @if($row->TrangThai == 1) selected @endif>Hoạt động</option>
                     </select>
                 </div>
                 <div class="item-input">
                     <span>Loại loại tài khoản:</span>
                     <select name="isadmin" value="">
                         @if($row->IsAdmin==1)
                         <option value="1">Tài khoản admin</option>
                         <option value="0">Tài khoản người dùng</option>
                         @else
                         <option value="0">Tài khoản người dùng</option>
                         <option value="1">Tài khoản admin</option>
                         @endif
                     </select>
                 </div>
                 <input type="hidden" name="mataikhoan" value="{{$row->MaTaiKhoan}}">
             </div>
             <button class="btn btn-success mt-4" type="submit">Submit</button>
         </form>
     </div>
     @endforeach
 </div>
 <script>
     $(document).ready(function() {
         $('#updateaccountForm').on('submit', function(e) {
             e.preventDefault();
             var formData = new FormData(this);
             $.ajax({
                 type: 'POST',
                 url: '{{ route("update.data.account") }}',
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