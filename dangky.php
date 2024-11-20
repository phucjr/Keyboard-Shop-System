<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = 'user';  // Hoặc lấy giá trị từ form nếu bạn muốn

   $select = " SELECT * FROM user_form WHERE email = '$email' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exists!';
   }else{
      if($pass != $cpass){
         $error[] = 'Passwords do not match!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:dangnhap.php');
      }
   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đăng ký</title>
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
.name{
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
    background-color: #28a745;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #218838;
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
<div class="form-container" style="background-image: url('upload/dangnhap.png'); width: 100%; min-height: 100vh; background-repeat: no-repeat; background-size: cover;">
   <form class="form" action="" method="post" style="border-radius:20px" onsubmit="return validateEmail()">
      <h3>Đăng kí ngay</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" class="name" required placeholder="Tên của bạn">
      <input type="email" id="email" name="email" required placeholder="Nhập địa chỉ email">
      <input type="password" name="password" required placeholder="Nhập mật khẩu">
      <input type="password" name="cpassword" required placeholder="Xác thực mật khẩu">
      <input type="submit" name="submit" value="Đăng kí ngay" class="form-btn">
      <p>Bạn đã có tài khoản? <a href="dangnhap.php">Đăng nhập ngay</a></p>
   </form>
</div>
<?php
require_once("footer.php");
?> 
<script>
function validateEmail() {
   const email = document.getElementById('email').value;
   const pattern = /\S+@\S+\.\S+/;
   if (!pattern.test(email)) {
      alert("Vui lòng nhập địa chỉ email hợp lệ ");
      return false;
   }
   return true;
}
</script>


</body>
</html>
