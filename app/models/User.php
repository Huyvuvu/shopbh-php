<?php

class User extends Model {
    public function getUser($data){
        $sql = "SELECT * FROM Users WHERE email like :email AND password like :password";
        return $this->fetchOne($sql, $data);
    }
}

?>