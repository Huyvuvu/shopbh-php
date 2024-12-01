<?php

class Controller{

    //Khởi tạo model khi cần truy cập dữ liệu
    public function model($model){
        require_once BASE_PATH . '/app/models/'. $model .'.php';
        return new $model();    
    }

    //Kiểm tra thông tin đăng nhập
    public function auth(){
        //Thông tin đăng nhập
        if(!isset($_COOKIE['LOGIN_COOKIE'])){
            header("Location: http://localhost/shop-php/index.php?con=HomeController&act=login");
        }else{
            $role = unserialize($_COOKIE['LOGIN_COOKIE'])['role'];
            if(!($role == 'admin'))
                header("Location: http://localhost/shop-php/index.php?con=HomeController&act=login");
        }
    }
   

    //Dùng để hiển thị view ra ngoài màn hình
    public function view($layout, $view, $data = []){
        foreach($data as $key => $value){
            $$key = $value;
        }
        //Tạo đường dẫn dùng để hiển thị view
        $viewPath = null;
        if($view)
            $viewPath = BASE_PATH . '/app/views/' . $view . '.php';

        if($layout == '')
            require_once BASE_PATH . '/app/views/layouts/index.php';
        else
            require_once BASE_PATH . '/app/views/'. $layout .'.php';
    }
}