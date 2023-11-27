<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
</head>

<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="login-admin" method="post">
            @csrf
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div style="text-align: center;"><button type="submit">Login</button></div>
        </form>
    </div>
</body>
<script>
var err = <?php 
 if(isset($flag))echo $flag; else echo('');
 ?>;
if (err == 1) {
    document.getElementById('password').style = "border:1px solid red";
} else if (err == 0) {
    document.getElementById('username').style = "border:1px solid red";
    document.getElementById('password').style = "border:1px solid red";
}
</script>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f4f4f4;
}

.login-container {
    background-color: #fff;
    padding: 30px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
}

.input-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    height: 30px;
    border-radius: 3px;
    border: 1px solid #ccc;
}

button {
    padding: 8px 15px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}
</style>

</html>