<?php
      class thanhtoan extends DController{
        function __construct(){
            Session::checkSession();
            parent::__construct();
        }
        public function index(){
            $this->thanhtoan();
        }
        public function thanhtoan(){
          
            $table = "tbl_category_product";
            $table_product= "tbl_product";

            $categoryModel = $this->load->model('categoryModel');
            $data['category'] = $categoryModel -> category_home($table);

            $data['product_home'] = $categoryModel -> list_product_index($table_product);
            $this ->load -> view('header', $data);
           $this ->load -> view('pay', $data);
        }
        public function thanhvien(){
            $id = $_GET['id'];  

            $table = "tbl_customers";
            $cond = "customers_id = '{$id}'";
            $customersModel = $this->load->model('customersModel');
            $data['load_cus'] = $customersModel ->load_cus($table, $cond);

            $this ->load -> view('header',$data);
            $this ->load -> view('pay_cus',$data);
        }
    }
?>