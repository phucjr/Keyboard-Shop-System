<?php
session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra cứu đơn hàng</title>
    <style>
        /* CSS cho form tra cứu đơn hàng */
        .form-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-content h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button.payment {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button.payment:hover {
            background-color: #0056b3;
        }

        /* CSS cho bảng kết quả tìm kiếm */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table thead {
            background-color: #f4f4f4;
        }

        table th {
            font-weight: bold;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .delete-btn {
            background-color: #ff4c4c;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #ff0000;
        }
    </style>
    <script>
        function confirmDelete(orderId, status) {
            if (status === 'Đã giao hàng' ) {
                alert('Không thể hủy đơn hàng đã giao.');
                return false;}
                else if ( status ==='Chờ giao hàng') {
                alert('Không thể hủy đơn hàng chờ giao.');
                return false;
            } else {
                if (confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?')) {
                    window.location.href = 'tracuu.php?delete=' + orderId;
                }
            }
        }
    
    </script>
</head>
<body>
<header><?php require_once("header.php"); ?></header>
<main>
<div class="form-container">
    <div class="form-content">
        <h2>Tra cứu đơn hàng</h2>
        <form action="tracuu.php" method="post">
            <div class="form-group">
                <label for="name">Họ tên</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="payment">Tra cứu</button>
        </form>
    </div>
</div>
<hr>
<?php
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
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Truy vấn tìm kiếm đơn hàng và chi tiết sản phẩm
    $sql = "SELECT o.id AS order_id, o.name AS order_name, o.phone, o.email, o.tinh, o.huyen, o.xa, o.diachi, o.payment_method, o.order_date, o.tinhtrangdon,
                   p.product_name, p.product_price
            FROM orders o
            JOIN order_items oi ON o.id = oi.order_id
            JOIN Producttb p ON oi.product_id = p.id
            WHERE o.name = ? AND o.phone = ? AND o.email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $phone, $email);
    $stmt->execute();
    $result = $stmt->get_result();

   // Mảng để lưu trữ thông tin đơn hàng
$orders = [];

if ($result->num_rows > 0) {
    echo "<h3>Kết quả tìm kiếm:</h3>";
    echo "<table border='1' cellpadding='10' cellspacing='0' style='width:100%; border-collapse: collapse;'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID Đơn hàng</th>";
    echo "<th>Họ tên</th>";
    echo "<th>Số điện thoại</th>";
    echo "<th>Email</th>";
    echo "<th>Tỉnh/Thành phố</th>";
    echo "<th>Huyện/Quận</th>";
    echo "<th>Xã/Phường</th>";
    echo "<th>Địa chỉ</th>";
    echo "<th>Phương thức thanh toán</th>";
    echo "<th>Tình trạng đơn hàng</th>";
    echo "<th>Tên Sản phẩm</th>";
    echo "<th>Tổng thanh toán</th>";
    echo "<th>Yêu Cầu</th>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $result->fetch_assoc()) {
        $order_id = $row['order_id'];

        // Kiểm tra xem đơn hàng đã có trong mảng hay chưa, nếu chưa thì thêm mới
        if (!isset($orders[$order_id])) {
            $orders[$order_id] = [
                'order_id' => $row['order_id'],
                'name' => $row['order_name'],
                'phone' => $row['phone'],
                'email' => $row['email'],
                'tinh' => $row['tinh'],
                'huyen' => $row['huyen'],
                'xa' => $row['xa'],
                'diachi' => $row['diachi'],
                'payment_method' => $row['payment_method'],
                'tinhtrangdon' => ($row["tinhtrangdon"] == 3) ? 'Đã giao hàng' : (($row["tinhtrangdon"] == 2) ? 'Chờ giao hàng' : (($row["tinhtrangdon"] == 1) ? 'Chờ lấy hàng' : 'Chờ xác thực')),
                'products' => []
            ];
        }

        // Thêm sản phẩm vào đơn hàng tương ứng
        $orders[$order_id]['products'][] = [
            'product_name' => $row['product_name'],
            'product_price' => $row['product_price']
        ];
    }

    // Hiển thị thông tin từng đơn hàng và các sản phẩm
    foreach ($orders as $order) {
        echo "<tr>";
        echo "<td>" . $order['order_id'] . "</td>";
        echo "<td>" . $order['name'] . "</td>";
        echo "<td>" . $order['phone'] . "</td>";
        echo "<td>" . $order['email'] . "</td>";
        echo "<td>" . $order['tinh'] . "</td>";
        echo "<td>" . $order['huyen'] . "</td>";
        echo "<td>" . $order['xa'] . "</td>";
        echo "<td>" . $order['diachi'] . "</td>";
        echo "<td>" . $order['payment_method'] . "</td>";
        echo "<td>" . $order['tinhtrangdon'] . "</td>";

        // Hiển thị danh sách sản phẩm của đơn hàng
        echo "<td>";
        foreach ($order['products'] as $product) {
            echo $product['product_name'] . "<hr>";
        }
        echo "</td>";

        // Hiển thị tổng thanh toán cho đơn hàng
        echo "<td>";
        $total_price = 0;
        foreach ($order['products'] as $product) {
            echo number_format($product['product_price'], 0, ",", ".") . " VND<hr>";
            $total_price += $product['product_price'];
        }
        echo "Tổng cộng: " . number_format($total_price, 0, ",", ".") . " VND";
        echo "</td>";

        echo "<td><button class='delete-btn' onclick='confirmDelete(" . $order['order_id'] . ", \"" . $order['tinhtrangdon'] . "\")'>Hủy Đơn</button></td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "Không tìm thấy đơn hàng nào.";
}


    $stmt->close();
}

// Xử lý khi có yêu cầu xóa
if (isset($_GET['delete'])) {
    $orderId = $_GET['delete'];

    // Kiểm tra tình trạng đơn hàng trước khi xóa
    $checkSql = "SELECT tinhtrangdon FROM orders WHERE id = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("i", $orderId);
    $stmt->execute();
    $stmt->bind_result($tinhtrangdon);
    $stmt->fetch();
    $stmt->close();

    if ($tinhtrangdon == 3) {
        echo "<p>Không thể hủy đơn hàng đã giao.</p>";
    } else {
        // Xóa đơn hàng khỏi cơ sở dữ liệu
        $deleteSql = "DELETE FROM orders WHERE id = ?";
       
        $stmt = $conn->prepare($deleteSql);
        $stmt->bind_param("i", $orderId);

        if ($stmt->execute()) {
            echo "<p>Đơn hàng đã được hủy thành công.</p>";
        } else {
            echo "<p>Lỗi: Không thể hủy đơn hàng. Vui lòng liên hệ với Shop.</p>";
        }
        $stmt->close();
    }
}

$conn->close();
?>
</main>
<footer><?php require_once("footer.php"); ?></footer>
</body>
</html>
