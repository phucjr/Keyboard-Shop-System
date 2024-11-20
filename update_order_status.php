<?php
// Kết nối tới cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'productdb');

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$orderId = $_POST['orderId'];
$tinhtrangdon = $_POST['tinhtrangdon'];

// Cập nhật tình trạng đơn hàng
$sql = "UPDATE orders SET tinhtrangdon = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $tinhtrangdon, $orderId);

if ($stmt->execute()) {
    echo "Cập nhật thành công";
} else {
    echo "Lỗi: " . $stmt->error;
}

$stmt->close();
$conn->close();

// Chuyển hướng về trang đơn hàng
header('Location: orders.php');
exit();
?>
