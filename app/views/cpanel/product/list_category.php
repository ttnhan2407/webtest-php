<h2 style="text-align:center">Liet ke danh muc san pham</h2>
<?php
    if(!empty($_GET['msg'])){
        $msg = unserialize(urldecode($_GET['msg']));
        foreach($msg as $key => $value){
            echo '<span style="color:red; font-weight:bold">'.$value.'</span>';
        }
    }
?>
<div class="container">        
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Tên danh mục</th>
        <th>Mô tả</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
        foreach($category as $key => $cate){
            $i ++;
    ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $cate['title_category_product'] ?></td>
        <td><?php echo $cate['desc_category_product']?></td>
        <td><a href="<?php echo BASE_URL?>Product/delete_category?id=<?php echo $cate['id_category_product']?>">Xóa</a> || <a href="<?php echo BASE_URL?>product/edit_category?id=<?php echo $cate['id_category_product']?>">Cập nhật</a> </td>
      </tr>
    <?php
        }
    ?>
    </tbody>
  </table>
</div>
