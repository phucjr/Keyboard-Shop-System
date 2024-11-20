<?php
// Kết nối tới cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'productdb');

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy ID đơn hàng từ URL
$order_id = $_GET['id'];

// Nếu form đã được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_status = $_POST['tinhtrangdon'];
    
    // Cập nhật tình trạng đơn hàng
    $sql = "UPDATE orders SET tinhtrangdon = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $new_status, $order_id);
    
    if ($stmt->execute()) {
        header("Location: orders.php");
        exit(); // Dừng script sau khi chuyển hướng
    } else {
        echo "Cập nhật thất bại: " . $conn->error;
    }
    
    $stmt->close();
}

// Truy vấn để lấy thông tin đơn hàng hiện tại
$sql = "SELECT * FROM orders WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();
$stmt->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa đơn hàng</title>
</head>
<body>

<h1>Chỉnh sửa tình trạng đơn hàng</h1>

<form method="post">
    <label for="tinhtrangdon">Tình trạng đơn hàng:</label>
    <select name="tinhtrangdon" id="tinhtrangdon">
        <option value="0" <?php if ($order['tinhtrangdon'] == 0) echo 'selected'; ?>>Đang xử lý</option>
        <option value="1" <?php if ($order['tinhtrangdon'] == 1) echo 'selected'; ?>>Đã giao hàng</option>
    </select>
    <br><br>
    <button type="submit">Cập nhật</button>
</form>

</body>
</html>
