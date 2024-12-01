<?php

class CartController extends Controller {

    //Hiển thị giao diện
    public function index(){
        $this->view('layouts/main', 'cart/index');
    }

    public function viewCart(){
        //Gọi model giỏ hàng
        $Cart = $this->model('Cart');
        //Thông tin tài khoản
        $iduser = unserialize($_COOKIE['LOGIN_COOKIE'])['id'];
        //Lấy dữ liệu giỏ hàng
        $data = $Cart->getCartUser(['iduser' => $iduser]);
        $html = "";
        foreach($data as $i){
            $gia = number_format($i['gia']);
            $tt = number_format($i['gia'] * $i['soluong']);
            $html .= "
            <tr>
                <th scope='row'>
                    <div class='d-flex align-items-center'>
                        <img src='public/{$i['images']}' class='img-fluid me-5 rounded-circle' style='width: 80px; height: 80px;' alt=''>
                    </div>
                </th>
                <td>
                    <p class='mb-0 mt-4'>{$i['name']}</p>
                </td>
                <td>
                    <p class='mb-0 mt-4'>{$gia}</p>
                </td>
                <td>
                    <div class='input-group quantity mt-4' style='width: 100px;'>
                        <div class='input-group-btn'>
                            <button class='btn btn-sm btn-minus rounded-circle bg-light border' onclick='capNhatSoLuong(-1, {$i['idpv']})'>
                                <i class='fa fa-minus'></i>
                            </button>
                        </div>
                        <input type='text' class='form-control form-control-sm text-center border-0 changeValue' value='{$i['soluong']}' onblur='capNhatSoLuong(this.value - {$i['soluong']}, {$i['idpv']})'>
                        <div class='input-group-btn'>
                            <button class='btn btn-sm btn-plus rounded-circle bg-light border' onclick='capNhatSoLuong(1, {$i['idpv']})'>
                                <i class='fa fa-plus'></i>
                            </button>
                        </div>
                    </div>
                </td>
                <td>
                    <p class='mb-0 mt-4'>{$tt}</p>
                </td>
                <td>
                    <button class='btn btn-md rounded-circle bg-light border mt-4' onclick='xoaSanPham({$i['idpv']})'>
                        <i class='fa fa-times text-danger'></i>
                    </button>
                </td>

            </tr>";
        }
        echo $html;
    }

    //Vừa thêm sản phẩm vừa cập nhật gỏi hàng
    public function addUpdateCart(){
        try {
            $Cart = $this->model('Cart');
            
            $idpv = $_POST['idpv'];
            $iduser = unserialize($_COOKIE['LOGIN_COOKIE'])['id'];
            $sl = $_POST['sl'] ?? 1;
    
            $itemCart = $Cart->getCartUserPro(['idpv'=> $idpv, 'iduser' => $iduser]);
            if ($itemCart) {
                $sl += $itemCart['soluong'];
                if ($sl <= 0) {
                    echo json_encode([ 'error'=> false,'message' => 'Số lượng sản phẩm không được nhỏ hơn 1']);
                    return;
                }
                // Cập nhật số lượng trong CSDL
                $Cart->updateCart(['idpv'=> $idpv, 'iduser' => $iduser, 'soluong' => $sl]);
                echo json_encode([ 'error'=> true,'message' => 'Cập nhật giỏ hàng thành công']);
            } else {
                if ($sl <= 0) {
                    echo json_encode([ 'error'=> false,'message' => 'Số lượng sản phẩm không được nhỏ hơn 1']);
                    return;
                }
                // Thêm sản phẩm mới vào giỏ hàng
                $Cart->addCart([ 'idpv'=> $idpv, 'iduser' => $iduser, 'soluong' => $sl]);
                echo json_encode([ 'error'=> true,'message' => 'Đã thêm sản phẩm vào giỏ hàng']);
            }
        } catch (Exception $e) {
            echo json_encode([ 'error'=> false,'message' => 'Thêm hoặc cập nhật sản phẩm vào giỏ hàng bị lỗi']);
        }
    }
    

    //Xóa sản phẩm trong giỏ hàng
    public function deleteCart(){
        try{
            //Gọi model giỏ hàng
            $Cart = $this->model('Cart');
            $idpv = $_GET['idpv'];
            $iduser = unserialize($_COOKIE['LOGIN_COOKIE'])['id'];
            $Cart->deleteCart(['idpv'=> $idpv, 'iduser' => $iduser]);
            echo json_encode([ 'error'=> true,'message' => 'Xóa sản phẩm trong giỏ hàng thành công']);
        }
        catch (Exception $e){
            echo json_encode([ 'error'=> false,'message' => 'Lỗi xóa sản phẩm vào giỏ hàng']);
        }
    }
}
?>