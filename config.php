<?php
$conn = mysqli_connect('localhost', 'root', '', 'productdb') or die('connection failed');
?>
<?php

$user_db_conn = new mysqli('localhost', 'root', '', 'productdb');
if ($user_db_conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu người dùng không thành công: " . $user_db_conn->connect_error);
}

// Kết nối đến cơ sở dữ liệu chứa bảng sản phẩm
$product_db_conn = new mysqli('localhost', 'root', '', 'productdb');
if ($product_db_conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu sản phẩm không thành công: " . $product_db_conn->connect_error);
}
function layChiTietTin($id = 0)
{
    try {
        $sql = "SELECT TieuDe, TomTat, Ngay, SoLanXem, Content, urlHinh FROM tin WHERE idTin=$id AND AnHien=1";
        global $conn;
        $kq = $conn->query($sql);
        return $kq->fetch_assoc();
    } catch (Exception $e) {
        die("Lỗi trong hàm: " . __FUNCTION__ . ":" . $e->getMessage());
    }
}

function tangSoLanXem($id = 0)
{
    global $conn; // Kết nối MySQLi đã được tạo trước đó    

    // Kiểm tra nếu $id là một số nguyên hợp lệ
    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        die("ID không hợp lệ");
    }

    // Tạo câu lệnh SQL
    $sql = "UPDATE tin SET SoLanXem = SoLanXem + 1 WHERE idTin = $id";

    // Thực thi câu lệnh SQL và xử lý lỗi
    if ($conn->query($sql) === FALSE) {
        die("Lỗi trong " . __FUNCTION__ . ": " . $conn->error);
    }
}

// ?>
