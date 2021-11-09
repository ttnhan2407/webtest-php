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
<?php
    if(!empty($_GET['msg'])){
        $msg = unserialize(urldecode($_GET['msg']));
        foreach($msg as $key => $value){
            echo '<span style="color:red; font-weight:bold">'.$value.'</span>';
        }
    }
?>
    <div class="wrapper login">
        <div class="login-container">
            <div class="login-top">
                <h1>Đăng nhập vào Seafood</h1>
                <p>Chào mừng bạn đã trở lại , đăng nhập và mua sắm thôi!</p>
            </div>
            <div class="login-social">
                <a href="#" class="login-social-btn"><i class="fab fa-facebook-f"></i>Login with Facebook</a>
                <a href="#" class="login-social-btn"><i class="fab fa-google"></i>Login with Google</a>
            </div>
            <div class="login-or">
                <span>or</span>
            </div>
            <form autocomplete="off" action="<?php echo BASE_URL ?>khachhang/login_customer" method="POST" class="login-form">
                <input autocomplete="off" type="email" name="userName" class="login-text" placeholder="Nhập tài khoản / địa chỉ email">
                <input autocomplete="off" type="password" name="userPassword" class="login-password" placeholder="Nhập mật khẩu">
                <input type="submit" name="dangnhap"value="Đăng nhập">
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
                <span>Bạn chưa có tài khoản ? <a href="<?php echo BASE_URL ?>khachhang/dangky">đăng ký</a></span>
            </div>
        </div>
    </div>
</body>
</html>
