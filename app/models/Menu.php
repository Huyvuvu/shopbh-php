<?php
class Menu extends Model {
    public function addMenu($menu = []){
        $sql = 'INSERT INTO menus (id, ten, slug, idCha, idCat, mota, anhien, thutu) 
        VALUES (NULL, :ten, :slug, :idCha, :idCat, :mota, :anhien, :thutu)';

        return $this->query($sql,  $menu);
    }

    public function getMenuL1(){
        $sql = 'SELECT * FROM menus WHERE idCha IS NULL AND anhien = 1 ORDER BY thutu DESC';
        return $this->fetchAll($sql);
    }

    public function getMenuChild($id){
        $sql = 'SELECT * FROM menus WHERE idCha = :idCha AND anhien = 1 ORDER BY thutu DESC';
        return $this->fetchAll($sql, $id);
    }
}