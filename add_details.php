<?php
require_once ('CreateDb.php');
include 'config.php'; // Kết nối đến cơ sở dữ liệu

// Kiểm tra nếu form được gửi
if (isset($_POST['submit'])) {
    $productid = $_POST['productid'];
    $product_description = $_POST['product_description'];

    $db = new CreateDb();

    foreach ($_FILES['product_images']['name'] as $key => $name) {
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["product_images"]["name"][$key]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra xem tệp có phải là hình ảnh thật không
        $check = getimagesize($_FILES["product_images"]["tmp_name"][$key]);
        if ($check === false) {
            echo "Tệp " . $name . " không phải là hình ảnh.";
            $uploadOk = 0;
        }

        // Kiểm tra định dạng tệp
        if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
            echo "Chỉ các tệp JPG, JPEG, PNG & GIF được phép.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1 && move_uploaded_file($_FILES["product_images"]["tmp_name"][$key], $target_file)) {
            $query = "INSERT INTO image_library (productid, product_images, product_description) VALUES (?, ?, ?)";
            $stmt = $db->con->prepare($query);
            $stmt->bind_param("iss", $productid, $target_file, $product_description);

            if ($stmt->execute()) {
                echo "Tệp " . $name . " đã được tải lên thành công.";
            } else {
                echo "Lỗi khi thêm thông tin cho tệp " . $name . ": " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Tệp " . $name . " không được tải lên.";
        }
    }

    $db->con->close();

    // Chuyển hướng sau khi tải lên thành công (tùy chọn)
    header('Location: detail_manage.php');
    exit(); // Đảm bảo script dừng lại sau khi chuyển hướng
}


?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thêm Thông Tin Sản Phẩm</title>
        <style>
             .body{
        background-image: url('upload/background.jpg');

    }
   /* Đặt chung cho toàn bộ container */
.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
    background-color:beige;
}

/* Định dạng tiêu đề của form */
.container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

/* Định dạng nhãn của các input và textarea */
.container label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #444;
}

/* Định dạng input text và file */
.container input[type="text"],
.container input[type="file"],
.container textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 14px;
    margin-bottom: 15px;
}

/* Định dạng textarea */
.container textarea {
    resize: vertical; /* Cho phép thay đổi kích thước theo chiều dọc */
}

/* Định dạng nút submit */
.container input[type="submit"] {
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
    margin-top: 10px;
}

/* Hiệu ứng hover cho nút submit */
.container input[type="submit"]:hover {
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
        <form action="add_details.php" method="post" enctype="multipart/form-data">
            <h2>Thêm Thông Tin Sản Phẩm</h2>
            <label for="productid">ID Sản Phẩm:</label>
            <input type="text" id="productid" name="productid" required>

            <label for="product_image">Ảnh Sản Phẩm:</label>
            <!-- <input type="file" id="product_image" name="product_image" required> -->
            <input type="file" name="product_images[]" id="product_image" multiple>

            <label for="product_description">Mô Tả Sản Phẩm:</label>
            <textarea id="product_description" name="product_description" rows="5" required></textarea>

            <input type="submit" name="submit" value="Thêm">
        </form>
        </div>
        </div>
        <?php
 require_once("footer.php");

?>
    </body>
    </html>
