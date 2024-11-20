<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SEO thẻ title và meta để mô tả chính xác về trang web -->
    <title>Blessing Keyboard - Bàn Phím Chính Hãng</title> 
    <meta name="description" content="Blessing Keyboard cung cấp các sản phẩm bàn phím chính hãng với uy tín và chất lượng hàng đầu. Khám phá các sản phẩm nổi bật và tin tức liên quan.">
    <meta name="keywords" content="Blessing Keyboard, bàn phím, sản phẩm chính hãng, tin tức, mua ngay">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="trangchu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .row{
            margin-bottom: 70px;
        }
        .col-9, .col-3 { 
            min-height: 500px; 
        }
        .col-9 { 
            background-color: azure; 
        }
        .col-3 { 
            background-color: skyblue; 
        }

        .product-list {
            margin-bottom: 70px;
        }
        .col-3 h2 {
            text-align: center;
            margin-top: 20px;
            color: brown;
        }
        h3 {
            font-size: 60px;
            font-family: Arial, sans-serif;
            background: url('upload/bp.jpg') no-repeat center center;
            background-size: cover;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
 require_once("header.php");
?>

<div id="banner">
    <div class="box-left">
        <h2>
            <span>UY TÍN</span>
            <br>
            <span>CHẤT LƯỢNG</span>
        </h2>
        <p>Chuyên cung cấp các sản phẩm chính hãng.</p>
        <a href="index.php" title="Khám phá sản phẩm chính hãng tại Blessing Keyboard">
            <button>Mua ngay</button>
        </a>
    </div>
    <div class="box-right">
        <!-- SEO thêm các title và alt để tăng khả năng tìm kiếm và cung cấp thông tin bổ sung khi người dùng hover qua. -->
        <img src="upload/background.jpg" alt="Banner sản phẩm" title="Banner sản phẩm chính hãng tại Blessing Keyboard">
        <img src="upload/bp.jpg" alt="Sản phẩm nổi bật" title="Sản phẩm nổi bật của Blessing Keyboard">
    </div>
</div>

<?php
 require_once("b.html");
?>

<div class="product-list">
    <h3>Sản Phẩm Nổi Bật</h3>
    <?php
    require_once("product.php");
    ?>
</div>

<div class="row">
    <main class="col-9">
        <?php include 'thongtin.php'; ?>
    </main>
    <aside class="col-3">
        <h2>Tin Tức Liên Quan</h2>
        <?php include 'tinnoibat.php'; ?>
    </aside>
</div>

<?php
require_once("footer.php");
?>                  

<script src="scripts.js"></script>

</body>
</html>
