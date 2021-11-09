<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>welcome</title>
        <!--font-->
        <link rel="reconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
        <!--style-->
        <link rel="stylesheet" href="<?php echo BASE_URL ?>public/template/css/style.css">
        <!--reset-->
        <link rel="stylesheet" href="<?php echo BASE_URL ?>public/template/css/reset.css">
        <!--icon-->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    </head>
<body class="b-login">
    <div class="wrapper login">
        <div class="login-container">
            <div class="login-social">
                <a href="#" class="login-social-btn"><i class="fab fa-facebook-f"></i>Login with Facebook</a>
                <a href="#" class="login-social-btn"><i class="fab fa-google"></i>Login with Google</a>
            </div>
            <div class="login-or">
                <span>or</span>
            </div>
            <form autocomplete="off" action="<?php echo BASE_URL?>login/authentication_login" method="POST" class="login-form">
                <input autocomplete="off" type="text" name="username" class="login-text" placeholder="Nhập tài khoản">
                <input autocomplete="off" type="password" name="password" class="login-password" placeholder="Nhập mật khẩu">
                <input type="submit" value="Đăng nhập">
            </form>
            <div class="login-check">
             <div class="login-left">
                <input type="checkbox" id="hobby" class="checkbox-input" name="gender" />
                <label for="hobby" class="checkbox-label">
                  <i class="fa fa-check"></i>
                </label>
                <span>Nhớ mật khẩu</span>
             </div>
                <a href="./forgot.html">Quên mật khẩu?</a>
            </div>
            <div class="login-bottom">
                <span>Bạn chưa có tài khoản ? <a href="./sign-up.html">đăng kí</a></span>
            </div>
        </div>
    </div>
</body>
</html>
