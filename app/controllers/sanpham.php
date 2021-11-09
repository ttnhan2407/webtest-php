
<?php
    class sanpham extends DController{
        public function __construct(){
            $data = array();
            parent::__construct();
        }
        public function index(){
            $this->danhmuc(); 
        }
        public function tatca(){
            Session::init();
            $table = "tbl_category_product";
            $table_product = 'tbl_product';
            $categoryModel = $this->load->model('categoryModel');
            $data['category'] = $categoryModel -> category_home($table);
            $data['list_product'] = $categoryModel -> list_product_home($table_product);
            $this ->load -> view('header', $data);
           $this ->load -> view('list_product', $data);
           $this ->load -> view('footer');
        }
        public function danhmuc(){
            Session::init();
            $id = $_GET['id'];  
            $table = "tbl_category_product";
            $table_product = 'tbl_product';
            $categoryModel = $this->load->model('categoryModel');
            $data['category'] = $categoryModel -> category_home($table);
            $data['category_by_id'] = $categoryModel -> categorybyid_home($table, $table_product,$id);
            $this ->load -> view('header', $data);
           $this ->load -> view('categoryproduct', $data);
           $this ->load -> view('footer');
        }
        public function chitietsanpham(){
            Session::init();
            $id = $_GET['id'];  
            $table = "tbl_category_product";
            $table_product = 'tbl_product';
            $cond = "$table_product.id_category_product =$table.id_category_product AND $table_product.id_product = '{$id}'";


            $categoryModel = $this->load->model('categoryModel');
            $data['category'] = $categoryModel -> category_home($table);
            $data['details_product']= $categoryModel -> details_product_home($table, $table_product, $cond);
            
            foreach($data['details_product'] as $key => $cate){
                $id_cate = $cate['id_category_product'];
            }
            $cond_related = "$table_product.id_category_product =$table.id_category_product AND $table.id_category_product = '{$id_cate}' AND $table_product.id_product NOT IN({$id})";
            $data['related_product'] = $categoryModel -> related_product_home($table, $table_product, $cond_related);
            $this ->load -> view('header', $data);
           $this ->load -> view('details_product', $data);
           $this ->load -> view('footer');
        }
    }
?>