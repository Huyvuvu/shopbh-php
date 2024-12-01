<?php

class CategoryController extends Controller {

    public function __construct(){
        $this->auth();
    }
    
    public function index(){
        //Gọi model
        $cat = $this->model('Category');
        $data = $cat->getCategory();
        $this->view('layouts/admain','admin/cat/index', ['cat' => $data]);
    }

    public function add(){

        //Gọi model
        $cat = $this->model('Category');
        $data = $cat->getCategory();
        $message = "";
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten = $_POST['ten'];
            $parent_id = $_POST['parent_id'];
            $mota = $_POST['mota'];
            $cat->addCategory([
                'ten' => $ten,
                'parent_id' => $parent_id,
                'mota' => $mota
            ]);
            $message = "Thêm dữ liệu thành công";
        }

        $this->view('layouts/admain','admin/cat/add', ['cat' => $data, 'message' => $message]);
    }

    public function edit(){

        //Gọi model
        $id = $_GET['id'];
        $cat = $this->model('Category');
        $message = "";
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten = $_POST['ten'];
            $parent_id = $_POST['parent_id'];
            $mota = $_POST['mota'];
            $cat->updateCategory([
                'id' => $id,
                'ten' => $ten,
                'parent_id' => $parent_id,
                'mota' => $mota
            ]);
            $message = "Cập nhật dữ liệu thành công";
        }
        $cats = $cat->getCategory();
        $cat = $cat->findCategorybyId($id);
        

        $this->view('layouts/admain','admin/cat/update', ['cats' => $cats, 'cat' => $cat, 'message' => $message]);
    }

    public function delete(){
        $id = $_GET['id'];
        $cat = $this->model('Category');
        $cat->deleteCategory($id);
        $_SESSION['message'] = "Xóa thành công";
        header("Location: http://localhost/shop-php/index.php?area=admin&con=CategoryController&act=index");
        //link để vào Admin  http://localhost/shop-php/index.php?area=admin&con=CategoryController&act=index
    }
}