<?php
include 'session_start.php';
include 'config.php'; // Kết nối đến cơ sở dữ liệu

// Xóa sản phẩm nếu nhận được yêu cầu từ GET
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    // Xóa bản ghi liên quan trong image_library trước
    $sql_image = "DELETE FROM image_library WHERE productid=$id";
    if ($conn->query($sql_image) === TRUE) {
        // Sau đó xóa sản phẩm trong Producttb
        $sql_product = "DELETE FROM Producttb WHERE id=$id";
        if ($conn->query($sql_product) === TRUE) {
            // Chuyển hướng lại trang danh sách sản phẩm với thông báo thành công
            header("Location: product_manage.php?success=1");
            exit();
        } else {
            echo "Lỗi khi xóa sản phẩm: " . $conn->error;
        }
    } else {
        echo "Lỗi khi xóa ảnh liên quan: " . $conn->error;
    }
}

// Cập nhật sản phẩm nếu nhận được yêu cầu từ POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    // Cập nhật dữ liệu vào cơ sở dữ liệu
    $sql = "UPDATE Producttb SET product_name='$product_name', product_price='$product_price', product_image='$product_image' WHERE id=$id";
    
    $message = '';

if ($conn->query($sql) === TRUE) {
    $message = "Cập nhật sản phẩm thành công!";
} else {
    $message = "Lỗi khi cập nhật sản phẩm: " . $conn->error;
}

// Truyền thông báo vào JavaScript
echo "<script type='text/javascript'>
        var message = '". addslashes($message) ."';
      </script>";
}

// Lấy danh sách sản phẩm từ CSDL
$sql = "SELECT * FROM Producttb";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
  <style> 
    /* Container chính */
.container {
    width: 90%;
    margin: 0 auto;
    padding: 20px;
}

/* Tiêu đề */
.container h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

/* Định dạng bảng */
.container table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.container table th, .container table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

/* Định dạng tiêu đề của bảng */
.container table th {
    background-color: #f2f2f2;
    font-weight: bold;
    color: #333;
    text-align: center;
}

/* Định dạng các ô dữ liệu */
.container table td {
    background-color: #fff;
}

/* Định dạng hình ảnh trong bảng */
.container table img {
    border-radius: 5px;
}

/* Định dạng nút chỉnh sửa và xóa */
.edit-btn, .delete-btn {
    color: #007bff;
    text-decoration: none;
    cursor: pointer;
    margin-right: 10px;
    transition: color 0.3s ease;
}

.edit-btn:hover, .delete-btn:hover {
    color: #0056b3;
}

/* Định dạng modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: #fff;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    border-radius: 10px;
}

.modal-content h2 {
    margin-top: 0;
}

.modal-content label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

.modal-content input[type="text"],
.modal-content input[type="number"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.modal-content input[type="submit"] {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.modal-content input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Nút đóng modal */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
.container h1{
    color:red;
}

/* Overlay cho modal */
#resultModal.modal {
    display: none; /* Ẩn modal mặc định */
    position: fixed;
    z-index: 1000; /* Hiển thị modal phía trên các nội dung khác */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.6); /* Nền mờ */
}

/* Nội dung modal */
#resultModal .modal-content {
    background-color: #ffffff; /* Màu nền trắng cho modal */
    margin: 10% auto; /* Canh giữa theo chiều dọc */
    padding: 20px;
    border-radius: 8px; /* Bo tròn góc */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Hiệu ứng đổ bóng */
    width: 80%;
    max-width: 400px; /* Giới hạn chiều rộng tối đa */
    text-align: center; /* Căn giữa nội dung */
    animation: fadeIn 0.3s ease-out; /* Hiệu ứng mờ dần khi modal xuất hiện */
}

/* Hiệu ứng mờ dần */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

/* Nút đóng modal */
#resultModal .close {
    color: #999;
    float: right;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
    margin-top: -10px;
}

#resultModal .close:hover,
#resultModal .close:focus {
    color: #555; /* Màu đậm hơn khi hover hoặc focus */
    text-decoration: none;
}

