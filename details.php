<?php
include 'session_start.php';
require_once ('CreateDb.php');
require_once ('component.php');

// Tạo đối tượng của lớp CreateDb
$database = new CreateDb("Productdb", "Producttb");

// Kiểm tra nếu nút 'add' được bấm
if (isset($_POST['add'])) {
    if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Sản phẩm đã được thêm vào giỏ hàng..!')</script>";
            echo "<script>window.location = 'details.php?product_id=".$_POST['product_id']."'</script>";
        }else{
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );
            $_SESSION['cart'][$count] = $item_array;
            echo "<script>window.location = 'details.php?product_id=".$_POST['product_id']."'</script>";
        }
    }else{
        $item_array = array(
                'product_id' => $_POST['product_id']
        );
        $_SESSION['cart'][0] = $item_array;
        echo "<script>window.location = 'details.php?product_id=".$_POST['product_id']."'</script>";
    }
}

function productDetails($productid) {
    $db = new CreateDb();

    // Truy vấn thông tin sản phẩm
    $productQuery = "SELECT * FROM Producttb WHERE id = ?";
    $stmt = $db->con->prepare($productQuery);
    $stmt->bind_param("i", $productid);
    $stmt->execute();
    $productResult = $stmt->get_result();
    $product = $productResult->fetch_assoc();

    // Truy vấn hình ảnh và chi tiết sản phẩm
    $imageQuery = "SELECT product_images, product_description FROM image_library WHERE productid = ?";
    $stmt = $db->con->prepare($imageQuery);
    $stmt->bind_param("i", $productid);
    $stmt->execute();
    $imageResult = $stmt->get_result();

    // Hiển thị thông tin chi tiết sản phẩm
    $element = '
    <div id="product-detail">
        <div id="product-img">
            <div class="slideshow-container">';

    $productdescription = "Chi tiết sản phẩm không có sẵn."; // Default description
    while ($image = $imageResult->fetch_assoc()) {
        $element .= '
            <div class="mySlides fade">
                <img src="' . htmlspecialchars($image['product_images']) . '" alt="Product Image" class="product-img">
            </div>';
        // Cập nhật product_description
        if (!empty($image['product_description'])) {
            $productdescription = nl2br(htmlspecialchars($image['product_description']));
        }
    }

    $element .= '
             <a class="prev slide-control" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next slide-control" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </div>
    <div id="product-info">
        <h2>' . htmlspecialchars($product['product_name']) . '</h2>
        <p class="price">' . number_format($product['product_price'], 0, ",", ".") . ' VND</p>
        <p class="description">' . $productdescription . '</p>
        <form action="details.php" method="post">
            <input type="hidden" name="product_id" value="' . htmlspecialchars($product['id']) . '">
            <button type="submit" name="add" class="add-to-cart">Thêm vào giỏ hàng</button>
        </form>
    </div>
</div>';

    echo $element;

    // Đóng kết nối
    $stmt->close();
    $db->con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="trangchu.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            padding: 15px;
            background-color: aqua;
            border-bottom: 1px solid #ddd;
            border-style: ridge;
        }

        .description {
            margin-top: 20px;
            padding: 15px;
            background-color: bisque;
            border-style: groove;
            border-width: 2px;
            border-color: #000;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            font-size: 18px;
            color: #000;
            line-height: 1.5;
        }

        #product-detail {
            display: flex;
            flex-direction: row;
            gap: 20px;
            padding: 15px 0;
            border-top: 1px solid #000;
        }

        #product-img {
            flex: 1;
            width: 30%;
            text-align: center;
        }

        .slideshow-container {
            position: relative;
            max-width: 100%;
            margin: auto;
        }

        .mySlides {
            display: none;
        }

        .product-img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

     /* Đặt kiểu chung cho các nút điều khiển slideshow */
.slide-control {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    color: #000;
    font-weight: bold;
    font-size: 30px;
    border-radius: 0 3px 3px 0;
    user-select: none;
    background-color: rgba(0, 0, 0, 0.5);
    transform: translateY(-50%);
}

/* Kiểu cho nút 'prev' */
.prev {
    left: 0;
    border-radius: 3px 0 0 3px;
}

/* Kiểu cho nút 'next' */
.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}

/* Khi di chuột qua các nút điều khiển */
.slide-control:hover {
    background-color: rgba(0, 0, 0, 0.8);
}


        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        #product-info {
            flex: 2;
            width: 70%;
            padding-left: 30px;
        }

        #product-info h2 {
            font-size: 24px;
            margin-top: 0;
            color: #333;
        }

        .product-info .price {
            font-size: 20px;
            color: #e74c3c;
            font-weight: bold;
        }

        .product-info .description {
            font-size: 16px;
            margin: 15px 0;
            color: #555;
        }

        .add-to-cart {
            display: inline-block;
            padding: 15px;
            background-color: yellow;
            color: black;
            text-align: center;
            border: 1px solid #000;
            cursor: pointer;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .add-to-cart:hover {
            background-color: red;
            color: white;
            transition: background-color 0.3s ease;
            transform: scale(1.1);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        a {
            text-decoration: none;
            color: #000;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<?php require_once ("header.php"); ?>

<?php
if (isset($_GET['product_id'])) {
    $productid = (int)$_GET['product_id'];
    productDetails($productid);
} else {
    echo "<p>Sản phẩm không tồn tại.</p>";
}
?>

<?php require_once("footer.php"); ?>

<script >
    let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
}

</script>
</body>
</html>
