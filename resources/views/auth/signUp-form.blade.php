<div id="signUpform">
    <form>
        <div class="tiltle">
            <h2>Đăng Ký</h2>
        </div>
        <div>
            <b>Tài khoản<a style="color:red;">*</a></b><br>
            <input type="text" id="user_name" name="user_name" value="" placeholder="Username" required>
        </div>
        <div>
            <b>Mật khẩu <a style="color:red;">*</a></b><br>
            <input type="password" id="pass_word" name="pass_word" value="" placeholder="Password" required>
        </div>
        <div>
            <b>Xác nhận mật khẩu <a style="color:red;">*</a></b>
            <input type="password" id="confirm_pass-signup" name="confirm_pass" value="" placeholder="Confirm Password"
                required>
        </div>
        <div>
            <input type="checkbox" onclick="showPass('pass_word')" style="width:14px;height:12px;">
            Hiện mật khẩu
        </div>
        <br>
    </form>
    <div class="submit">
        <button class="btn btn-success" onclick="signUp();">Đăng
            ký</button>
        <h4 style="color:red;" id="error-signUp"></h4>
    </div>
</div>