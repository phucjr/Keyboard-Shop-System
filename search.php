
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Blessing Keyboard</title>
    
    <style>
        

        .container {
            padding-top:5%;
            padding-bottom:5%;
        }
    </style>
</head>
<body>

<?php require_once ("header.php"); ?>
<?php
include 'session_start.php';
require_once ('CreateDb.php');
require_once ('component.php');

// Tạo đối tượng của lớp CreateDb
$database = new CreateDb("Productdb", "Producttb");
// Tạo đối tượng CreateDb

// Kiểm tra nếu có từ khóa tìm kiếm
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    
    // Gọi hàm tìm kiếm và hiển thị kết quả
    searchProductByName($searchQuery, $database);
} else {
    // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm hoặc thông báo
    echo "<p>Vui lòng nhập tên sản phẩm để tìm kiếm.</p>";
}

// Kiểm tra nếu nút 'add' được bấm
if (isset($_POST['add'])){
    // Kiểm tra nếu giỏ hàng đã tồn tại trong phiên làm việc
    if(isset($_SESSION['cart'])){

        // Lấy tất cả các ID sản phẩm hiện tại trong giỏ hàng
        $item_array_id = array_column($_SESSION['cart'], "product_id");

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        if(in_array($_POST['product_id'], $item_array_id)){
            // Hiển thị thông báo và chuyển hướng về trang chính
            echo "<script>alert('Sản phẩm đã được thêm vào giỏ hàng..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm mới vào giỏ hàng
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            // Thêm sản phẩm vào giỏ hàng
            $_SESSION['cart'][$count] = $item_array;
        }

    }else{
        // Nếu giỏ hàng chưa tồn tại, tạo mới giỏ hàng với sản phẩm đầu tiên
        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Tạo biến phiên làm việc mới cho giỏ hàng
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}

?>

<?php
require_once("footer.php");
?>

</body>
</html>