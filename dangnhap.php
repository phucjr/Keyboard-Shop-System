
   <?php

@include 'config.php';

include 'session_start.php';


// Xử lý tạo người dùng admin (Chạy mã này chỉ một lần và xóa sau khi tạo admin thành công)
// Bạn có thể kiểm tra xem bảng đã có admin hay chưa để tránh việc thêm admin nhiều lần
//http://localhost/ASM/dangnhap.php?create_admin=true
if (isset($_GET['create_admin']) && $_GET['create_admin'] === 'true') {
    $email = 'admin@example.com';
    $password = md5('phuc123'); // Mã hóa mật khẩu
    $user_type = 'admin'; // Loại người dùng

    // Truy vấn SQL để chèn người dùng admin vào cơ sở dữ liệu
    $query = "INSERT INTO user_form (email, password, user_type) VALUES ('$email', '$password', '$user_type')";

    if (mysqli_query($conn, $query)) {
        echo "Admin user created successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Đóng kết nối
    mysqli_close($conn);
    exit;
}



if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

    $select = "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass'";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);
        $_SESSION['user_id'] = $row['id']; // Lưu ID người dùng vào session
        $_SESSION['order_id'] = $row['id']; // Lưu ID người dùng vào session

        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['user_type'] = $row['user_type']; // Lưu loại người dùng vào session

        if ($row['user_type'] === 'admin') {
            header('location:admin.php'); // Chuyển hướng đến admin dashboard
        } else {
            header('location:index.php'); // Chuyển hướng đến trang chính của người dùng thông thường
        }
        exit;

    } else {
        $error[] = 'Incorrect email or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>

body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background: #f0f0f0;
}

.form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-size: cover;
}

.form {
    background: rgba(255, 255, 255, 0.9);
    padding: 20px;
    border-radius: 10px;
    width: 100%;
    max-width: 400px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    box-sizing: border-box;
}

h3 {
    margin-bottom: 20px;
    font-size: 24px;
    text-align: center;
    color: #333;
}

input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

.error-msg {
    color: red;
    display: block;
    margin-bottom: 10px;
    text-align: center;
}

p {
    text-align: center;
    margin-top: 10px;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

   </style>
</head>

<body>
<?php
 require_once("header.php");

?>
    <!-- Bao gồm file header.php -->

    <div class="form-container" style="background-image: url('upload/dangnhap.png'); width: 100%; min-height: 100vh; background-repeat: no-repeat; background-size: cover;">
        <form class="form" action="" method="post" style="border-radius:20px">
            <h3>Đăng nhập</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                }
            }
            ?>
            <input type="email" name="email" required placeholder="Nhập địa chỉ email">
            <input type="password" name="password" required placeholder="Nhập mật khẩu">
            <input type="submit" name="submit" value="Đăng Nhập" class="form-btn">
            <p>Bạn chưa có tài khoản? <a href="dangky.php">Đăng kí ngay</a></p>
            <br>
            <p><a href="index.php">Quay về trang chủ</a></p>

        </form>
    </div>
    <?php
require_once("footer.php");
?> 
</body>

</html>
