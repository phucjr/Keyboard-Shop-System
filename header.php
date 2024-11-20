<?php
include 'session_start.php';

$display_name = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'Đăng nhập';

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blessing Keyboard - Sản phẩm và dịch vụ liên quan đến bàn phím cơ">
    <meta name="keywords" content="bàn phím cơ, sản phẩm, liên hệ, giỏ hàng, tra cứu đơn hàng">
    <meta name="author" content="Blessing Keyboard">
    <title>Header</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style> 
        /* Thanh điều hướng */
.navbar {
    background-color: #000000;
    display: flex;
    justify-content: flex-start; /* Căn chỉnh các mục từ trái sang phải */
    align-items: center;
    
}
.navbar-brand {
    margin-right: 2%; /* Khoảng cách giữa logo và Trang Chủ */
}
/* Các mục điều hướng */
    .navbar-item {
        text-decoration: none;
        color: black; /* Điều chỉnh màu sắc theo ý muốn */
        display: flex;
        align-items: center;
    }
    .navbar-item:hover{
        border-color: #007bff; /* Màu khung khi hover */
        color: #007bff; /* Màu chữ khi hover */
        text-decoration: underline; /* Thêm đư��ng d��n vào mục */
    }
    /* Khoảng cách giữa các mục */
    .navbar-item:nth-of-type(1) { /* Trang Chủ */
        margin-right: 10px; /* Khoảng cách giữa Trang Chủ và Sản Phẩm */
    }
    .navbar-item:nth-of-type(2) { /* Sản Phẩm */
        margin-right: 10px; /* Khoảng cách giữa Sản Phẩm và Liên Hệ */
    }
    .navbar-item:nth-of-type(3) { /* Liên Hệ */
        margin-right: 10px; /* Khoảng cách giữa Liên Hệ và Tìm kiếm */
    }
    .navbar-item:nth-of-type(4) { /* Tìm kiếm */
        margin-right: 20px; /* Khoảng cách giữa Tìm kiếm và Đăng nhập */

    }
  
.logo {
    width: 103px; /* Điều chỉnh chiều rộng để logo nằm trọn trong khung */
    height: 108px; /* Duy trì tỷ lệ khung hình */
    border-radius: 5px;

}

.navbar-collapse {
    display: flex;
    align-items: center;
    flex-direction: row; /* Các phần tử được sắp xếp theo hàng ngang */
    justify-content: space-between; /* Đảm bảo các phần tử cách đều nhau */
    margin-right: 0; /* Giảm khoảng cách bên phải để giỏ hàng sát cạnh phải */
    margin-left: 25px; /* Giảm khoảng cách bên phải để giỏ hàng sát cạnh phải */

    list-style-type: none; /* Loại bỏ dấu bullet */
    border: 2px solid #333; /* Màu khung */
    border-radius: 10px; /* Bo tròn góc */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Thêm đổ bóng nhẹ */
    background-color: black; /* Màu nền */
    padding: 10px 20px
}
.navbar-collapse{
    border-color: #007bff; /* Màu khung khi hover */
    color: #007bff; /* Màu chữ khi hover */ 
}
.nav-item-cart {
    display: flex;
    align-items: center; /* Căn giữa theo chiều dọc */
    margin-left: auto; /* Đẩy giỏ hàng về phía bên phải */
}

.nav-item-cart h5 {
    display: flex;
    align-items: center; /* Đảm bảo các phần tử con nằm trên cùng một dòng và căn giữa theo chiều dọc */
    margin: 0; /* Loại bỏ khoảng cách mặc định của h5 */
}

.cart-count {
    color: white; /* Màu chữ trắng để nổi bật trên nền */
    width: 25px; /* Kích thước hợp lý */
    height: 25px;
    background-color: #ff6347; /* Màu nền cam đậm */
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 14px; /* Kích thước font chữ hợp lý */
    border-radius: 50%; /* Biến thành hình tròn */
    border: 2px solid #fff; /* Đường viền trắng để tạo sự tương phản */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tạo đổ bóng để tăng độ sâu */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Thêm hiệu ứng chuyển đổi mượt mà */
    margin-left: 8px; /* Tạo khoảng cách giữa icon giỏ hàng và số lượng */
}



/* From Uiverse.io by joe-watson-sbf */ 
.search {
  display: flex;
  align-items: center;
  justify-content: space-between;
  text-align: center;
  margin-right:10%
}

.search__input {
  font-family: inherit;
  font-size: inherit;
  background-color: #f4f2f2;
  border: none;
  color: #646464;
  padding: 0.7rem 1rem;
  border-radius: 30px;
  width: 17em;
  transition: all ease-in-out .5s;
  margin-right: -2rem;
}

.search__input:hover, .search__input:focus {
  box-shadow: 0 0 1em #00000013;
}

.search__input:focus {
  outline: none;
  background-color: #f0eeee;
}

.search__input::-webkit-input-placeholder {
  font-weight: 100;
  color: #ccc;
}


.search__button {
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;  background-color: black;
  margin-top: .1em;
  padding: 0.6rem 1rem;

}

.search__button:hover {
  cursor: pointer;
}

.search__icon {
  height: 1.5em;
  width: 1.3em;
  fill: #b4b4b4;
}



.navbar a {
    color: #31b2c9;
    text-decoration: none;
}

