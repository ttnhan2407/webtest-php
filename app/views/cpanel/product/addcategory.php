<?php
    if(!empty($_GET['msg'])){
        $msg = unserialize(urldecode($_GET['msg']));
        foreach($msg as $key => $value){
            echo '<span style="color:red; font-weight:bold">'.$value.'</span>';
        }
    }
?>

<h3 style="text-align: center;">them danh muc san pham</h3>
<div class="col-md-6">
        <form action="<?php echo BASE_URL ?>product/insertCategory" method="POST">
    <div class="form-group">
        <label for="email">Danh muc</label>
        <input type="text" name="title_category_product" class="form-control">
    </div>
    <div class="form-group">
        <label for="abc">Mieu ta danh muc</label>
        <input type="text" name="desc_category_product"  class="form-control">
    </div>
    <button type="submit" class="btn btn-default">Them danh muc</button>
    </form>
</div>
