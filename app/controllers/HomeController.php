<?php

class HomeController extends Controller {

    public function index()
    {
        $db = $this->model('Product');
        //Lấy sp
        $sp = $db->getProducts(false);
        $this->view('layouts/main','home/index', ['sp' => $sp]);
    }

    public function blog(){

        $this->view('layouts/main', 'home/blog');
    }

    public function error(){

        $this->view('layouts/main', 'home/404-error');
    }

    public function contact(){
        
        $this->view('layouts/main', 'home/contact');
    }

    public function login () {

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $un = $_POST['un'];
            $pw = $_POST['pw'];
            $User = $this->model('User');
            $us = $User->getUser(['email' => $un, 'password' => $pw]);
            
            if($us){
                setcookie('LOGIN_COOKIE', serialize($us), time() + 86400, "/");

                if(isset($_GET['url'])){
                    header($_GET['url']);
                }else{
                    header("Location: http://localhost/shop-php/index.php");
                }
            }
        }
        $this->view('layouts/login', '');
    }
    
    public function logout(){
        setcookie("LOGIN_COOKIE", "", time()-3600, "/");
        header("Location: http://localhost/shop-php/index.php?con=HomeController&act=login");
        ///$this->view('layouts/login', '');
    }


    public function signup () {

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $un = $_POST['un'];
            $pw = $_POST['pw'];
            $User = $this->model('User');
            $us = $User->getUser(['email' => $un, 'password' => $pw]);
            
            if($us){
                setcookie('SIGNUP_COOKIE', serialize($us), time() + 86400, "/");

                if(isset($_GET['url'])){
                    header($_GET['url']);
                }else{
                    header("Location: http://localhost/shop-php/index.php");
                }
            }
        }
        $this->view('layouts/signup', '');
    }
    
}
