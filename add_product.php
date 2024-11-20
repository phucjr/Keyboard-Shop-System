<?php
include 'session_start.php';
include 'config.php'; // Kết nối đến cơ sở dữ liệu

// Kiểm tra nếu người dùng không phải là admin thì chuyển hướng về trang chủ
if ($_SESSION['user_type'] != 'admin') {
    header('Location: index.php');
    exit;
}

// Xử lý khi form được gửi đi
if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($product_image);

    // Kiểm tra nếu ảnh đã được tải lên thành công
    if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file)) {
        // Chuẩn bị câu truy vấn để thêm sản phẩm vào cơ sở dữ liệu sản phẩm
        $query = "INSERT INTO Producttb (product_name, product_price, product_image) VALUES (?, ?, ?)";
        $stmt = $product_db_conn->prepare($query);

        if ($stmt === false) {
            die("Lỗi chuẩn bị câu lệnh: " . $product_db_conn->error);
        }

        $stmt->bind_param("sds", $product_name, $product_price, $target_file);

        if ($stmt->execute()) {
            header('Location: product_manage.php');
            exit;

        } else {
            echo "Lỗi: " . $stmt->error;
        }

        // Đóng câu truy vấn
        $stmt->close();
    } else {
        echo "Lỗi khi tải ảnh lên.";
    }
}
?>



<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <style> 
    .body{
        background-image: url('upload/background.jpg');

    }
        /* Đặt chung cho toàn bộ container */
.container {
    max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    background-color: beige;
}

/* Định dạng tiêu đề của form */
.container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

/* Định dạng từng nhóm form */
.form-group {
    margin-bottom: 15px;
}

/* Định dạng nhãn của các input */
.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

/* Định dạng input text và number */
.form-group input[type="text"],
.form-group input[type="number"],
.form-group input[type="file"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 14px;
}

/* Định dạng nút submit */
.btn-submit {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-submit:hover {
    background-color: #218838;
}

    </style>
</head>
<body>
<?php
 require_once("header.php");

?>
<div class="body">
    <div class="container">
        <h2>Thêm sản phẩm mới</h2>
        <form action="add_product.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Tên sản phẩm:</label>
                <input type="text" class="form-control" name="product_name" required
                    data-toggle="popover" data-placement="top" data-content="Nhập tên sản phẩm ở đây.">
            </div>

            <div class="form-group">
                <label for="product_price">Giá sản phẩm:</label>
                <input type="number" class="form-control" step="0.01" name="product_price" required
                    data-toggle="popover" data-placement="top" data-content="Nhập giá sản phẩm ở đây.">
            </div>

            <div class="form-group">
                <label for="product_image">Hình ảnh sản phẩm:</label>
                <input type="file" class="form-control" name="product_image" accept="image/*" required
                    data-toggle="popover" data-placement="top" data-content="Chọn hình ảnh của sản phẩm.">
            </div>

            <button type="submit" name="submit" class="btn-submit">Thêm sản phẩm</button>
        </form>
    </div>
    </div>
    <?php
 require_once("footer.php");

?>

  
</body>
</html>



