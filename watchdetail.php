<?php
require_once('CreateDb.php');
require_once('config.php'); // Kết nối đến cơ sở dữ liệu

// Kết nối đến cơ sở dữ liệu
$db = new CreateDb();

// Kiểm tra nếu đã nhận được `id` từ URL
if (isset($_GET['id'])) {
    $productid = $_GET['id'];

    // Xử lý cập nhật sản phẩm
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
        $new_description = $_POST['description'];
        $new_image = $_POST['image'];

        $query = "UPDATE image_library SET product_description = ?, product_images = ? WHERE productid = ?";
        $stmt = $db->con->prepare($query);
        $stmt->bind_param("ssi", $new_description, $new_image, $productid);

        if ($stmt->execute()) {
            // Chuyển hướng sau khi tải lên thành công
            header('Location: watchdetail.php?id=' . $productid);
            exit(); // Đảm bảo không có mã nào được thực thi sau khi chuyển hướng
        }
    }

    // Xử lý xóa sản phẩm
    if (isset($_GET['action']) && $_GET['action'] === 'delete') {
        $query = "DELETE FROM image_library WHERE productid = ?";
        $stmt = $db->con->prepare($query);
        $stmt->bind_param("i", $productid);

        if ($stmt->execute()) {
            echo "<div class='container'><p>Sản phẩm đã bị xóa.</p></div>";
            exit();
        }
    }

    // Truy vấn để lấy chi tiết sản phẩm
    $query = "SELECT * FROM image_library WHERE productid = ?";
    $stmt = $db->con->prepare($query);
    $stmt->bind_param("i", $productid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_image = $row['product_images'];
        $product_description = $row['product_description'];
        $product_id = $row['productid'];
    } else {
        echo "<div class='container'><p>Sản phẩm không tồn tại.</p></div>";
        exit();
    }

    $stmt->close();
    $db->con->close();
} else {
    echo "<div class='container'><p>ID sản phẩm không được cung cấp.</p></div>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.product-title {
    font-size: 32px;
    font-weight: 700;
    color: #222;
    margin-bottom: 30px;
    text-align: center;
}

.product-table {
    width: 100%;
    border-collapse: collapse;
}

.product-table th, .product-table td {
    padding: 15px;
    text-align: left;
    border: 1px solid #ddd;
}

.product-table th {
    background-color: #f0f0f0;
    font-weight: 600;
    color: #555;
}

.product-table td {
    background-color: #fff;
}

.product-image {
    width: 180px;
    height: auto;
    border-radius: 8px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
}

.button {
    display: inline-block;
    padding: 12px 24px;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    background-color: blue;
    text-align: center;
    border-radius: 5px;
    text-decoration: none;
    margin: 5px;
    transition: background-color 0.3s ease, transform 0.2s ease;
    cursor: pointer;
}
.button1 {
    display: inline-block;
    padding: 12px 24px;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    background-color: blueviolet;
    text-align: center;
    border-radius: 5px;
    text-decoration: none;
    margin: 5px;
    transition: background-color 0.3s ease, transform 0.2s ease;
    cursor: pointer;
}
.button2 {
    display: inline-block;
    padding: 12px 24px;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    background-color: red;
    text-align: center;
    border-radius: 5px;
    text-decoration: none;
    margin: 5px;
    transition: background-color 0.3s ease, transform 0.2s ease;
    cursor: pointer;
}



/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
    padding-top: 60px;
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    width: 60%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: #333;
    text-decoration: none;
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
}

textarea.form-control {
    resize: vertical;
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
    <?php require_once("header.php"); ?>
    <div class="trangchu">
    <a href="admin.php">Trang Chủ Admin</a>
</div>
    <div class="container">
        <h1 class="product-title">Chi tiết sản phẩm</h1>
        <table class="product-table">
            <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Mô tả sản phẩm</th>
                <th>Hành động</th>
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($product_id); ?></td>
                <td><img src="<?php echo htmlspecialchars($product_image); ?>" alt="Hình ảnh sản phẩm" class="product-image"></td>
                <td><?php echo htmlspecialchars($product_description); ?></td>
                <td>
                    <button class="button" id="editBtn">Sửa</button>
                    <a href="watchdetail.php?id=<?php echo $product_id; ?>&action=delete" class="button1" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');">Xóa</a>
                    <a href="add_details.php" class="button2">Thêm</a>
                </td>
            </tr>
        </table>

        <!-- Modal chỉnh sửa sản phẩm -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Chỉnh sửa sản phẩm</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="description">Mô tả sản phẩm:</label>
                        <textarea id="description" name="description" rows="4" class="form-control"><?php echo htmlspecialchars($product_description); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">URL Hình ảnh sản phẩm:</label>
                        <input type="text" id="image" name="image" value="<?php echo htmlspecialchars($product_image); ?>" class="form-control">
                    </div>
                    <button type="submit" name="update" class="button">Cập nhật sản phẩm</button>
                </form>
            </div>
        </div>
    </div>

    <?php require_once("footer.php"); ?>

    <script>
        var modal = document.getElementById('editModal');
        var btn = document.getElementById('editBtn');
        var span = document.getElementsByClassName('close')[0];

        btn.onclick = function() {
            modal.style.display = 'block';
        }

        span.onclick = function() {
            modal.style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>
