<ul class="breadcrumb">
        <div class="container">
            <li><a href="<?php echo BASE_URL ?>giohang">Giỏ hàng</a></li>
            <li>Thông tin giao hàng</li>
        </div>  
    </ul>
<!--cart-->
<div class="pay-container" style="display:flex">
<div class="container cart-page">

    <table>

    <?php 
        if(isset($_SESSION['shopping_cart'])){
            $total = 0;
            foreach($_SESSION['shopping_cart'] as $key => $value){
                $sub_total = $value['product_quantity'] * $value['product_price'];
                $total += $sub_total;
    ?>
<form action="<?php echo BASE_URL ?>giohang/updategiohang" method="POST">
        <tr>
            <th>Sản phẩm</th>
            <th>Số lượng </th>
            <th>Giá/kg</th>
            <th>Tạm tính</th>
        </tr>
        <tr>
            <td>
                <div class="cart-info">
                <img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $value['product_image'] ?>" alt="<?php echo $value['product_title'] ?>">
                <div class="cart-info-box">
                    <p><?php echo $value['product_title'] ?></p>
                    <br>
                    <input type="hidden" value="<?php echo $value['product_id']  ?>" name="delete_id">
                </div>
            </div>
        </td>
            <td><span style="padding:5px"><?php echo $value['product_quantity'] ?></span></td>
            <td><?php echo number_format($value['product_price'],0,',','.').' '.'đ' ?></td>
            <td><?php echo number_format($sub_total,0,',','.').' '.'đ' ?></td>
        </tr> 
        </form>
<?php 
}
?>
    </table>
<!--sub-total-->
<div class="total-box">
    <table>
        <tr>
            <td>Tạm tính</td>
            <td><?php echo number_format($total,0,',','.').' '.'đ' ?></td>
        </tr>
        <tr>
            <td>Phí ship</td>
            <td>Freeship khu vực nội ô</td>
        </tr>
        <tr>
            <td>Thành tiền</td>
            <td><?php echo number_format($total,0,',','.').' '.'đ' ?></td>
        </tr>
    </table>
</div>
<?php }?>
</div>
<div class="login-container"> 
                <div class="login-top">
                <h1>Thông tin giao hàng</h1>
            </div>
            <?php foreach($load_cus as $key => $cus) {?>
                <form action="<?php echo BASE_URL ?>giohang/dathang" name="frmDatHang" method="POST" autocomplete="off" class="login-form">
                <input type="text" name="name" class="login-text" value="<?php echo $cus['customers_name'] ?>">
                <input type="mail"name="email" class="login-text" value="<?php echo $cus['customers_email'] ?>">
                <input type="telephone" name="sodienthoai" class="login-text" value="<?php echo $cus['customers_phone'] ?>">
                <input type="text" name="diachi" class="login-text" value="<?php echo $cus['customers_address'] ?>">
                <textarea type="text" name="noidung" class="login-contact" cols="30" rows="10" placeholder="Ghi chú"></textarea>
                <input type="submit" class="login-submit" value="Đặt mua">
            </form>
            <?php } ?>
            <a href="<?php echo BASE_URL ?>giohang">< Trờ về giỏ hàng</a>
        </div>
 </div>