<?php

class Model{
    protected $db;

    public function __construct(){
        //Kết nối csdl
        $this->db = new PDO('mysql:host=localhost;dbname=laravel', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->exec("set names utf8mb4");
    }

    //Phương thức truy vấn
    public function query($sql, $params = []){
        $q = $this->db->prepare($sql);
        $q->execute($params);
        return $q;
    }

    //Phương thức lấy hết tất cả các kết quả
    public function fetchAll($sql, $params = []){
        $q = $this->query($sql, $params);
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    //Phương thức lấy một kết quả
    public function fetchOne($sql, $params = []){
        $q = $this->query($sql, $params);
        return $q->fetch(PDO::FETCH_ASSOC);
    }
}