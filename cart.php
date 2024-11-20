<?php
include 'session_start.php';
require_once ("CreateDb.php");
require_once ("component.php");

$db = new CreateDb("Productdb", "Producttb");
// Khởi tạo biến tổng tiền
$total = 0;

$discount_amount = 0; // Khởi tạo biến với giá trị mặc định

// Kiểm tra và áp dụng mã giảm giá nếu người dùng đã đăng nhập
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['apply_discount'])) {
    if (!isset($_SESSION['user_id'])) {
        // Nếu chưa đăng nhập, lưu mã giảm giá vào phiên và chuyển hướng đến trang đăng nhập
        $_SESSION['discount_code'] = $_POST['discount_code'];
        $_SESSION['redirect_to'] = 'cart.php'; // Lưu trang hiện tại để quay lại sau khi đăng nhập
        exit();
    }

    $discount_code = $_POST['discount_code'];
    $valid_discounts = [
        'Blessing10' => 100000,
        'Blessing20' => 200000,
    ];

    if (array_key_exists($discount_code, $valid_discounts)) {
        $discount_amount = $valid_discounts[$discount_code]; // Gán giá trị giảm giá
        $_SESSION['discount_amount'] = $discount_amount; // Lưu giảm giá vào phiên làm việc
        echo "<script>alert('Mã giảm giá hợp lệ! Đã giảm $discount_amount VND tổng giá.')</script>";
    } else {
        echo "<script>alert('Mã giảm giá không hợp lệ!')</script>";
    }
}




// Handle POST requests 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
    $quantity_action = isset($_POST['quantity_action']) ? $_POST['quantity_action'] : '';
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
    $discount_code = isset($_POST['discount_code']) ? $_POST['discount_code'] : 0;

   

    
    // Remove product from cart
    if ($action == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value["product_id"] == $product_id) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index array
                echo "<script>alert('Sản phẩm đã được xóa khỏi giỏ hàng!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
                break;
            }
        }
    }

  

   // Cập nhật số lượng sản phẩm trong giỏ hàng
if ($quantity_action) {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value["product_id"] == $product_id) {
            if ($quantity_action == 'increase') {
                $_SESSION['cart'][$key]['quantity']++;
            } elseif ($quantity_action == 'decrease') {
                if ($value['quantity'] > 1) { // Sử dụng $value['quantity'] thay vì $quantity
                    $_SESSION['cart'][$key]['quantity']--;
                } else {
                    // Xóa sản phẩm nếu số lượng là 1
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']); // Đánh chỉ số lại mảng
                    echo "<script>alert('Sản phẩm đã được xóa khỏi giỏ hàng!')</script>";
                    echo "<script>window.location = 'cart.php'</script>";
                }
            }
            echo "<script>window.location = 'cart.php'</script>";
            exit(); // Ngừng thực thi mã PHP sau khi chuyển hướng
        }
    }
}

}




?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giỏ Hàng</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="trangchu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    
    <script>
        function confirmPayment() {
            var result = confirm("Bạn có chắc chắn muốn thanh toán?");
            if (result) {
                window.location.href = "checkout_process.php";
            }
        }
    </script>
    
</head>
<body>

<?php
    require_once ('header.php');
?>

<div class="container-fluid">

        <div class="col">
            <div class="shopping-cart">
                <h6>Giỏ Hàng </h6>
                <hr>
                <div class="cart-item">
                <?php
                $total = 0;
                if (isset($_SESSION['cart'])) {
                    $product_id = array_column($_SESSION['cart'], 'product_id');
                    $result = $db->getData();
                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($product_id as $id) {
                            if ($row['id'] == $id) {
                                $quantity = isset($_SESSION['cart'][array_search($id, $product_id)]['quantity']) ? $_SESSION['cart'][array_search($id, $product_id)]['quantity'] : 1;
                                cartElement($row['product_image'], $row['product_name'], $row['product_price'], $row['id'], $quantity);
                                $total += (int)$row['product_price'] * $quantity;
                            }
                        }
                    }
                } else {
                    echo "<h5>Giỏ hàng rỗng</h5>";
                }
                ?>
                </div>
            </div>
        </div>
        <div class="Price">
    <h3>Chi Tiết Đơn Hàng</h3>
    <hr>
    <div class="price-details">
        <div class="price-row">
                <?php
                if (isset($_SESSION['cart'])) {
                    $count = array_sum(array_column($_SESSION['cart'], 'quantity'));
                    echo "<h6>Giá: " . number_format($count, 0, ",", ".") . " sản phẩm</h6>";
                } else {
                    echo "<h6>Giá: 0 sản phẩm</h6>";
                }
                ?>
            <h6>Phí Giao Hàng</h6>
            <hr>
            <h6>Tổng Tiền</h6>
        </div>
        <div class="price-row">
    <h6><?php echo number_format($total, 0, ",", "."); ?> VND</h6>
    <h6 class="shipping-fee">MIỄN PHÍ</h6>
    <hr>
    <h6><?php echo number_format($total-$discount_amount, 0, ",", "."); ?> VND</h6> <!-- Hiển thị tổng tiền không có giảm giá -->

    <form method="post" action="">
                    <input type="text" name="discount_code" class="voucher" placeholder="Nhập mã giảm" required>
                    <hr>
                    <button type="submit" name="apply_discount" class="apply">Áp dụng</button>
                </form>
    <button onclick="confirmPayment()" class="pay-now">Thanh toán</button> <!-- Nút thanh toán -->
</div>

    </div>
</div>

        

    </div>
    <?php
require_once("footer.php");
?>
</body>
</html>
