<?php

class ProductController extends Controller {

    public function index(){
        //Đây là id dùng để lấy toàn bộ sản phẩm có idCat 
        $cat = $_GET['cat'];
        if(empty($cat) || !is_int($cat)){
            //Dùng để chuyển trang
            header('http://localhost/shop-php/index.php?con=HomeController&act=error');
        }
        
        //Gọi model product
        $db = $this->model('Product');
        //Lấy số trang
        $page = (int) isset($_GET['p'])? $_GET['p']: 1;
        //Số lượng sản phẩm trên 1 trang
        $size = 3;
        //Lấy sản phẩm
        $sp = $db->getProduct($cat, $page, $size);
        //Tổng số trang
        $np = ceil(($db->getNumberPage($cat))/$size);

        $this->view('layouts/main', 'product/index', [
            'sp' => $sp,
            'p' => $page,
            'sotrang' => $np,
            'cat' => $cat
        ]);
    }

    public function getProduct(){
        $cat = $_GET['cat'];
        // //Gọi model product
        $db = $this->model('Product');
        //Lấy số trang
        $page = (int) isset($_GET['p'])? $_GET['p']: 1;
        //Số lượng sản phẩm trên 1 trang
        $size = 1;
        //Lấy sản phẩm
        $sp = $db->getProduct($cat, $page, $size);
 
        echo json_encode($sp);
    }

    
    public function detail(){

        //Đây là id dùng để lấy chi tiết sản phẩm
        $id = $_GET['id'];
        if(empty($id) || !is_int($id)){
            //Dùng để chuyển trang
            header('http://localhost/shop-php/index.php?con=HomeController&act=error');
        }

        //Gọi model product
        $db = $this->model('Product');
        //Lấy sản phẩm
        $sp = $db->layCTSP($id);

        $this->view('layouts/main', 'product/detail', ['sp' => $sp]);
    }
    
    public function cart(){

        $this->view('layouts/main', 'product/cart');
    }

   
}
