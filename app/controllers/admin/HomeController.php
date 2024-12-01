<?php

require_once BASE_PATH . '/app/core/PHPMailer/src/PHPMailer.php';
require_once BASE_PATH . '/app/core/PHPMailer/src/SMTP.php';
require_once BASE_PATH . '/app/core/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class HomeController extends Controller
{


    public function __construct()
    {
        $this->auth();
    }

    public function index()
    {

        $this->view('layouts/admain', 'admin/home/index');
    }

    public function sendMail()
    {

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = "vunguyenquochuy2000@gmail.com";
            $mail->Password = "tjii ltgd hajk auzs";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';

            //Gửi từ
            $mail->setFrom('vunguyenquochuy2000@gmail.com', 'Huy');
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $db = $this->model('User');
                $name = $_POST['name'];
                $message = '';
                $email = filter_var($_POST['em'], FILTER_SANITIZE_EMAIL);
                $getUser = $db->getUser($email);
                // var_dump($getUser);
                if ($getUser == false) {
                    $password = $_POST['pw'];
                    $hashPasword = password_hash($password, PASSWORD_DEFAULT);
                    $db->addUser(['email' => $email, 'password' => $hashPasword, 'name' => $name, 'role' => 'user']);

                    $mail->addAddress($email);
                    $mail->isHTML(true);
                    $mail->Subject = "Đăng ký tài khoản";
                    $mail->Body = "!!!!Đăng ký thành công rồi đó!!!!";
                    $mail->send();
                    $this->view('layouts/login', '');
                } else if ($getUser == true) {
                    $message = 'Đã tồn tại tài khoản này';
                    $this->view('layouts/register', '', ['m' => $message]);
                }
            }

            //Người nhận
            $mail->addAddress('huyvu.ted@gmail.com', 'Vũ');
            //Nội dung email dạng HTML
            $mail->isHTML(true);
            $mail->Subject = "Xác nhận đơn hàng PHP2 của bạn";
            $mail->Body = "
    <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
        <p>Xin chào <b>[Tên khách hàng]</b>,</p>
        <p>Chúng tôi rất vui mừng thông báo rằng đơn hàng của bạn đã được ghi nhận thành công! Dưới đây là thông tin chi tiết về đơn hàng của bạn:</p>
        <hr style='border: none; border-top: 1px solid #ddd; margin: 20px 0;'>
        
        <h3 style='color: #007bff;'>Thông tin đơn hàng</h3>
        <ul style='list-style: none; padding: 0;'>
            <li><b>Tên khách hàng:</b> [Tên khách hàng]</li>
            <li><b>Mã đơn hàng:</b> [Mã đơn hàng]</li>
            <li><b>Ngày đặt hàng:</b> [Ngày đặt hàng]</li>
            <li><b>Tổng hóa đơn:</b> <span style='color: #28a745;'><b>28.990.000 VND</b></span></li>
        </ul>
        
        <h3 style='color: #007bff;'>Chi tiết sản phẩm</h3>
        <table style='width: 100%; border-collapse: collapse;'>
            <thead>
                <tr>
                    <th style='border: 1px solid #ddd; padding: 10px; text-align: left;'>Hình ảnh</th>
                    <th style='border: 1px solid #ddd; padding: 10px; text-align: left;'>Tên sản phẩm</th>
                    <th style='border: 1px solid #ddd; padding: 10px; text-align: center;'>Số lượng</th>
                    <th style='border: 1px solid #ddd; padding: 10px; text-align: right;'>Đơn giá</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style='border: 1px solid #ddd; padding: 10px; text-align: center;'>
                        <img src='./public/img/san-pham/iphone-15-plus-xanh-la-128gb-thumb-600x600.jpg' 
                             alt='iPhone 15 Plus Xanh Lá 128GB' 
                             style='max-width: 80px; height: auto;'>
                    </td>
                    <td style='border: 1px solid #ddd; padding: 10px;'>iPhone 15 Plus Xanh Lá 128GB</td>
                    <td style='border: 1px solid #ddd; padding: 10px; text-align: center;'>1</td>
                    <td style='border: 1px solid #ddd; padding: 10px; text-align: right;'>28.990.000 VND</td>
                </tr>
            </tbody>
        </table>
        
        <p>Chúng tôi sẽ bắt đầu xử lý đơn hàng của bạn ngay lập tức và thông báo khi đơn hàng được giao đến đơn vị vận chuyển. Vui lòng đảm bảo rằng số điện thoại và địa chỉ giao hàng của bạn là chính xác để tránh bất kỳ sự chậm trễ nào.</p>
        
        <h3 style='color: #007bff;'>Thông tin liên hệ</h3>
        <p><b>Email:</b> <a href='mailto:support@php2.com' style='color: #007bff;'>support@php2.com</a></p>
        <p><b>Hotline:</b> <a href='tel:1234567890' style='color: #007bff;'>1234-567-890</a></p>
        
        <hr style='border: none; border-top: 1px solid #ddd; margin: 20px 0;'>
        <p>Chúng tôi cảm ơn quý khách đã tin tưởng và sử dụng dịch vụ của PHP2.</p>
        <p>Trân trọng,</p>
        <p><b>Đội ngũ hỗ trợ PHP2</b></p>
    </div>
";




            $mail->send();
            echo 'Gửi mail thành công';
        } catch (Exception $e) {
            echo "Lỗi";
        }

        //http://localhost/shop-php/index.php?area=admin&con=HomeController&act=sendMail
        //link để gửi mail

    }
}
