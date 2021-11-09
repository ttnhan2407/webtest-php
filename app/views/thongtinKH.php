<ul class="breadcrumb">
        <div class="container">
            <li><a href="<?php echo BASE_URL ?>">Tang chủ</a></li>
            <li>Thông tin khách hàng</li>
        </div>  
    </ul>
<div class="login-container"> 
                <div class="login-top">
                <h1>Thông tin Khách Hàng :</h1>
            </div>
            <?php foreach($loadTT_cus as $key => $cus) {?>

                <form action="<?php echo BASE_URL ?>giohang/dathang" name="frmDatHang" method="POST" autocomplete="off" class="login-form">
                <input type="text" name="name" class="login-text" value="<?php echo $cus['customers_name'] ?>">
                <input type="mail"name="email" class="login-text" value="<?php echo $cus['customers_email'] ?>">
                <input type="telephone" name="sodienthoai" class="login-text" value="<?php echo $cus['customers_phone'] ?>">
                <input type="text" name="diachi" class="login-text" value="<?php echo $cus['customers_address'] ?>">
                <textarea type="text" name="noidung" class="login-contact" cols="30" rows="10" placeholder="Ghi chú"></textarea>
                <input type="submit" class="login-submit" value="Cập nhật">
            </form>
            <?php } ?>
        </div>
 </div>