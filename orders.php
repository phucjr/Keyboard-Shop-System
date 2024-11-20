<?php
// Kết nối tới cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'productdb');

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn để lấy toàn bộ dữ liệu từ bảng orders cùng với sản phẩm
$sql = "SELECT o.id AS order_id, o.name AS order_name, o.phone, o.email, o.tinh, o.huyen, o.xa, o.diachi, o.payment_method, o.order_date, o.tinhtrangdon,
               p.product_name, p.product_price
        FROM orders o
        JOIN order_items oi ON o.id = oi.order_id
        JOIN Producttb p ON oi.product_id = p.id";
$result = $conn->query($sql);

// Xử lý khi có yêu cầu xóa
if (isset($_GET['delete'])) {
    $orderId = (int) $_GET['delete'];  // Chuyển đổi về kiểu số nguyên để bảo mật

    // Kiểm tra tình trạng đơn hàng trước khi xóa
    $checkSql = "SELECT tinhtrangdon FROM orders WHERE id = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("i", $orderId);
    $stmt->execute();
    $stmt->bind_result($tinhtrangdon);
    $stmt->fetch();
    $stmt->close();

    if ($tinhtrangdon == 3) {
        echo "<p>Không thể xóa hàng đã giao.</p>";
    } else {
        // Xóa đơn hàng khỏi cơ sở dữ liệu
        $deleteSql = "DELETE FROM orders WHERE id = ?";
        $stmt = $conn->prepare($deleteSql);
        $stmt->bind_param("i", $orderId);

        if ($stmt->execute()) {
            echo "<p>Đơn hàng đã được xóa thành công.</p>";
        } else {
            echo "<p>Lỗi: Không thể hủy đơn hàng. Vui lòng liên hệ với Shop.</p>";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
    <style>
        h1{
            text-align: center;
            margin-bottom: 20px;
            margin-top: 50px;

        }
        /* CSS cho Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            transition: opacity 0.3s ease;
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border-radius: 8px;
            width: 40%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 24px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* Đặt chung cho toàn bộ bảng */
        .table-orders {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
        }

        /* Định dạng tiêu đề của bảng */
        .table-orders th {
            background-color: #007bff;
            color: black;
            padding: 12px;
            border-bottom: 2px solid #0056b3;
        }

        /* Định dạng các ô trong bảng */
        .table-orders td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        /* Định dạng dòng chẵn và lẻ để tạo sự phân biệt */
        .table-orders tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table-orders tr:nth-child(odd) {
            background-color: #fff;
        }

        /* Định dạng nút chỉnh sửa */
        .edit-btn{
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
         .delete-btn {
            padding: 8px 12px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .edit-btn:hover, .delete-btn:hover {
            background-color: #0056b3;
        }

        .trangchu {
            text-align: center;
            margin: 20px;
        }

        .trangchu a {
            display: inline-block;
            padding: 12px 24px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .trangchu a:hover {
            background-color: #0056b3;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
<?php require_once("header.php"); ?>
<div class="trangchu">
    <a href="admin.php">Trang Chủ Admin</a>
</div>
<h1>Danh sách đơn hàng</h1>

<table class="table-orders" border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Tỉnh</th>
        <th>Huyện</th>
        <th>Xã</th>
        <th>Địa chỉ</th>
        <th>Phương thức thanh toán</th>
        <th>Ngày đặt hàng</th>
        <th>Tình trạng đơn hàng</th>
        <th>Sản phẩm</th> <!-- Giữ nguyên cột sản phẩm để hiển thị tên sản phẩm -->
        <th>Tổng thanh toán</th> <!-- Thay đổi nội dung hiển thị trong cột này -->
        <th>Chỉnh sửa</th>
        <th>Xóa</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        $orders = [];
        while ($row = $result->fetch_assoc()) {
            $order_id = $row['order_id'];
            
            if (!isset($orders[$order_id])) {
                $orders[$order_id] = [
                    'order_id' => $order_id,
                    'name' => $row['order_name'],
                    'phone' => $row['phone'],
                    'email' => $row['email'],
                    'tinh' => $row['tinh'],
                    'huyen' => $row['huyen'],
                    'xa' => $row['xa'],
                    'diachi' => $row['diachi'],
                    'payment_method' => $row['payment_method'],
                    'order_date' => $row['order_date'],
                    'tinhtrangdon' => $row['tinhtrangdon'],
                    'products' => [],
                    'total_price' => 0
                ];
            }
    
            $orders[$order_id]['products'][] = [
                'product_name' => $row['product_name'],
                'product_price' => $row['product_price']
            ];
            
            $orders[$order_id]['total_price'] += $row['product_price'];
        }

        foreach ($orders as $order) {
            echo '<tr>
                    <td>' . $order['order_id'] . '</td>
                    <td>' . $order['name'] . '</td>
                    <td>' . $order['phone'] . '</td>
                    <td>' . $order['email'] . '</td>
                    <td>' . $order['tinh'] . '</td>
                    <td>' . $order['huyen'] . '</td>
                    <td>' . $order['xa'] . '</td>
                    <td>' . $order['diachi'] . '</td>
                    <td>' . $order['payment_method'] . '</td>
                    <td>' . $order['order_date'] . '</td>
                    <td>' . (
                        $order['tinhtrangdon'] == 3 ? 'Đã giao hàng' :
                        ($order['tinhtrangdon'] == 2 ? 'Chờ giao hàng' :
                        ($order['tinhtrangdon'] == 1 ? 'Chờ lấy hàng' : 'Chờ xác thực'))
                    ) . '</td>
                    <td>';
                    
            foreach ($order['products'] as $product) {
                echo $product['product_name'] . '<hr>';
            }
                    
            echo '</td>
                    <td>';
            
            // Hiển thị từng sản phẩm và giá
            foreach ($order['products'] as $product) {
                echo    number_format($product['product_price'], 0, ",", ".") . ' VND<hr>';
            }
            
            // Hiển thị tổng thanh toán bên dưới từng sản phẩm
            echo '<b>Tổng:</b> ' . number_format($order['total_price'], 0, ",", ".") . ' VND</td>
                    <td>
                        <button class="edit-btn" onclick="openEditModal(' . $order['order_id'] . ', ' . $order['tinhtrangdon'] . ')">Chỉnh sửa</button>
                    </td>
                    <td>
                        <button class="delete-btn" onclick="confirmDelete(' . $order['order_id'] . ', \'' . $order['tinhtrangdon'] . '\')">Xóa</button>
                    </td>
                </tr>';
        }
    } else {
        echo '<tr><td colspan="15">Không có đơn hàng nào.</td></tr>';
    }
    ?>
</table>



<!-- Modal chỉnh sửa -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Chỉnh sửa tình trạng đơn hàng</h2>
        <form id="editForm" method="post" action="update_order_status.php">
            <input type="hidden" id="orderId" name="orderId">
            <label for="tinhtrangdon">Tình trạng đơn hàng:</label>
            <select name="tinhtrangdon" id="tinhtrangdon">
                <option value="0">Chờ xác thực</option>
                <option value="1">Chờ lấy hàng</option>
                <option value="2">Chờ giao hàng</option>
                <option value="3">Đã giao hàng</option>
            </select>
            <br><br>
            <button type="submit">Cập nhật</button>
        </form>
    </div>
</div>

<script>
    // Mở modal chỉnh sửa
    function openEditModal(orderId, tinhtrangdon) {
        document.getElementById('orderId').value = orderId;
        document.getElementById('tinhtrangdon').value = tinhtrangdon;
        document.getElementById('editModal').style.display = 'block';
    }

    // Đóng modal khi nhấn vào dấu x
    document.querySelector('.close').onclick = function() {
        document.getElementById('editModal').style.display = 'none';
    }

    // Đóng modal khi nhấn ra ngoài modal
    window.onclick = function(event) {
        if (event.target == document.getElementById('editModal')) {
            document.getElementById('editModal').style.display = 'none';
        }
    }

    // Xác nhận xóa
    function confirmDelete(orderId, tinhtrangdon) {
        if (tinhtrangdon == 3) {
            alert("Không thể xóa hàng đã giao.");
            return;
        }
        if (confirm("Bạn có chắc chắn muốn xóa đơn hàng này?")) {
            window.location.href = "?delete=" + orderId;
        }
    }
</script>
</body>
</html>
