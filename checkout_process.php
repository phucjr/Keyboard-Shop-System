
    <?php
session_start();

// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Productdb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Xử lý khi form được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_SESSION['cart'])) {
        header("Location:index.php");
        exit();
    }

    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $tinh = $_POST['tinh'];
    $huyen = $_POST['huyen'];
    $xa = $_POST['xa'];
    $diachi = $_POST['diachi'];
    $payment_method = $_POST['payment_method'];

    // Lưu thông tin đơn hàng vào cơ sở dữ liệu
    $sql = "INSERT INTO orders (name, phone, email, tinh, huyen, xa, diachi, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $name, $phone, $email, $tinh, $huyen, $xa, $diachi, $payment_method);

    if ($stmt->execute()) {
        $order_id = $stmt->insert_id; // Lấy ID của đơn hàng vừa tạo

        // Lưu thông tin giỏ hàng vào cơ sở dữ liệu
        foreach ($_SESSION['cart'] as $item) {
            $product_id = $item['product_id'];
            $quantity = $item['quantity'];
            $sql = "INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iii", $order_id, $product_id, $quantity);
            $stmt->execute();
        }

        // Xóa giỏ hàng sau khi thanh toán thành công
        unset($_SESSION['cart']);

        header("Location: index.php");
        exit();
    } else {
        echo "<div class='container'><h2>Error: " . $stmt->error . "</h2></div>";
    }

    $stmt->close();
    $conn->close();
} else {
    // Hiển thị form checkout
    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <style>
        .form-container {
            width: 100%;
            height: 100%;
            z-index: 10; /* Đảm bảo form nằm trên cùng */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50%; /* Tùy chỉnh chiều rộng form */
        }
        .payment {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            padding: 10px 40px 10px 40px;
            background-color: black;
            color: aqua;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: max-content;
        }
    </style>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="checkout_process.css">
    <link rel="stylesheet" href="trangchu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

   
</head>
<body>
<?php require_once("header.php"); ?>

<div class="form-container">
    <div class="form-content">
        <h2>Thông tin đặt hàng</h2>
        <form action="checkout_process.php" method="post"  onsubmit="return validateEmail()">
            <div class="form-group">
                <label for="name">Họ tên</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="number" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="tinh">Tỉnh/Thành phố</label>
                <input type="text" class="form-control" id="tinh" name="tinh" required>
            </div>
            <div class="form-group">
                <label for="huyen">Huyện/Quận</label>
                <input type="text" class="form-control" id="huyen" name="huyen" required>
            </div>
            <div class="form-group">
                <label for="xa">Xã/Phường</label>
                <input type="text" class="form-control" id="xa" name="xa" required>
            </div>
            <div class="form-group">
                <label for="diachi">Địa chỉ</label>
                <input type="text" class="form-control" id="diachi" name="diachi" required>
            </div>
            <div class="form-group">
                <label for="payment-method">Phương thức thanh toán</label>
                <select class="form-control" id="payment-method" name="payment_method" required onchange="toggleBankTransferImage()">
                    <option value="Trực tiếp">Thanh toán trực tiếp</option>
                    <option value="Chuyển khoản">Chuyển khoản ngân hàng</option>
                    <!-- Thêm các phương thức thanh toán khác nếu cần -->
                </select>
            </div>
            <div id="qrcode" style="display: none;">
                <img src="upload/qrcode.jpg" alt="Bank Transfer Details" class="img-fluid">
            </div>
            <button type="submit" class="payment">Đặt hàng</button>
        </form>
    </div>
</div>
<script>
        function toggleBankTransferImage() {
            var paymentMethod = document.getElementById('payment-method').value;
            var bankTransferImage = document.getElementById('qrcode');
            if (paymentMethod === 'Chuyển khoản') {
                bankTransferImage.style.display = 'block';
            } else {
                bankTransferImage.style.display = 'none';
            }
        }
        function validateEmail() {
   const email = document.getElementById('email').value;
   const pattern = /\S+@\S+\.\S+/;
   if (!pattern.test(email)) {
      alert("Vui lòng nhập địa chỉ email hợp lệ ");
      return false;
   }
   return true;
}
    </script>
<?php
require_once("footer.php");
?>   
</body>
</html>
<?php
}
?>
