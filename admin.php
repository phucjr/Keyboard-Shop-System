<?php
@include 'config.php';
include 'session_start.php';

// Kiểm tra nếu người dùng đã đăng nhập và có vai trò là admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: dangnhap.php');
    exit; // Dừng thực thi nếu không phải admin hoặc chưa đăng nhập
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        .admin{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #4b79a1, #283e51);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .admin-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            text-align: center;
            width: 300px;
        }

        .admin-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .admin-container a {
            display: block;
            margin: 10px 0;
            padding: 12px;
            background: transparent;
            color: #fff;
            text-decoration: none;
            border-radius: 30px;
            border: 2px solid rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: bold;
        }

        .admin-container a:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
<?php
 require_once("header.php");

?>
<div class="admin">
<div class="admin-container">
    <h1>Quản lí Trang Web</h1>

    <a href="product_manage.php">Quản Lí Sản Phẩm</a>
    <a href="add_product.php">Thêm Sản Phẩm Mới</a>

    <a href="detail_manage.php">Thao Tác Với Chi Tiết Sản Phẩm</a>
    <a href="orders.php">Quản Lí Đơn Hàng</a>

</div>
</div>
<?php
 require_once("footer.php");

?>
</body>
</html>