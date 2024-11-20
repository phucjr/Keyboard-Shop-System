<?php
include 'session_start.php';
include 'config.php'; // Kết nối cơ sở dữ liệu

require_once('CreateDb.php');

// Lấy ID người dùng từ session
$user_id = $_SESSION['user_id']; 

// Truy vấn cơ sở dữ liệu để lấy danh sách đơn hàng của người dùng
$query = "SELECT * FROM orders WHERE customerid = ?"; // Sử dụng customerid thay vì user_id

// Chuẩn bị câu lệnh
$stmt = $conn->prepare($query);
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

// Liên kết tham số
$stmt->bind_param("i", $user_id);

// Thực thi câu lệnh
$stmt->execute();

// Lấy kết quả
$result = $stmt->get_result();
if ($result === false) {
    die("Execute failed: " . $stmt->error);
}

// Hiển thị kết quả
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Order ID: " . $row['id'] . "<br>";
        echo "Name: " . $row['name'] . "<br>";
        echo "Phone: " . $row['phone'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "Address: " . $row['diachi'] . "<br>";
        echo "Payment Method: " . $row['payment_method'] . "<br>";
        echo "Order Date: " . $row['order_date'] . "<br><br>";
    }
} else {
    echo "No orders found.";
}

// Đóng câu lệnh và kết nối chỉ sau khi tất cả các công việc với câu lệnh đã hoàn thành


?>




<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra cứu đơn hàng</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>Tra cứu đơn hàng của bạn</h2>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Ngày Đặt Hàng</th>
                    <th>Trạng Thái</th>
                    <th>Chi Tiết</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($order = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['order_date']; ?></td>
                        <td><?php echo $order['status']; ?></td>
                        <td><a href="order_details.php?order_id=<?php echo $order['id']; ?>">Xem chi tiết</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Bạn chưa có đơn hàng nào.</p>
    <?php endif; ?>

    <?php
    $stmt->close();
    $conn->close();
    ?>
</body>
</html>
