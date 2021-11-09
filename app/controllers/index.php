
<?php
    class index extends DController{
        public function __construct(){
            $data = array();
            parent::__construct();
        }
        public function index(){
            Session::init();
            $this->homepage(); 
        }
        public function homepage(){

            $table = "tbl_category_product";
            $table_product= "tbl_product";

            $categoryModel = $this->load->model('categoryModel');
            $data['category'] = $categoryModel -> category_home($table);
            

            $data['product_home'] = $categoryModel -> list_product_index($table_product);
            Session::init();
            $this ->load -> view('header', $data);
            $this ->load -> view('slider');
           $this ->load -> view('home', $data);
           $this ->load -> view('footer');
        }
        public function chitietsanpham(){
            Session::init();
            $this ->load -> view('header');
           $this ->load -> view('details_product');
           $this ->load -> view('footer');
        }
        public function notfound(){
            $table = "tbl_category_product";
            $categoryModel = $this->load->model('categoryModel');
            $data['category'] = $categoryModel -> category_home($table);
            $this ->load -> view('header', $data);
           $this ->load -> view('404');
           $this ->load -> view('footer');
        }
    }
?>