<?php
    if(!empty($_GET['msg'])){
        $msg = unserialize(urldecode($_GET['msg']));
        foreach($msg as $key => $value){
            echo '<span style="color:red; font-weight:bold">'.$value.'</span>';
        }
    }
?>

<h3 style="text-align: center;">Cap nhat sản phẩm</h3>
<div class="col-md-6">
    <?php foreach($productbyid as $key => $pro){ ?>
        <form action="<?php echo BASE_URL ?>product/update_product?id=<?php echo $pro['id_product'] ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="email"><?php echo $pro['title_product']?>Tên sản phẩm</label>
        <input type="text" value="<?php echo $pro['title_product'] ?>" name="title_product" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Hình ảnh sản phẩm</label>
        <input type="file"  name="image_product" class="form-control">
        <p><img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $pro['image_product']?>" height="100" width="100"></p>
    </div>
    <div class="form-group">
        <label for="email">Giá sản phẩm</label>
        <input type="text" value="<?php echo $pro['price_product']?>" name="price_product" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Số lượng sản phẩm</label>
        <input type="text" value="<?php echo $pro['quantity_product']?>" name="quantity_product" class="form-control">
    </div>
    <div class="form-group">
        <label for="abc">Miêu tả sản phẩm</label>
        <textarea  id="editor"  style="resize:none"  name="desc_product" class="form-control" cols="30" rows="10"><?php echo $pro['desc_product']?></textarea>
    </div>
    <div class="form-group">
        <label for="email">Danh mục sản phẩm</label>
        <select name="category_product" class="form-control">
        <?php foreach($category as $key =>$cate){
            ?>
            <option <?php if($cate['id_category_product'] == $pro['id_category_product']){echo 'selected';}?> value="<?php echo $cate['id_category_product'] ?>"><?php echo $cate['title_category_product'] ?></option>
            <?php }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="email">Sản phẩm hot</label>
        <select name="product_hot" class="form-control">
            <?php if($pro['product_hot']==0) {?>
                <option  selected value="0">Không</option>
                <option   value="1">Có</option>
            <?php }else{?>
                <option    selected value="0">Không</option>
                <option value="1">Có</option>
            <?php }?>
        </select>
    </div>
    <button type="submit" name="upload" class="btn btn-default">Cập nhật sản phẩm</button>
    </form>
    <?php
    }
    ?>
</div>
