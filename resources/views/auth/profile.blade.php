@foreach($info as $row)
<div class="text-center" id="info">
    <h3>Thông tin tài khoản</h3>
    <div class="container-avatar">
        <div class="child-avatar">
            <a class="fancybox" data-fancybox="images2" href data-src="img/banner.jpg">
                <img src="img/banner.jpg" alt="">
            </a>
        </div>
    </div>
    <p><b>Tài Khoản:</b> {{$row->TaiKhoan}}</p>
    <p><b>Email:</b> {{$row->Email}}</p>
    <p><b>Số Điện Thoại:</b> {{$row->Phone}}</p>
    <p><b>Địa Chỉ:</b> {{$row->DiaChi}}</p>
    <p><b>Họ Tên:</b> {{$row->HoTen}}</p>
    <a href="javascript:show_edit();" style="color:green;">Chỉnh sửa</a><br>
    <a href="logout" style="color:red;">Đăng Xuất</a>
</div>
<div id="edit-form" style="display:none">
    <a href="login">
        << Back</a>
            <form>
                <div class="tiltle">
                    <h2>Edit Profile</h2>
                </div>
                <div class="container-avatar">
                    <div class="child-avatar">
                        <label for="avatar-upload" class="label-avatar">
                            <img src="img/avatar.png" id="img-avatar" alt="">
                            <i class="fa camera">&#xf030;</i>
                        </label>
                        <input type="file" name="" id="avatar-upload" onchange="loadImg(this)">
                    </div>
                </div>
                <div>
                    <b>Họ tên<a style="color:red;">*</a></b><br>
                    <input type="text" id="username-edit" name="username-edit" value="{{$row->HoTen}}"
                        placeholder="Full Name" required>
                </div>
                <div>
                    <b>Địa chỉ<a style="color:red;">*</a></b><br>
                    <input type="text" id="address-edit" name="address-edit" value="{{$row->DiaChi}}"
                        placeholder="Your Address" required>
                </div>
                <div>
                    <b>Email<a style="color:red;">*</a></b><br>
                    <input type="email" id="email-edit" name="email-edit" value="{{$row->Email}}"
                        placeholder="Your Email" required>
                </div>
                <div>
                    <b>Số điện thoại<a style="color:red;">*</a></b><br>
                    <input type="text" id="phone-edit" name="phone-edit" value="{{$row->Phone}}"
                        placeholder="Phone Number" pattern="[0]{1}[0-9]{3}[0-9]{3}[0-9]{3}" required>
                </div>
                <br>
            </form>
            <div class="submit">
                <button class="btn btn-success" onclick="editProfile({{$row->MaTaiKhoan}});">Cập
                    nhật</button>
                <h4 style="color:green;" id="error-edit"></h4>
            </div>
</div>
@endforeach