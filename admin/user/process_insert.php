<?php
if(empty($_POST['name']) || empty($_FILES['address']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['san_pham'])){
	header('location:form_insert.php?error=Phải Điền Đầy Đủ Thông Tin');
	}

$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$san_pham = $_POST['san_pham'];


require '../connect.php';
$sql = "insert into user(name, address, email, phone, san_pham)
values('$name','$address','$email','$phone','$san_pham')";

mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:index.php?success=Thêm Thành Công');