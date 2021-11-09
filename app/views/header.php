<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh seafood</title>
    <!--font-->
    <link rel="reconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <!--style-->
    <link rel="stylesheet" href="<?php echo BASE_URL  ?>/public/css/style.css">
    <!--reset-->
    <link rel="stylesheet" href="<?php echo BASE_URL  ?>/public/css/reset.css 20-39-32-031.css">
    <!--icon-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!--light-slider-->
    <link rel="stylesheet" href="<?php echo BASE_URL  ?>/public/css/lightslider.css">
</head>
<header class="header">
                <!--logo-->
                <a href="<?php echo BASE_URL  ?> " class="header-logo">
                    <span class="header-title">FRESH</span><p class="header-note">SEAFOOD</p>
                </a>
                <!--menu-->
                    <ul class="header-menu-list">
                        <li class="header-menu-item">
                            <a href="<?php echo BASE_URL  ?>" class="header-menu-link"> Trang Chủ</a>
                        </li>
                        <li class="header-menu-item has-child">
                            <a href="<?php echo BASE_URL  ?>sanpham/tatca" class="header-menu-link">SẢN PHẨM <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul class="header-menu-child">
                                <?php foreach($category as $key => $cate) {?>
                                <li class="header-menu-child-item">
                                  <a href="<?php echo BASE_URL  ?>sanpham/danhmuc?id=<?php echo $cate['id_category_product']  ?>" class="header-menu-child-link"><?php echo $cate['title_category_product'] ?> </a>
                                </li>
                           <?php } ?>
                              </ul>
                        </li>
                        <li class="header-menu-item">
                            <a href="#" class="header-menu-link">GIỚI THIỆU</a>
                        </li>
                        <li class="header-menu-item">
                            <a href="<?php echo BASE_URL  ?>danhmuc" class="header-menu-link">LIÊN HỆ</a> 
                        </li>
                    </ul>
                <div class="header-menu-right">
                    <div class="search-bar">
                    <form action="#">
                            <input type="text" placeholder="Bạn tìm sản phẩm gì ... ">
                    </form>
                            
                            <div class="search-bar-icon">
                                <i class="fas fa-search"></i>
                            </div>
                    </div>
                    <a href="<?php echo BASE_URL ?>khachhang/dangnhap"><i class="fas fa-user"></i></a>
                    <a href="<?php echo BASE_URL  ?>giohang"><i class="fas fa-shopping-cart">
                        <!--number of product-->
                        <?php 
                        if(isset($_SESSION['shopping_cart'])){
                            $number =0;
                            foreach($_SESSION['shopping_cart'] as $key => $value){
                            $sub_total = $value['product_quantity'] ++;
                            $number += $sub_total;
                        ?>
                        <span class="num-cart-product"><?php echo $number?></span>
                                <?php }
                            }?>
                    </i>
                    </a>
                    <?php if (!Session::get('customer')){ ?>
                        <?php }else{?>
                        <ul >
                            <li class="header-menu-item has-child"><a href="<?php echo BASE_URL ?>khachhang/dangxuat">Tài Khoản <i class="fa fa-angle-down" aria-hidden="true"></i><br><span style="font-size:12px"><?php echo Session::get('customers_name') ?></span></a>
                            <ul class="header-menu-child">
                                <li class="header-menu-child-item" style="padding:10px"><a href="<?php echo BASE_URL ?>khachhang/thongtinKH?id=<?php echo Session::get('customers_id') ?>">Thông tin</a></li>
                                <li class="header-menu-child-item" style="padding:10px"><a href="<?php echo BASE_URL ?>khachhang/dangxuat">Đăng Xuất</a></li>
                            </ul>
                            </li>
                        </ul>
                    <?php }?>
                    
                    <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
                </div>
            </header>       