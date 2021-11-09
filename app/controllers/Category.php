
<?php
    class Category extends DController{
        public function __construct(){
            $message = array();
            $data = array();
            parent::__construct();
        }

        public function homepage(){
            $this ->load -> view('header');
           $this ->load -> view('home');
           $this ->load -> view('footer');
        }
        public function list_category(){
            $this ->load -> view('header');
            $categoryModel = $this -> load -> model('categoryModel');
            $table_category_product = 'tbl_category_product' ;
            $data['category'] = $categoryModel->category($table_category_product);
           $this ->load -> view('category', $data);
           $this ->load -> view('footer');
        }
        public function catebyid(){
            $this ->load -> view('header');
            $categoryModel = $this -> load -> model('categoryModel');
            $id = 2;
            $table_category_product = 'tbl_category_product' ;
            $data['categorybyid'] = $categoryModel ->categorybyid($table_category_product, $id);
           $this ->load -> view('categorybyid', $data);
           $this ->load -> view('footer');
        }
        public function addcategory(){
            $this ->load -> view('addcategory');
        }
        public function insertcategory(){
            $categoryModel = $this -> load -> model('categoryModel');
            $table_category_product = 'tbl_category_product' ;
            $title = $_POST['title'];
            $desc = $_POST['description'];

            $data = array(
                'title_category_product' => $title,
                'desc_category_product' => $desc      
            );
            $result = $categoryModel ->insertcategory($table_category_product, $data);
            
            if($result == 1){
                $message['msg'] = "thêm dữ liệu thành công";
            }else{
                $message['msg'] = "thêm dữ liệu thầt bại";
            }
            $this ->load -> view('addcategory', $message);
        }
        public function updatecategory(){
            $categoryModel = $this -> load -> model('categoryModel');
            $table_category_product = 'tbl_category_product' ;

           // $title = $_POST['title'];
            //$desc = $_POST['description'];
            $id = 3;
            $cond = "tbl_category_product.id_category_product='$id'";
            $data = array(
                'title_category_product' => 'cua ca mau gach',
                'desc_category_product' => 'sieu ngon'     
            );
            $result = $categoryModel ->updatecategory($table_category_product, $data, $cond );
            
            if($result == 1){
                echo "update dữ liệu thành công";
            }else{
                echo "update dữ liệu thầt bại";
            }

        }
        public function delete_category($id){
            $categoryModel = $this -> load -> model('categoryModel');
            $table_category_product = 'tbl_category_product' ;
           // $title = $_POST['title'];
            //$desc = $_POST['description'];
            $cond = "id_category_product='$id'";
            $result = $categoryModel ->deletecategory($table_category_product, $cond);
            
            if($result == 1){
                echo "delete dữ liệu thành công";
            }else{
                echo "delete dữ liệu thầt bại";
            }
        }

    }
?>