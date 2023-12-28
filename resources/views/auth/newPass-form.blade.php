<div id="newPassform">
    <form action="#" method="get">
        <div class="tiltle">
            <h2>Xác nhận mật khẩu mới</h2>
        </div>
        <div>
            <p>Mật khẩu mới gồm ...</p>
        </div>
        <div>
            <b>Mật khẩu mới<a style="color:red;">*</a></b><br>
            <input id="new_pass" type="password" placeholder="Mật khẩu mới" require />
        </div>
        <div>
            <b>Nhập lại mật khẩu mới<a style="color:red;">*</a></b><br>
            <input id="confirm_pass" type="password" placeholder="Nhập lại mật khẩu mới" require />
        </div>
        <div>
            <input type="checkbox" onclick="showPass('new_pass')" style="width:14px;height:12px;">
            Hiện mật khẩu
        </div>
        <br>
    </form>
    <div class="submit">
        <button onclick="checkpass();" class="btn btn-primary">Xác
            nhận</button>
        <h4 style="color:red;" id="error-newpass"></h4>
    </div>
</div>