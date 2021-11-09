<?php
      class order extends DController{
        function __construct(){
            parent::__construct();
        }
        public function index(){
            $this->order();
        }
        public function order(){
            
            $orderModel = $this->load->model('orderModel');
            $table_order = 'tbl_order';
            $data['order'] = $orderModel ->list_order($table_order);
            $this ->load -> view('cpanel/header');
            $this ->load -> view('cpanel/menu');
            $this ->load -> view('cpanel/order/order', $data);
            $this ->load -> view('cpanel/footer');
        }
        public function order_details(){
            $order_code = $_GET['c'];
            $orderModel = $this->load->model('orderModel');
            $table_order_details = 'tbl_order_details';
            $table_product = 'tbl_product';
            $cond = "$table_product.id_product=$table_order_details.product_id AND $table_order_details.order_code = '{$order_code}'";
            $cond_info = "$table_order_details.order_code = '{$order_code}'";
            $data['order_details'] = $orderModel ->list_order_details($table_product,$table_order_details,$cond);
            $data['order_info'] = $orderModel ->list_info($table_order_details,$cond_info);

            $this ->load -> view('cpanel/header');
            $this ->load -> view('cpanel/menu');
            $this ->load -> view('cpanel/order/order_details', $data);
            $this ->load -> view('cpanel/footer');
        }
       public function order_confirm(){
            $orderModel = $this->load->model('orderModel');
            $order_code = $_GET['c'];
            $table_order = 'tbl_order';
            $cond = "$table_order.order_code = '{$order_code}' ";
            $data = array(
                'order_status' => 1
            );
            $result = $orderModel ->order_confirm($table_order,$data,$cond);
            if($result == 1){
                $message ['msg'] = "Đơn hàng đã được xử lí thành công";
                return header("Location:".BASE_URL."order?msg=".urlencode(serialize($message)));
            }else{
                $message ['msg'] = "Đơn hàng đã được xử lí thất bại";
                return header("Location:".BASE_URL."order?msg=".urlencode(serialize($message)));
            } 
       }
    }
?>
    