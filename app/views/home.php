

<body>
    <div class="wrapper">
              <!--About us-->
              <div class="container">
                  <div class="box-about">
                      <img src="<?php echo BASE_URL  ?>public/img/gioithieu.jpeg" alt="gioithieu" class="box-img">
                      <div class="box-text">
                            <h1 class="box-title">Giới thiệu</h1>
                            <strong>Chúng tôi cung cấp Fresh seafood </strong>
                            <p>Fresh Seafood là đơn vị uy tín hàng đầu trong việc cung cấp, mua bán các loại hải sản ở Cần Thơ. Với kinh nghiệm gần 3 năm trong lĩnh vực bán thực phẩm sạch online nói chung và mua bán hải sản online nói riêng, chúng tôi tự tin rằng sản phẩm của chúng tôi sẽ làm hài lòng tất cả khách hàng có nhu cầu mua hải sản ở Cần Thơ.</p>
                            <br>
                            <p>Quý khách hàng có nhu cầu có thể đặt mua hải sản thông qua website, fanpage hoặc liên hệ trực tiếp qua số điện thoại hotline của Freshseafood </p>
                            <p>Hotline: <span style="color:#C84608">0971644258</span></p>
                      </div>
                  </div>
              </div>
          <!--hot products-->
          <div class="container">
              <h1 class="title-products">SẢN PHẨM HOT</h1>
          <div class="feature-products">

            <?php foreach($product_home as $key => $product) {
              //load sp hot
              if($product['product_hot']==1){
              ?>
              <form action="<?php echo BASE_URL ?>giohang/themvaogio " method="POST">
              <input type="hidden" value="<?php echo $product['id_product'] ?>" name="product_id">
              <input type="hidden" value="<?php echo $product['title_product'] ?>" name="product_title">
              <input type="hidden" value="<?php echo $product['image_product'] ?>" name="product_image">
              <input type="hidden" value="<?php echo $product['price_product'] ?>" name="product_price">
              <input type="hidden" value="1" name="product_quantity">

          <div class="products-item">
          <a href="<?php echo BASE_URL ?>sanpham/chitietsanpham?id=<?php echo $product['id_product']?>">
            <img
              src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $product['image_product'] ?>"
              alt="<?php echo $product['title_product']?>"
              class="products-image"
            />
            </a>
            <div class="products-details">
            <a href="<?php echo BASE_URL ?>sanpham/chitietsanpham?id=<?php echo $product['id_product']?>"><h1><?php echo $product['title_product']?></h1></a>
                <strong><?php echo number_format($product['price_product'],0,',','.').' '.'đ'?><span style="font-size:12px">/kg</span></strong>
                <input type="submit" class="products-btn" value="THÊM VÀO GIỎ">
            </div>   
          </div>

          </form>
          <?php
              }        
        }?>   
          </div>   
        </div>
         <!--feature products-->
         <?php foreach($category as $key => $cate) {

              ?>
  <div class="container">
              <h1 class="title-products" style="text-transform:uppercase"><?php echo $cate['title_category_product'] ?></h1>
              <form action="<?php echo BASE_URL ?>giohang/themvaogio " method="POST">
              <input type="hidden" value="<?php echo $product['id_product'] ?>" name="product_id">
              <input type="hidden" value="<?php echo $product['title_product'] ?>" name="product_title">
              <input type="hidden" value="<?php echo $product['image_product'] ?>" name="product_image">
              <input type="hidden" value="<?php echo $product['price_product'] ?>" name="product_price">
              <input type="hidden" value="1" name="product_quantity">
    <div class="feature-products " >
              <?php
                            foreach($product_home as $key => $pro_cate){
                              if($cate['id_category_product'] == $pro_cate['id_category_product']){
              ?>

    <div class="products-item">
          <a href="<?php echo BASE_URL ?>sanpham/chitietsanpham?id=<?php echo $pro_cate['id_product']?>">
            <img
              src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $pro_cate['image_product'] ?>"
              alt="unsplash"
              class="products-image"
            />
            </a>
            <div class="products-details">
                <h1><?php echo $pro_cate['title_product']?></h1>
                <strong><?php echo number_format($product['price_product'],0,',','.').' '.'đ'?><span style="font-size:12px">/kg</span></strong>
                <button class="products-btn"><span style="letter-spacing: 1px">THÊM VÀO GIỎ</span></button>
            </div>   
          </div>
          <?php 
          }
              }?>
      </div>   
          <a href="<?php echo BASE_URL  ?>sanpham/danhmuc?id=<?php echo $cate['id_category_product'] ?>" class="button linkview">Xem Thêm<i class="fas fa-long-arrow-alt-right"></i></a>
    </div>
    </form>
<?php 
}?>

</div>

