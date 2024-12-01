<?php
class Product extends Model{

    //Lấy tất cả sản phẩm để hiện thị ra trang
    public function getProducts($np = true, $page = 1, $size = 20,){
        if($np){
            $offset = ($page - 1) * $size;
            $sql = "SELECT * FROM vw_products order by thutu DESC LIMIT $size OFFSET $offset";
            return $this->fetchAll($sql, [ 'size'=> $size, 'offset' => $offset]);
        }else{

            $sql = "SELECT * FROM vw_products order by thutu DESC";
            return $this->fetchAll($sql);
        }
        
    }

    //Lấy sản phẩm theo chuyên mục
    public function getProduct($cat, $page = 1, $size = 20, $np = true){
        $sql = "SELECT id FROM categories WHERE parent_id = :parent_id";
        $idCat = $this->fetchAll($sql, ['parent_id' => $cat]);
        $idCat = array_column($idCat, 'id');
        array_push($idCat, $cat);
        
        // Tạo danh sách các tham số cho câu truy vấn
        $placeholders = [];
        foreach ($idCat as $i => $id) {
            $placeholders[] = ":idCat$i"; // Tạo placeholder dạng :idCat0, :idCat1,...
        }

        // Khởi tạo mảng các tham số để bind
        $params = [];
        foreach ($idCat as $i => $id) {
            $params["idCat$i"] = $id; // Bind từng giá trị vào các placeholder
        }
       
        if($np){
            $offset = ($page - 1) * $size;
            $sql = "SELECT * FROM vw_products WHERE idCat in (". implode(', ', $placeholders) .") order by thutu DESC LIMIT $size OFFSET $offset";
            return $this->fetchAll($sql, $params);
        }else{
            
            $sql = "SELECT * FROM vw_products WHERE idCat in (". implode(', ', $placeholders) .") order by thutu DESC";
            return $this->fetchAll($sql, $params);
        }
        
    }

    //Tính tổng số trang
    public function getNumberPage($cat){
        if($cat > 0){
            //Tổng số trang theo danh mục
            $data =  $this->getProduct($cat, 1, 20,false);
            return count($data);
        }else{
            //Tổng số trang tất cả các sản phẩm
            $data =  $this->getProducts(false);
            return count($data);
        }
    }

    public function layCTSP($id){
        $sql = "SELECT * FROM vw_products WHERE id = :id";
        return $this->fetchOne($sql,['id' => $id]);
    }

    
}
?>

