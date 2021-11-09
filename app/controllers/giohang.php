
<?php
    class giohang extends DController{
        public function __construct(){
            $data = array();
            parent::__construct();
        }
        public function index(){
            $this->giohang(); 
        }
        public function giohang(){
            Session::init();
            //Session::destroy();
            $table = "tbl_category_product";
            $categoryModel = $this->load->model('categoryModel');
            $data['category'] = $categoryModel -> category_home($table);
            $this ->load -> view('header', $data);
           $this ->load -> view('giohang');
           $this ->load -> view('footer');
        }
        public function themvaogio(){
            Session::init();
            if(isset($_SESSION['shopping_cart'])){
                $available = 0;
                foreach($_SESSION['shopping_cart'] as $key => $value){
                    //so sanh id co trung id cu hay khong? trung thi them so luong sp
                    if($_SESSION['shopping_cart'] [$key]['product_id']== $_POST['product_id']){
                        $available ++;
                        $_SESSION['shopping_cart'] [$key]['product_quantity'] = $_SESSION['shopping_cart'] [$key]['product_quantity'] + $_POST['product_quantity'];
                    }
                }
                if($available ==  0 ){
                    $item = array(
                        'product_id' => $_POST['product_id'],
                        'product_title' => $_POST['product_title'],
                        'product_price' => $_POST['product_price'],
                        'product_image' => $_POST['product_image'],
                        'product_quantity' => $_POST['product_quantity']
                    );
                    $_SESSION["shopping_cart"][] = $item;
                }
            }else{
                $item = array(
                    'product_id' => $_POST['product_id'],
                    'product_title' => $_POST['product_title'],
                    'product_price' => $_POST['product_price'],
                    'product_image' => $_POST['product_image'],
                    'product_quantity' => $_POST['product_quantity']
                );
                $_SESSION["shopping_cart"][] = $item;
            }
            header("Location:" .BASE_URL.'giohang');
        }

        public function updategiohang(){
            Session::init();
            if(isset($_POST['delete_cart'])){
                if(isset($_SESSION['shopping_cart'])){
                    foreach($_SESSION['shopping_cart'] as $key => $values){
                        if($_SESSION['shopping_cart'][$key]['product_id'] == $_POST['delete_id']){
                            unset($_SESSION['shopping_cart'] [$key]);
                        }
                    }
                    header("Location:" .BASE_URL.'giohang');
                }else{
                    header("Location:" .BASE_URL);
                }
        } else{
            foreach($_POST['qty'] as $key   => $quantity){
                foreach($_SESSION['shopping_cart'] as $session => $values){
                    if($values['product_id'] == $key && $quantity >=1){
                        $_SESSION["shopping_cart"][$session]['product_quantity'] = $quantity;
                    }elseif($values['product_id'] == $key && $quantity <= 0){
                        unset($_SESSION['shopping_cart'] [$session]);
                    }
                }
            }
            header("Location:" .BASE_URL.'giohang');
        }
    }
    public function dathang(){
            Session::init();
            $table_order = 'tbl_order';
            $table_order_details = 'tbl_order_details';
            $orderModel = $this->load->model('orderModel');
                $name = $_POST['name'];
                $email = $_POST['email'];
                $sodienthoai = $_POST['sodienthoai'];
                $diachi = $_POST['diachi'];
                $noidung = $_POST['noidung'];
                $order_code = rand(0,9999);
                
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date("d/m/Y");
                $hour = date("H:i:s");
                $order_date = $date.$hour;

                $data_order = array(
                    'order_code' => $order_code,
                    'order_date' => $date.' '.$hour,
                    'order_status' => 0
                );
                $result_order = $orderModel->insert_order($table_order,$data_order);
                if(Session::get("shopping_cart")==true)
                {
                   foreach(Session::get("shopping_cart") as $key => $value ){
                       $data_details = array(
                            'order_code' => $order_code,
                            'product_id' => $value['product_id'],
                            'product_quantity' => $value['product_quantity'],
                            'name' => $name,
                            'email' => $email,
                            'sodienthoai' => $sodienthoai,
                            'diachi' => $diachi,
                            'noidung' => $noidung
                        );
                        $result_order_details = $orderModel->insert_order_details($table_order_details,$data_details);
                    }
                    unset($_SESSION['shopping_cart']);
               }
               if($result_order_details){
               $message ['msg'] = "Cám ơn bạn, đơn hàng của bạn đã được đặt thành công !";
               return header("Location:".BASE_URL."giohang?msg=".urlencode(serialize($message)));
            }
    }
}
?>