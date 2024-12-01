<?php
//File này dùng để điều hướng đường dẫn (url).
class App
{

    //Controller
    protected $controller = 'HomeController';
    //Phương thức
    protected $method = 'index';

    //Hàm khởi tạo
    public function __construct()
    {
        $url = $this->parseUrl();
        $path = '/app/controllers/';
        if($url){
            if (strlen($url[2]) > 0 && strtolower($url[2]) == 'admin') {
                $path = '/app/controllers/admin/';
            }
        }
        
        if ($url != null) {
            //Kiểm tra file controller có không
            if (file_exists(BASE_PATH . $path . $url[0] . '.php')) {

                $this->controller = $url[0];
                unset($url[0]); //Hủy giá trị
            }

            //Thêm file controller dùng để kiểm tra
            require_once BASE_PATH . $path . $this->controller . '.php';

            //Kiểm tra có biến này chưa
            if (isset($url[1])) {
                if (method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]); //Hủy giá trị
                }
            }
        }

        //Dùng để thêm file controller
        require_once BASE_PATH . $path . $this->controller . '.php';
        $this->controller = new $this->controller; //Khởi tạo 1 class

        call_user_func_array([$this->controller, $this->method], []);
    }

    //Hàm này dùng để phân tích đường dẫn url
    /// https://vnexpress.net?con=san-pham&act=detail
    public function parseUrl()
    {
        if (isset($_GET['con']) || isset($_GET['act'])) {
            $area = $_GET['area'] ?? '';
            return [$_GET['con'], $_GET['act'], $area];
        }
    }
}