/* Thông báo trong modal */
#resultModal #resultMessage {
    font-size: 18px;
    color: #333; /* Màu chữ */
    margin: 20px 0;
}

/* Nút "Quay lại danh sách sản phẩm" */
#resultModal a {
    display: inline-block;
    background-color: #007bff; /* Màu xanh tương tự Bootstrap */
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}

#resultModal a:hover {
    background-color: #0056b3; /* Màu xanh đậm hơn khi hover */
}
.trangchu {
    text-align: center;
    margin: 20px;
}

.trangchu a {
    display: inline-block;
    padding: 10px 20px;
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
<?php
 require_once("header.php");

?>
<div class="trangchu">
    <a href="admin.php">Trang Chủ Admin</a>
</div>
    <div class="container">
        <h1>Danh sách sản phẩm</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Định dạng giá sản phẩm với 2 chữ số thập phân
                        $formatted_price = number_format($row['product_price']);
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['product_name'] . "</td>";
                        echo "<td>" . $formatted_price . " VNĐ</td>";
                        echo "<td><img src='" . $row['product_image'] . "' alt='Product Image' width='100'></td>";
                        // Cột hành động với nút xóa và chỉnh sửa
                        echo "<td>
                            <a href='#' class='edit-btn' onclick='openModal(" . $row['id'] . ", \"" . addslashes($row['product_name']) . "\", " . $row['product_price'] . ", \"" . addslashes($row['product_image']) . "\")'>Chỉnh sửa</a> <hr>
                            <a href='product_manage.php?delete_id=" . $row['id'] . "' class='delete-btn' onclick='return confirm(\"Bạn có chắc chắn muốn xóa sản phẩm này không?\");'>Xóa</a> <hr> 
                            <a href='add_details.php'>Thêm Chi Tiết</a> <hr> 
    <a href='watchdetail.php?id=" . $row['id'] . "'>Xem Chi Tiết</a>

                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Không có sản phẩm nào</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Modal Chỉnh sửa -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Chỉnh sửa sản phẩm</h2>
                <form id="editForm" action="product_manage.php" method="POST">
                    <input type="hidden" name="id" id="product_id">
                    <label for="product_name">Tên sản phẩm:</label>
                    <input type="text" id="product_name" name="product_name" required>
                    
                    <label for="product_price">Giá:</label>
                    <input type="number" id="product_price" name="product_price" step="0.01" required>
                    
                    <label for="product_image">Ảnh:</label>
                    <input type="text" id="product_image" name="product_image" required>
                    
                    <input type="submit" value="Cập nhật">
                </form>
            </div>
        </div>
   </div> 

    <script>
        // Kiểm tra nếu có message từ PHP
if (typeof message !== 'undefined' && message !== '') {
    // Tạo một modal mới nếu không tồn tại
    var resultModal = document.getElementById('resultModal');
    if (!resultModal) {
        resultModal = document.createElement('div');
        resultModal.id = 'resultModal';
        resultModal.className = 'modal';
        resultModal.innerHTML = `
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <p id="resultMessage"></p>
                <a href="product_manage.php">Quay lại danh sách sản phẩm</a>
            </div>
        `;
        document.body.appendChild(resultModal);
    }

    // Cập nhật thông báo
    document.getElementById('resultMessage').innerText = message;

    // Hiển thị modal
    resultModal.style.display = 'block';
}

// Đóng modal
function closeModal() {
    document.getElementById('resultModal').style.display = 'none';
}

        // Mở modal với dữ liệu của sản phẩm
        function openModal(id, name, price, image) {
            document.getElementById('product_id').value = id;
            document.getElementById('product_name').value = name;
            document.getElementById('product_price').value = price;
            document.getElementById('product_image').value = image;

            var modal = document.getElementById('myModal');
            modal.style.display = "block";
        }

        // Đóng modal
        function closeModal() {
            var modal = document.getElementById('myModal');
            modal.style.display = "none";
        }

        // Đóng modal khi nhấp ra ngoài modal
        window.onclick = function(event) {
            var modal = document.getElementById('myModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <?php
 require_once("footer.php");

?>
</body>
</html>

<?php
$conn->close();
?>
