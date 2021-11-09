<?php
    class Product extends DController{
        public function __construct(){
            parent::__construct();
        }
        public function index(){
            $this->addCategory();
        }
        public function addCategory(){
            $this ->load -> view('cpanel/header');
            $this ->load -> view('cpanel/menu');
            $this ->load -> view('cpanel/product/addcategory');
            $this ->load -> view('cpanel/footer');
        }
        public function add_product(){
            $this ->load -> view('cpanel/header');
            $this ->load -> view('cpanel/menu');
            $table = "tbl_category_product";
            $categoryModel = $this->load->model('categoryModel');
            $data['category'] = $categoryModel -> category($table);
            $this ->load -> view('cpanel/product/add_product',$data);
            $this ->load -> view('cpanel/footer');
        }
        public function insert_product(){
            $title = $_POST['title_product'];
            $price= $_POST['price_product'];
            $hot= $_POST['product_hot'];
            $desc = $_POST['desc_product'];
            $quantity = $_POST['quantity_product'];

            $image = $_FILES['image_product']['name'];
            $tmp_image = $_FILES['image_product']['tmp_name'];

            $div = explode('.', $image);
            $file_ext = strtolower(end($div));
            $unique_image = $div[0].time().'.'.$file_ext;

            $path_uploads = "public/uploads/product/".$unique_image;
            $category = $_POST['category_product'];

            $table = "tbl_product";

            $data = array(
                'title_product' => $title,
                'desc_product' => $desc,
                'price_product' => $price,
                'product_hot' => $hot,
                'quantity_product' => $quantity,
                'image_product' => $unique_image,
                'id_category_product' => $category
            );
            $categoryModel = $this->load->model('categoryModel');
            $result = $categoryModel -> insertproduct($table, $data);
            if($result == 1){
                move_uploaded_file($tmp_image, $path_uploads);
                $message ['msg'] = "Thêm sản phẩm thành công";
                return header("Location:".BASE_URL."product/list_product?msg=".urlencode(serialize($message)));
            }else{
                $message ['msg'] = "Thêm sản phẩm thất bại";
                return header("Location:".BASE_URL."product/list_product?msg=".urlencode(serialize($message)));
            } 
        }
        public function insertCategory(){
            $title = $_POST['title_category_product'];
            $desc = $_POST['desc_category_product'];
            $table = "tbl_category_product";
            $data = array(
                'title_category_product' => $title,
                'desc_category_product' => $desc,
            );
            $categoryModel = $this->load->model('categoryModel');
            $result = $categoryModel -> insertcategory($table, $data);
            if($result == 1){
                $message ['msg'] = "Them danh muc san pham thanh cong";
                return header("Location:".BASE_URL."product/list_category?msg=".urlencode(serialize($message)));
            }else{
                $message ['msg'] = "Them danh muc san pham that bai";
                return header("Location:".BASE_URL."product/list_category?msg=".urlencode(serialize($message)));
            } 
        }

        public function list_category(){
            $this ->load -> view('cpanel/header');
            $this ->load -> view('cpanel/menu');
            $table = "tbl_category_product";
            $categoryModel = $this->load->model('categoryModel');
            $data['category'] = $categoryModel -> category($table);
            $this ->load -> view('cpanel/product/list_category',$data);
            $this ->load -> view('cpanel/footer');
        }

        public function list_product(){
            $this ->load -> view('cpanel/header');
            $this ->load -> view('cpanel/menu');
            $table_product = "tbl_product";
            $table_category = "tbl_category_product";
            $categoryModel = $this->load->model('categoryModel');
            $data['product'] = $categoryModel -> product($table_product, $table_category);
            $this ->load -> view('cpanel/product/list_product',$data);
            $this ->load -> view('cpanel/footer');
        }
        
        public function delete_product(){
            $id = $_GET['id'];  
            $table = "tbl_product";
            $cond = "id_product = '{$id}'";
            $categoryModel = $this->load->model('categoryModel');
            $result = $categoryModel -> deleteproduct($table, $cond);
            if($result == 1){
                $message ['msg'] = "Xoa  san pham thanh cong";
                return header("Location:".BASE_URL."product/list_product?msg=".urlencode(serialize($message)));
            }else{
                $message ['msg'] = "Xoa  san pham that bai";
                return header("Location:".BASE_URL."product/list_product?msg=".urlencode(serialize($message)));
            }
        }
        public function delete_category(){
            $id = $_GET['id'];  
            $table = "tbl_category_product";
            $cond = "id_category_product = '{$id}'";
            $categoryModel = $this->load->model('categoryModel');
            $result = $categoryModel -> deletecategory($table, $cond);
            if($result == 1){
                $message ['msg'] = "Xoa danh muc san pham thanh cong";
                return header("Location:".BASE_URL."product/list_category?msg=".urlencode(serialize($message)));
            }else{
                $message ['msg'] = "Xoa danh muc san pham that bai";
                return header("Location:".BASE_URL."product/list_category?msg=".urlencode(serialize($message)));
            }
        }
        public function edit_product(){
            $table = "tbl_product";
            $table_category = "tbl_category_product";

            $id = $_GET['id'];  
            $cond = "id_product = '{$id}'";

            $categoryModel = $this->load->model('categoryModel');

            $data['productbyid'] = $categoryModel -> productbyid($table, $cond);
            $data['category'] = $categoryModel -> category($table_category);
            
            $this ->load -> view('cpanel/header');
            $this ->load -> view('cpanel/menu');
            $this ->load -> view('cpanel/product/edit_product', $data);
            $this ->load -> view('cpanel/footer');
        }
        public function edit_category(){
            $id = $_GET['id'];  
            $table = "tbl_category_product";
            $cond = "id_category_product = '{$id}'";
            $categoryModel = $this->load->model('categoryModel');
            $data['categorybyid'] = $categoryModel -> categorybyid($table, $cond);
            
            $this ->load -> view('cpanel/header');
            $this ->load -> view('cpanel/menu');
            $this ->load -> view('cpanel/product/edit_category', $data);
            $this ->load -> view('cpanel/footer');
        }
        public function update_product(){
            $table = "tbl_product";
            $categoryModel = $this->load->model('categoryModel');

            $id = $_GET['id'];  
            $cond = "id_product = '{$id}'";
            $title = $_POST['title_product'];
            $price= $_POST['price_product'];
            $hot= $_POST['product_hot'];
            $desc = $_POST['desc_product'];
            $quantity = $_POST['quantity_product'];
            $category = $_POST['category_product'];

            $image = $_FILES['image_product']['name'];
            $tmp_image = $_FILES['image_product']['tmp_name'];
            $div = explode('.', $image);
            $file_ext = strtolower(end($div));
            $unique_image = $div[0].time().'.'.$file_ext;
            $path_uploads = "public/uploads/product/".$unique_image;
            if($image){
                $data['productbyid'] = $categoryModel -> productbyid($table, $cond);
                foreach($data['productbyid'] as $key => $value){
                    $path_unlink = "public/uploads/product/";
                    unlink($path_unlink.$value['image_product']);
                }
                $data = array(
                    'title_product' => $title,
                    'desc_product' => $desc,
                    'price_product' => $price,
                    'quantity_product' => $quantity,
                    'product_hot' => $hot,
                    'image_product' => $unique_image,
                    'id_category_product' => $category,
                );
                move_uploaded_file($tmp_image, $path_uploads);
            }else{
                $data = array(
                    'title_product' => $title,
                    'desc_product' => $desc,
                    'product_hot' => $hot,
                    'price_product' => $price,
                    'quantity_product' => $quantity,
                    'id_category_product' => $category,
                );
            }
            $result = $categoryModel -> updateproduct($table, $data, $cond);
            if($result == 1){
                $message ['msg'] = "Cập nhật sản phẩm thành công";
                return header("Location:".BASE_URL."product/list_product?msg=".urlencode(serialize($message)));
            }else{
                $message ['msg'] = "Cập nhật sản phẩm thất bại";
                return header("Location:".BASE_URL."product/list_product?msg=".urlencode(serialize($message)));
            } 
        }
        public function update_category_product(){
            $id = $_GET['id'];  
            $table = "tbl_category_product";
            $cond = "id_category_product = '{$id}'";

            $title = $_POST['title_category_product'];
            $desc = $_POST['desc_category_product'];

            $data = array(
                    'title_category_product' => $title,
                    'desc_category_product' => $desc,
            );
            $categoryModel = $this->load->model('categoryModel');
            $result= $categoryModel -> updatecategory($table, $data, $cond);

            if($result == 1){
                $message ['msg'] = "Cập nhật danh muc san pham thanh cong";
                return header("Location:".BASE_URL."product/list_category?msg=".urlencode(serialize($message)));
            }else{
                $message ['msg'] = "Cập nhật danh muc san pham that bai";
                return header("Location:".BASE_URL."product/list_category?msg=".urlencode(serialize($message)));
            }
        }
        public function upLoadfile(){
            $this ->load -> view('cpanel/header');
            $this ->load -> view('cpanel/menu');
            $this ->load -> view('cpanel/product/upload');
            $this ->load -> view('cpanel/footer');
        }
        public function insertFile(){
                $file = $_FILES['image_product'];
                $fileName = $_FILES['image_product']['name'];
                $fileTmp = $_FILES['image_product']['tmp_name'];
                $fileSize = $_FILES['image_product']['size'];
                $fileError = $_FILES['image_product']['error'];
                $fileType= $_FILES['image_product']['type'];

                $file_Ext = explode('.',$fileName);
                $fileActualExt = strtolower(end($file_Ext));

                $unique_image = $file_Ext[0].time();
                $path_uploads = "public/uploads/product/".$unique_image.".png";

                move_uploaded_file($fileTmp,$path_uploads);
            
            }
        
    }
?>