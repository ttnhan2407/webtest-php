<?php
    if(!empty($_GET['msg'])){
        $msg = unserialize(urldecode($_GET['msg']));
        foreach($msg as $key => $value){
            echo '<span style="color:red; font-weight:bold">'.$value.'</span>';
        }
    }
?>

<h3 style="text-align: center;">Thêm sản phẩm</h3>
<div class="col-md-6">
        <form action="<?php echo BASE_URL ?>product/insertFile" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="email">Hình ảnh sản phẩm</label>
        <input type="file" name="image_product" class="form-control">
    </div>
    <button type="submit" name="upload" class="btn btn-default">Thêm sản phẩm</button>
    </form>
</div>
