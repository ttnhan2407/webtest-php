<h2 style="text-align:center">Liệt kê đơn hàng</h2>
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
        <th>Mã đơn hàng</th>
        <th>Ngày đặt</th>
        <th>Tình trạng</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
        foreach($order as $key => $ord){
            $i ++;
    ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $ord['order_code'] ?></td>
        <td><?php echo $ord['order_date']?></td>
        <td><?php  if($ord['order_status']==0){echo 'đơn hàng mới';}else{echo 'đã xử lý';}?></td>
        <td><a href="<?php echo BASE_URL?>order/order_details?c=<?php echo $ord['order_code']?>">Xem đơn hàng</a>
      </tr>
    <?php
        }
    ?>
    </tbody>
  </table>
</div>
