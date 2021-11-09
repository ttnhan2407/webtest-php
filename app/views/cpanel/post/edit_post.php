<?php
    if(!empty($_GET['msg'])){
        $msg = unserialize(urldecode($_GET['msg']));
        foreach($msg as $key => $value){
            echo '<span style="color:red; font-weight:bold">'.$value.'</span>';
        }
    }
?>

<h3 style="text-align: center;">Cap nhat bai viet</h3>
<div class="col-md-6">
    <?php foreach($postbyid as $key => $pos){ ?>
        <form action="<?php echo BASE_URL ?>post/update_post?id=<?php echo $pos['id_post'] ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="email"><?php echo $pos['title_post']?>Tên bai viet</label>
        <input type="text" value="<?php echo $pos['title_post'] ?>" name="title_post" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Hình ảnh bai viet</label>
        <input type="file"  name="image_post" class="form-control">
        <p><img src="<?php echo BASE_URL ?>/public/uploads/post/<?php echo $pos['image_post']?>" height="100" width="100"></p>
    </div>
    <div class="form-group">
        <label for="abc">Chi tiet bai viet</label>
        <textarea id="editor"  style="resize:none"  name="content_post" class="form-control" cols="30" rows="10"><?php echo $pos['content_post']?></textarea>
    </div>
    <div class="form-group">
        <label for="email">Danh mục bai viet</label>
        <select name="category_post" class="form-control">
        <?php foreach($category as $key =>$cate){
            ?>
            <option <?php if($cate['id_category_post'] == $pos['id_category_post']){echo 'selected';}?> value="<?php echo $cate['id_category_post'] ?>"><?php echo $cate['title_category_post'] ?></option>
            <?php }
            ?>
        </select>
    </div>
    <button type="submit" name="upload" class="btn btn-default">Cap nhat bai viet</button>
    </form>
    <?php
    }
    ?>
</div>
