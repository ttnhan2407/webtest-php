<?php 
    $name = 'Danh mục chưa có sản phẩm';
        foreach($category_by_id as $key =>$pro){
            $name = $pro['title_category_product'];
        }

?>

<section class="section all-products" id="products">
    <ul class="breadcrumb">
        <div class="container">
            <li><a href="<?php echo BASE_URL ?>">Trang chủ</a></li>
            <li><a href="<?php echo BASE_URL  ?>sanpham/tatca">Sản phẩm</a></li>
            <li><?php echo $name ?></li>
        </div>  
    </ul>
    <div class="products-top container">
        <h1><?php echo $name ?></h1>
        <form>
            <select>
                <option value="1">Defualt Sorting</option>
                <option value="2">Sort By Price</option>
                <option value="3">Sort By Popularity</option>
                <option value="4">Sort By Sale</option>
            </select>
            <span><i class="fas fa-chevron-down"></i></span>
        </form>
    </div>

    <div class="products-center container">
    <?php foreach($category_by_id as $key => $product) {?>

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
              alt="unsplash"
              class="products-image"
            />
            </a>
            <div class="products-details">
                <h1><?php echo $product['title_product']?></h1>
                <strong><?php echo number_format($product['price_product'],0,',','.').' '.'đ'?><span style="font-size:12px">/kg</span></strong>
                <button class="products-btn"><span style="letter-spacing: 1px">THÊM VÀO GIỎ</span></button>
            </div>   
          </div>
          </form>
          <?php }?>   
    </div>
   </section>

    <section class="products-pagination">
        <div class=" container">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span><i class="fas fa-long-arrow-alt-right"></i></span>
        </div>
        </section>