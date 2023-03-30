<?php
session_start();
if(isset($_COOKIE['remember'])){
    $token = $_COOKIE['remember'];
    require 'admin/connect.php';
    $sql = "select * from customers where token ='$token'
    limit 1";
    $result = mysqli_query($connect,$sql);
    $number_rows = mysqli_num_rows($result);
    if($number_rows == 1){
           $each = mysqli_fetch_array($result);
           $_SESSION['id'] = $each['id'];
           $_SESSION['name'] = $each['name'];
       }

}
if(isset($_SESSION['id'])){
    header('location:user.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Đăng Nhập Người Dùng</title>
    <style type="text/css">
       body{
    background: url('https://png.pngtree.com/thumb_back/fh260/background/20220216/pngtree-oligomeric-light-blue-background-template-image_935719.jpg');
    background-size: cover;
    background-position-y: -80px;
    font-size: 16px;
}
#wrapper{
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
#form-login{
    max-width: 400px;
    background: rgba(0, 0, 0 , 0.8);
    flex-grow: 1;
    padding: 30px 30px 40px;
    box-shadow: 0px 0px 17px 2px rgba(255, 255, 255, 0.8);
}
.form-heading{
    font-size: 25px;
    color: black;
    text-align: center;
    margin-bottom: 30px;
}
.form-group{
    border-bottom: 1px solid #fff;
    margin-top: 15px;
    margin-bottom: 20px;
    display: flex;
}
.form-group i{
    color: black;
    font-size: 14px;
    padding-top: 5px;
    padding-right: 10px;
}
.form-input{
    background: transparent;
    border: 0;
    outline: 0;
    color: black;
    flex-grow: 1;
}
.form-input::placeholder{
    color: #f5f5f5;
}
#eye i{
    padding-right: 0;
    cursor: pointer;
}
.form-submit{
    background: transparent;
    border: 1px solid #f5f5f5;
    color: black;
    width: 100%;
    text-transform: uppercase;
    padding: 6px 10px;
    transition: 0.25s ease-in-out;
    margin-top: 30px;
}
.form-submit:hover{
    border: 1px solid #54a0ff;
}
    </style>
</head>
<body>
    <div id="wrapper">
	<form method="post" action="process_signin.php" id="from-login">
   <!--  <table>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" size="30" class="form-input"></td>
                </tr>
                <tr>
                    <td>Mật Khẩu</td>
                    <td><input type="password" name="password" size="30" class="form-input"></td>
                </tr>
                <tr>
                    <td>Ghi Nhớ Đăng Nhập</td>
                    <td> <input type="checkbox" name="remember" class="form-input"></td>
                </tr>
    </table> -->
     <h1 class="form-heading">Form đăng nhập</h1>
            <div class="form-group">
                <i class="far fa-user">Email</i>
                <input type="text" class="form-input" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <i class="fas fa-key">Mật Khẩu</i>
                <input type="password" class="form-input" name="password" placeholder="Mật khẩu">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
             <div class="form-group">
                <i class="far fa-remember">Ghi Nhớ Đăng Nhập</i>
                <input type="checkbox" class="form-input" name="remember" placeholder="Ghi Nhớ Đăng Nhập">
            </div>
            <input type="submit" value="Đăng nhập" class="form-submit">
    <!-- <button>Đăng Nhập</button> -->
</form>
</div>
</body>
</html>