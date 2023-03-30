<?php session_start();
if(empty($_SESSION['id'])){
	header('location:index.php?error=Đăng nhập vào');	
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
Trang Người Dùng 
<?php
echo $_SESSION['name'];
?>
<a href="index.php">
	Đăng xuất
</a>
</body>
</html>