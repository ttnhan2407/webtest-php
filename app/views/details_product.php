
<?php 
        foreach($details_product as $key =>$value){
            $name_product = $value['title_product'];
            $name_category_product =  $value['title_category_product'];
            $id_cate = $value['id_category_product'];
        }
?>
<!-- Product Details -->
<section class="section product-detail">
<?php foreach($details_product as $key =>$details){  ?>
  <form action="<?php echo BASE_URL ?>giohang/themvaogio " method="POST">
              <input type="hidden" value="<?php echo $details['id_product'] ?>" name="product_id">
              <input type="hidden" value="<?php echo $details['title_product'] ?>" name="product_title">
              <input type="hidden" value="<?php echo $details['image_product'] ?>" name="product_image">
              <input type="hidden" value="<?php echo $details['price_product'] ?>" name="product_price">
              <input type="hidden" value="1" name="product_quantity">
    <div class="details container">
      <div class="left">
        <div class="main" >
          <img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $details['image_product'] ?>" alt="" id="productImg">
        </div>
        <div class="thumbnails">
          <div class="thumbnail">
            <img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $details['image_product'] ?>" class="smallImg">
          </div>
    
        </div>
      </div>
      <div class="right">
        <ul class="breadcrumb-details">
              <li><a href="<?php echo BASE_URL?>">Trang chủ</a></li>
              <li><a href="<?php echo BASE_URL  ?>sanpham/danhmuc?id=<?php echo $value['id_category_product']?>"><?php echo $name_category_product?></a></li>
              <li><?php echo $name_product?></li>
      </ul>
        <h1><?php echo $name_product  ?></h1>
        <div class="price"><?php echo number_format($details['price_product'],0,',','.').' '.'đ'?>/kg</div>
        <form class="form" style="flex-direction:column">
          <h3>Số Lượng <input type="text" style="width:30px;height:30px" placeholder="1"></h3>
          <input type="submit" class="login-btn" style="width:180px;;margin-bottom:30px" value="THÊM VÀO GIỎ">
        </form>
        <h3>Chi Tiết</h3>
        <p><?php echo $details['desc_product']  ?></p>
      </div>
    </div>
    </form>
    <?php } ?>
  </section>

  <!-- Related -->
  <section class="section-relate container" >
    <h1 class="title-products">Sản phẩm liên quan</h1>
<div class="feature-products">
<?php foreach($related_product as $key =>$relate)  {?>
  <form action="<?php echo BASE_URL ?>giohang/themvaogio " method="POST">
              <input type="hidden" value="<?php echo $relate['id_product'] ?>" name="product_id">
              <input type="hidden" value="<?php echo $relate['title_product'] ?>" name="product_title">
              <input type="hidden" value="<?php echo $relate['image_product'] ?>" name="product_image">
              <input type="hidden" value="<?php echo $relate['price_product'] ?>" name="product_price">
              <input type="hidden" value="1" name="product_quantity">

    <div class="feature-products-item">
    <a href="<?php echo BASE_URL ?>sanpham/chitietsanpham?id=<?php echo $relate['id_product']?>">
      <img
        src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $relate['image_product'] ?>"
        alt="unsplash"
        class="feature-products-image"
      />
      </a> 
      <div class="feature-products-details">
          <strong><?php echo number_format($relate['price_product'],0,',','.').' '.'đ'?><span style="font-size:12px">/kg</span></strong>
          <button class="feature-products-button" type="submit">
              THÊM VÀO GIỎ
          </button>
      </div>  
    </div>     
    </form> 
    <?php }?> 
</div>   
<?php foreach($related_product as $key => $cate) ?>
<a href="<?php echo BASE_URL  ?>sanpham/danhmuc?id=<?php echo $cate['id_category_product'] ?>" class="button linkview">Xem Thêm<i class="fas fa-long-arrow-alt-right"></i></a>
</section>
</div>