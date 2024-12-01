<?php
class Category extends Model {

    public function getCategory(){
        $sql = 'SELECT * FROM categories';
        return $this->fetchAll($sql);
    }

    public function addCategory($data = []){
        $sql = "INSERT INTO categories (ten, parent_id, mota) VALUES (:ten, :parent_id, :mota)";
        return $this->query($sql, $data);
    }

    public function findCategorybyId($id){
        $sql = 'SELECT * FROM categories WHERE id = :id';
        return $this->fetchOne($sql, ['id' => $id]);
    }

    public function updateCategory($data = []){
        $sql = "UPDATE categories SET ten = :ten, parent_id = :parent_id, mota = :mota WHERE id = :id";
        return $this->query($sql, $data);
    }

    public function deleteCategory($id) {
        $sql = "DELETE FROM categories WHERE id = :id";
        return $this->query($sql, ['id' => $id]);
    }
}
?>