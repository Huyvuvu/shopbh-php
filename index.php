<?php
    //Đường dẫn ổ đĩa
    define("BASE_PATH", __DIR__);
    require_once BASE_PATH . '/app/core/App.php';
    require_once BASE_PATH . '/app/core/Controller.php';
    require_once BASE_PATH . '/app/core/Model.php';
    
    $app = new App();
?>