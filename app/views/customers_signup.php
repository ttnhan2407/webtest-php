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
            <div class="login-top">
                <h1>Đăng kí</h1>
                <p>chào mừng bạn đến với Seafood , hãy mua sắm thoải mái đi nào!</p>
            </div>
            <form action="<?php echo BASE_URL ?>khachhang/insert_dangky" method="POST" class="login-form">
                <input type="text" name="txtName" class="login-name" placeholder="Họ và tên"> 
                <input type="email" name="txtEmail" class="login-text" placeholder="Địa chỉ email">
                <input type="phone" name="txtPhone" class="login-text" placeholder="Số điện thoại">
                <input type="address" name="txtAddress" class="login-text" placeholder="Số điện thoại">
                <input type="password" name="txtPassword" class="login-password" placeholder="Nhập mật khẩu">
                <input type="submit" name="dangky" value="Đăng kí">
            </form>
            <a href="<?php echo BASE_URL ?>khachhang/dangnhap">< Quay về đăng nhập</a>
        </div>
    </div>
    </div>
</body>
</html>
