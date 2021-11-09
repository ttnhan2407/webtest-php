<?php
    if(!empty($_GET['msg'])){
        $msg = unserialize(urldecode($_GET['msg']));
        foreach($msg as $key => $value){
            echo '<span style="color:red; font-weight:bold">'.$value.'</span>';
        }
    }
?>

<h3 style="text-align: center;">Thêm bài viết</h3>
<div class="col-md-6">
        <form action="<?php echo BASE_URL ?>post/insert_post" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="email">Tên bài viết</label>
        <input type="text" name="title_post" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Hình ảnh sản phẩm</label>
        <input type="file" name="image_post" class="form-control">
    </div>
    <div class="form-group">
        <label for="abc">Chi tiết bài viết</label>
        <textarea id="editor"  style="resize:none" name="content_post" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label for="email">Danh mục bài viết</label>
        <select name="category_post" class="form-control">
        <?php foreach($category as $key =>$cate){
            ?>
            <option value="<?php echo $cate['id_category_post'] ?>"><?php echo $cate['title_category_post'] ?></option>
            <?php }
            ?>
        </select>
    </div>
    <button type="submit" name="upload" class="btn btn-default">Thêm sản phẩm</button>
    </form>
</div>