.navbar a:hover {
    background-color: #000000;
}
.users {
    display: flex; /* Hiển thị các phần tử bên trong theo dạng hàng ngang */
    align-items: center; /* Căn giữa các phần tử theo chiều dọc */
    color: #31b2c9; /* Màu chữ */
    border: 2px solid #333; /* Màu khung */
    border-radius: 10px; /* Bo góc */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
    background-color: black; /* Màu nền */
    padding: 17px 25px; /* Khoảng cách bên trong */
    margin-right: 40px; /* Khoảng cách từ bên phải */
    margin-left: 40px
}
.users:hover{
    border-color: #007bff; /* Màu khung khi hover */
    color: #007bff; /* Màu chữ khi hover */
}
.users a {
    color: #31b2c9; /* Màu chữ liên kết */
    text-decoration: none; /* Loại bỏ gạch chân */
    display: flex; /* Hiển thị các phần tử bên trong theo dạng hàng ngang */
    align-items: center; /* Căn giữa các phần tử theo chiều dọc */
}

.users h5 {
    margin: 0;
    font-size: 12px;
    font-weight: bold;
    color: aqua; /* Màu chữ */
}

.users .icon {
    margin-left: 10px; /* Khoảng cách giữa icon và chữ */
    font-size: 12px; /* Kích thước icon */
    color: inherit; /* Dùng màu giống với màu của chữ */
}

.logout {
    display: flex; /* Hiển thị các phần tử bên trong theo dạng hàng ngang */
    align-items: center; /* Căn giữa các phần tử theo chiều dọc */
    color: #007bff; /* Màu chữ */
    text-decoration: none; /* Loại bỏ gạch chân */
    border: 2px solid #333; /* Đường viền */
    border-radius: 5px; /* Bo góc */
    background-color: #f8f9fa; /* Màu nền */
    transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease; /* Hiệu ứng chuyển màu */
}

.logout:hover {
    background-color: #e9ecef; /* Màu nền khi hover */
    color: #0056b3; /* Màu chữ khi hover */
    border-color: #0056b3; /* Màu viền khi hover */
}

.logout .icon {
    color: inherit; /* Dùng màu giống với màu của chữ */
}





.look {
    display: flex;
    align-items: center;
    text-align: center;
    padding: 15px 15px;
    background-color:black ;
    border: 2px solid #333;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.look h5 {
    margin: 0;
    color:deepskyblue;
    font-size: 16px;
    font-weight: bold;
}

.look .icon {
    margin-right: 5px;
}
.look:hover{
    border-color: #007bff; /* Màu khung khi hover */
    color: #007bff; /* Màu chữ khi hover */
}
.navbars {
    width: 100%; /* Chiếm toàn bộ chiều rộng của khung hình */
    height:auto; /* Chiếm toàn bộ chiều cao của khung hình */
    display: flex;
    align-items: center; /* Căn giữa theo chiều dọc */
    justify-content: center; /* Căn giữa theo chiều ngang */
    background-color:black; /* Bạn có thể thay đổi màu nền theo ý muốn */
}

.header {
    max-width: 100%; /* Đảm bảo hình ảnh không vượt quá chiều rộng của khung hình */
    max-height: 100%; /* Đảm bảo hình ảnh không vượt quá chiều cao của khung hình */
    object-fit: cover; /* Đảm bảo hình ảnh được cắt gọn mà không bị biến dạng */
}

.text-typing{
    font-family: 'Times New Roman', Times, serif;
    font-size: 20px;
    color:aqua;
    background-color:black;
    text-align: center;
}
h4{
    font-size: 20px;
}

    </style>
</head>
<body>

<header>
    <nav class="text-typing">
        <?php require_once ("chu.html"); ?>
    </nav>

    <nav class="navbars">
        <a href="home.php" class="navbar-brandss">
            <img src="upload/header.webp" alt="Logo Blessing Keyboard" class="header">
        </a>
    </nav>

    <nav class="navbar">
        <a href="home.php" class="navbar-brand">
            <img src="upload/logo.jpg" alt="Logo Blessing Keyboard" class="logo">
        </a>
        <a href="home.php" class="navbar-item">
            <h4><span class="icon"><i class="fas fa-home"></i></span> Trang Chủ</h4>
        </a>
        <a href="index.php" class="navbar-item">
            <h4><span class="icon"><i class="fas fa-box-open"></i></span> Sản Phẩm</h4>
        </a>
        <a href="home.php#footer" class="navbar-item">
            <h4><span class="icon"><i class="fas fa-envelope"></i></span> Liên Hệ</h4>
        </a>
        <div class="navbar-item">
            <form action="search.php" method="GET">
                <input type="text" name="query" class="search__input" placeholder="Nhập tên sản phẩm...">
                <button class="search__button">
                    <svg class="search__icon" aria-hidden="true" viewBox="0 0 24 24">
                        <g>
                            <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                        </g>
                    </svg>
                </button>
            </form>
        </div>
        <div class="users">
            <a href="dangnhap.php">
                <h5>
                    <?= $display_name; ?><span class="icon"><i class="fas fa-user"></i></span>
                </h5>
            </a>
            <?php if ($display_name !== 'Đăng nhập'): ?>
                <a href="dangxuat.php" class="logout">
                    <span class="icon"><i class="fas fa-sign-out-alt"></i></span> Thoát
                </a>
            <?php endif; ?>
        </div>
        <div class="navbar-item">
            <a href="tracuu.php" class="look">
               <h5><span class="icon"><i class="fas fa-file-invoice"></i></span> Tra Cứu Đơn Hàng</h5>
            </a>
        </div>
        <div class="navbar-collapse">
            <a href="cart.php" class="nav-item-cart">
                <h5>
                    <span class="icon">&#128722;</span> Giỏ Hàng
                    <span id="cart_count" class="cart-count">
                        <?php
                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo $count;
                        } else {
                            echo 0;
                        }
                        ?>
                    </span>
                </h5>
            </a>
        </div>
    </nav>
</header>
                    
<script src="scripts.js"></script>
</body>
</html>
