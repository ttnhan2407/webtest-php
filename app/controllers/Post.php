<?php
    class Post extends DController{
        public function __construct(){
            parent::__construct();
        }
        public function index(){
            $this->addCategory(); 
        }
        public function addCategory(){
            $this ->load -> view('cpanel/header');
            $this ->load -> view('cpanel/menu');
            $this ->load -> view('cpanel/post/addcategory');
            $this ->load -> view('cpanel/footer');
        }
        public function insertCategory(){
            $title = $_POST['title_category_post'];
            $desc = $_POST['desc_category_post'];
            $table = "tbl_category_post";
            $data = array(
                'title_category_post' => $title,
                'desc_category_post' => $desc,
            );
            $categoryModel = $this->load->model('categoryModel');
            $result = $categoryModel -> insertcategory_post($table, $data);
            if($result == 1){
                $message ['msg'] = "Thêm danh mục bài viết thành công !";
                return header("Location:".BASE_URL."post/list_category?msg=".urlencode(serialize($message)));
            }else{
                $message ['msg'] = "Thêm danh mục bài viết thất bại !";
                return header("Location:".BASE_URL."post/list_category?msg=".urlencode(serialize($message)));
            }
           
        }
        public function list_category(){
            $this ->load -> view('cpanel/header');
            $this ->load -> view('cpanel/menu');
            $table = "tbl_category_post";
            $categoryModel = $this->load->model('categoryModel');
            $data['category'] = $categoryModel ->post_category($table);
            $this ->load -> view('cpanel/post/list_category',$data);
            $this ->load -> view('cpanel/footer');
        }
       public function delete_category(){
            $id = $_GET['id'];  
            $table = "tbl_category_post";
            $cond = "id_category_post = '{$id}'";
            $categoryModel = $this->load->model('categoryModel');
            $result = $categoryModel -> deletecategory_post($table, $cond);
            if($result == 1){
                $message ['msg'] = "Xóa danh mục bài viết thành công";
                return header("Location:".BASE_URL."post/list_category?msg=".urlencode(serialize($message)));
            }else{
                $message ['msg'] = "Xóa danh mục bài viết thất bại";
                return header("Location:".BASE_URL."post/list_category?msg=".urlencode(serialize($message)));
            }
        }
        public function edit_category(){
            $id = $_GET['id'];  
            $table = "tbl_category_post";
            $cond = "id_category_post = '{$id}'";
            $categoryModel = $this->load->model('categoryModel');
            $data['categorybyid'] = $categoryModel -> categorybyid_post($table, $cond);
            
            $this ->load -> view('cpanel/header');
            $this ->load -> view('cpanel/menu');
            $this ->load -> view('cpanel/post/edit_category', $data);
            $this ->load -> view('cpanel/footer');
        }
        public function update_category_post(){
            $id = $_GET['id'];  
            $table = "tbl_category_post";
            $cond = "id_category_post = '{$id}'";

            $title = $_POST['title_category_post'];
            $desc = $_POST['desc_category_post'];

            $data = array(
                    'title_category_post' => $title,
                    'desc_category_post' => $desc,
            );
            $categoryModel = $this->load->model('categoryModel');
            $result= $categoryModel -> updatecategory_post($table, $data, $cond);

            if($result == 1){
                $message ['msg'] = "Cập nhật danh muc bài viết thành công";
                return header("Location:".BASE_URL."post/list_category?msg=".urlencode(serialize($message)));
            }else{
                $message ['msg'] = "Cập nhật danh muc bìa viết thất bại";
                return header("Location:".BASE_URL."post/list_category?msg=".urlencode(serialize($message)));
            }
        }
        public function add_post(){
            $this ->load -> view('cpanel/header');
            $this ->load -> view('cpanel/menu');

            $postModel = $this->load->model('postModel');
            $table = "tbl_category_post";
            $data['category']= $postModel ->category_post($table);
            $this ->load -> view('cpanel/post/add_post',$data);
            $this ->load -> view('cpanel/footer');
        }
        public function insert_post(){
            $title = $_POST['title_post'];
            $content = $_POST['content_post'];

            $image = $_FILES['image_post']['name'];
            $tmp_image = $_FILES['image_post']['tmp_name'];

            $div = explode('.', $image);
            $file_ext = strtolower(end($div));
            $unique_image = $div[0].time().'.'.$file_ext;

            $path_uploads = "public/uploads/post/".$unique_image;
            $category = $_POST['category_post'];

            $table = "tbl_post";

            $data = array(
                'title_post' => $title,
                'content_post' => $content,
                'image_post' => $unique_image,
                'id_category_post' => $category
            );
            $postModel = $this->load->model('postModel');
            $result = $postModel -> insertpost($table, $data);
            if($result == 1){
                move_uploaded_file($tmp_image, $path_uploads);
                $message ['msg'] = "Thêm bài viết thành công";
                return header("Location:".BASE_URL."post/add_post?msg=".urlencode(serialize($message)));
            }else{
                $message ['msg'] = "Thêm bài viết thất bại";
                return header("Location:".BASE_URL."post/add_post?msg=".urlencode(serialize($message)));
            } 
        }
        public function list_post(){
            $this ->load -> view('cpanel/header');
            $this ->load -> view('cpanel/menu');
            $table_post = "tbl_post";
            $table_category = "tbl_category_post";

            $postModel = $this->load->model('postModel');
            $data['post'] = $postModel -> post($table_post, $table_category);

            $this ->load -> view('cpanel/post/list_post',$data);
            $this ->load -> view('cpanel/footer');
        }
        public function delete_post(){
            $id = $_GET['id'];  
            $table = "tbl_post";
            $cond = "id_post = '{$id}'";
            $postModel = $this->load->model('postModel');
            $result = $postModel -> deletepost($table, $cond);
            if($result == 1){
                $message ['msg'] = "Xoa bai viet thanh cong";
                return header("Location:".BASE_URL."post/list_post?msg=".urlencode(serialize($message)));
            }else{
                $message ['msg'] = "Xoa  bai viet that bai";
                return header("Location:".BASE_URL."post/list_post?msg=".urlencode(serialize($message)));
            }
        }
        public function edit_post(){
            $this ->load -> view('cpanel/header');
            $this ->load -> view('cpanel/menu');

            $postModel = $this->load->model('postModel');
            $table = "tbl_category_post";
            $table_post = "tbl_post";
            $id = $_GET['id'];  
            $cond = "id_post = '{$id}'";

            $data['category']= $postModel ->category_post($table);
            $data['postbyid'] = $postModel ->postbyid($table_post,$cond);

            $this ->load -> view('cpanel/post/edit_post',$data);
            $this ->load -> view('cpanel/footer');
        }
        public function update_post(){
            $table = "tbl_post";
            $postModel = $this->load->model('postModel');

            $id = $_GET['id'];  
            $cond = "id_post = '{$id}'";

            $title = $_POST['title_post'];
            $content = $_POST['content_post'];
            $category = $_POST['category_post'];
            $image = $_FILES['image_post']['name'];

            $tmp_image = $_FILES['image_post']['tmp_name'];
            $div = explode('.', $image);
            $file_ext = strtolower(end($div));
            $unique_image = $div[0].time().'.'.$file_ext;
            $path_uploads = "public/uploads/post/".$unique_image;
            if($image){
                $data['postbyid'] = $postModel -> postbyid($table, $cond);
                foreach($data['postbyid'] as $key => $value){
                    $path_unlink = "public/uploads/post/";
                    unlink($path_unlink.$value['image_post']);
                }
                $data = array(
                    'title_post' => $title,
                    'content_post' => $content,
                    'image_post' => $unique_image,
                    'id_category_post' => $category
                );
                move_uploaded_file($tmp_image, $path_uploads);
            }else{
                $data = array(
                    'title_post' => $title,
                    'content_post' => $content,
                    'id_category_post' => $category,
                );
            }
            $result = $postModel -> updatepost($table, $data, $cond);
            if($result == 1){
                $message ['msg'] = "Cập nhật sản phẩm thành công";
                return header("Location:".BASE_URL."post/list_post?msg=".urlencode(serialize($message)));
            }else{
                $message ['msg'] = "Cập nhật sản phẩm thất bại";
                return header("Location:".BASE_URL."post/list_post?msg=".urlencode(serialize($message)));
            } 
        }
    }
?>