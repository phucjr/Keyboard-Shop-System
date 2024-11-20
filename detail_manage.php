<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Chi Tiết Hình Ảnh Sản Phẩm</title>
   <style>
    /* Đặt kiểu chung cho toàn bộ trang */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9; /* Màu nền sáng hơn */
}

/* Định dạng tiêu đề trang */
.container h1 {
    margin: 20px 0;
    text-align: center;
    font-size: 28px;
    color: #333;
    border-bottom: 2px solid #007bff;
    padding-bottom: 10px;
}

/* Định dạng bảng */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px auto;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: left;
    font-size: 16px;
}

th {
    background-color: #007bff; /* Nền xanh dương */
    color: #fff; /* Chữ trắng */
}

td img {
    border-radius: 5px;
}

a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}

.delete-btn {
    color: red;
}

.delete-btn:hover {
    text-decoration: underline;
}

/* Định dạng liên kết trở về trang chủ */
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
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #ddd;
    width: 80%;
    max-width: 600px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.modal-content h2 {
    margin-top: 0;
    color: #333;
}

.modal-content label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #333;
}

.modal-content input[type="text"],
.modal-content input[type="file"],
.modal-content textarea {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

textarea {
    height: 100px;
}

.modal-content input[type="submit"] {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.modal-content input[type="submit"]:hover {
    background-color: #0056b3;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

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

   </style>
</head>
<body>
    <?php include 'header.php'; ?>
<div class="trangchu">
    <a href="admin.php">Trang Chủ Admin</a>
</div>
    <div class="container">
        <h1>Danh sách chi tiết sản phẩm</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Sản Phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php';

                $sql = "SELECT * FROM image_library";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['productid'] . "</td>";
                        echo "<td><img src='" . $row['product_images'] . "' alt='Image' width='100'></td>";
                        echo "<td>" . $row['product_description'] . "</td>";
                        echo "<td>
                                <a href='#' class='edit-btn' data-id='" . $row['id'] . "' data-productid='" . $row['productid'] . "' data-image='" . htmlspecialchars($row['product_images'], ENT_QUOTES, 'UTF-8') . "' data-description='" . htmlspecialchars($row['product_description'], ENT_QUOTES, 'UTF-8') . "'>Sửa</a> |
                                <a href='detail_manage.php?delete_id=" . $row['id'] . "' class='delete-btn'>Xóa</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal chỉnh sửa hình ảnh sản phẩm -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Chỉnh sửa hình ảnh sản phẩm</h2>
            <form id="editForm" method="POST" action="detail_manage.php" enctype="multipart/form-data">
                <input type="hidden" id="imageId" name="id">
                <label for="productId">ID Sản phẩm:</label>
                <input type="text" id="productId" name="productid" readonly>
                <label for="productImage">Hình ảnh:</label>
                <input type="file" id="productImage" name="product_images">
                < <label for="productDescription">Mô tả:</label>
                <textarea id="productDescription" name="product_description" rows="5" required></textarea>
                <input type="submit" value="Cập nhật">
            </form>
        </div>
    </div>

    <script>
        // Hiển thị và ẩn modal
        var modal = document.getElementById("editModal");
        var btns = document.querySelectorAll(".edit-btn");
        var span = document.getElementsByClassName("close")[0];
        var form = document.getElementById("editForm");

        btns.forEach(function(btn) {
            btn.onclick = function() {
                var id = this.getAttribute('data-id');
                var productId = this.getAttribute('data-productid');
                var image = this.getAttribute('data-image');
                var description = this.getAttribute('data-description');
                document.getElementById("imageId").value = id;
                document.getElementById("productId").value = productId;
                document.getElementById("productDescription").value = description;
                modal.style.display = "block";
            }
        });

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Xử lý gửi form chỉnh sửa
        form.onsubmit = function(e) {
            e.preventDefault(); // Ngăn chặn gửi form mặc định
            var id = document.getElementById("imageId").value;
            var productId = document.getElementById("productId").value;
            var description = document.getElementById("productDescription").value;
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "detail_manage.php", true);
            xhr.onload = function() {
                if (xhr.status == 200) {
                    alert("Cập nhật hình ảnh sản phẩm thành công!");
                    location.reload();
                } else {
                    alert("Lỗi khi cập nhật hình ảnh sản phẩm.");
                }
            };
            xhr.send(formData);
        }
    </script>

    <?php
    // Xử lý yêu cầu xóa hình ảnh
    if (isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];

        $sql = "DELETE FROM image_library WHERE id=$delete_id";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Xóa hình ảnh sản phẩm thành công!'); window.location.href='detail_manage.php';</script>";
        } else {
            echo "<script>alert('Lỗi khi xóa hình ảnh sản phẩm: " . $conn->error . "'); window.location.href='detail_manage.php';</script>";
        }
    }

    // Cập nhật hình ảnh sản phẩm nếu nhận được yêu cầu từ POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
        $id = $_POST['id'];
        $productid = $_POST['productid'];
        $description = $_POST['product_description'];

        // Xử lý upload hình ảnh
        if (!empty($_FILES['product_images']['name'])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["product_images"]["name"]);
            move_uploaded_file($_FILES["product_images"]["tmp_name"], $target_file);
            $image = $target_file;
        } else {
            // Nếu không có hình ảnh mới, giữ nguyên hình ảnh cũ
            $sql = "SELECT product_images FROM image_library WHERE id=$id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $image = $row['product_images'];
        }

        // Cập nhật thông tin trong cơ sở dữ liệu
        $sql = "UPDATE image_library SET product_images='$image', product_description='$description' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Cập nhật hình ảnh sản phẩm thành công!'); window.location.href='detail_manage.php';</script>";
        } else {
            echo "<script>alert('Lỗi khi cập nhật hình ảnh sản phẩm: " . $conn->error . "'); window.location.href='detail_manage.php';</script>";
        }
    }
    ?>

</body>
</html>
