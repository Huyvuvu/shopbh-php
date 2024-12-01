<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f4f4f4;
    }
    
    .login-container {
        width: 300px;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        text-align: center;
    }
    
    h2 {
        margin-bottom: 20px;
        color: #333;
    }
    
    .input-group {
        margin-bottom: 15px;
        text-align: left;
    }
    
    .input-group label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }
    
    .input-group input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    
    button {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }
    
    button:hover {
        background-color: #45a049;
    }
    
    .signup-link {
        margin-top: 15px;
        color: #333;
    }
    
    .signup-link a {
        color: #4CAF50;
        text-decoration: none;
    }
    
    .signup-link a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
    <div class="login-container">
        <h2>ĐĂNG NHẬP</h2>
        <form method="post">
            <div class="input-group">
                <label for="username">Tên tài khoản</label>
                <input type="text" id="username" name="un" required>
            </div>
            <div class="input-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="pw" required>
            </div>
            <button type="submit">Đăng nhập</button>
            <p class="signup-link">Bạn không có tài khoản? <a href="index.php?con=HomeController&act=signup">Đăng ký</a></p>
        </form>
    </div>
</body>
</html>