<?php

class Cart extends Model {

    //Tìm tất cả sản phẩm trong giỏ hàng theo tài khoản
    public function getCartUser($data){
        $sql = "SELECT * FROM vw_carts WHERE iduser = :iduser";
        return $this->fetchAll($sql, $data);
    }

    //Tìm sản phẩm theo tài khoản và mã sản phẩm
    public function getCartUserPro($data){
        $sql = "SELECT * FROM  Carts WHERE iduser = :iduser AND idpv = :idpv";
        return $this->fetchOne($sql, $data);
    }
    //Thêm sản phẩm vào giỏ hàng
    public function addCart($data) {
        $sql = "INSERT INTO Carts (iduser, idpv, soluong) VALUES (:iduser, :idpv, :soluong)";
        return $this->query($sql, $data);
    }
    //Cập nhật số lượng sản phẩm trong giỏ hàng
    public function updateCart($data){
        $sql = "UPDATE Carts SET soluong = :soluong WHERE iduser = :iduser AND idpv = :idpv";
        return $this->query($sql, $data);
    }
    //Xóa sản phẩm trong giỏ hàng
    public function deleteCart($data){
        $sql = "DELETE FROM Carts WHERE iduser = :iduser AND idpv = :idpv";
        return $this->query($sql, $data);
    }
}

?>