
<?php
    class khachhang extends DController{
        public function __construct(){
            $data = array();
            parent::__construct();
        }
        public function index(){
            $this->khachhang(); 
        }
        public function dangnhap(){
            $this ->load ->view('customer_login');
            $table = "tbl_customers";
            $customersModel = $this->load->model('customersModel');
        }
        public function dangxuat(){
            Session::init();
            unset($_SESSION['customer']); 
            header("Location:".BASE_URL);
        }
        public function login_customer(){
            $username= $_POST['userName'];
            $password= md5($_POST['userPassword']); 

            $table_customer = 'tbl_customers';
            $customersModel = $this->load->model('customersModel');

            $count = $customersModel->login($table_customer, $username, $password);

            if($count==0){
                $message['msg'] = "Tên tài khoản hoặc mật khẩu không đúng!";
                header("Location:".BASE_URL."khachhang/dangnhap?msg=".urlencode(serialize($message)));
            }else{
                $result = $customersModel->getLogin($table_customer, $username, $password);
                Session::init();
                Session::set('customer',true);
                Session::set('customers_name',$result[0]['customers_name']);
                Session::set('customers_id',$result[0]['customers_id']);
                $message['msg'] = "Đăng nhập thành công!";
                header("Location:".BASE_URL."?msg=".urlencode(serialize($message)));
        }
        }
        public function dangky(){
            $this ->load -> view('customers_signup');
        }
        public function insert_dangky(){
            $name = $_POST['txtName'];
            $email= $_POST['txtEmail'];
            $phone= $_POST['txtPhone'];
            $address = $_POST['txtAddress'];
            $password = $_POST['txtPassword'];

            $table_customer = "tbl_customers";

            $data['customer'] = array(
                'customers_name' => $name,
                'customers_email' => $email,
                'customers_phone' => $phone,
                'customers_address' => $address,
                'customers_password' => md5($password)
            );
            $customersModel = $this->load->model('customersModel');
            $result = $customersModel  -> insertcustomer($table_customer, $data);
            if($result == 1){
                $message ['msg'] = "Đăng kí thành công";
                return header("Location:".BASE_URL."khachhang/dangnhap?msg=".urlencode(serialize($message)));
            }else{
                $message ['msg'] = "Đăng kí thất bại";
                return header("Location:".BASE_URL."khachhang/dangnhap?msg=".urlencode(serialize($message)));
            } 
        }
        public function thongtinKH(){
                Session::init();
                $id = $_GET['id'];  
    
                $table = "tbl_customers";
                $cond = "customers_id = '{$id}'";
                $customersModel = $this->load->model('customersModel');
                $data['loadTT_cus'] = $customersModel ->loadTT_cus($table, $cond);
    
                $this ->load -> view('header',$data);
                $this ->load -> view('thongtinKH',$data);
        }
    }
?>