<?php
 // require '../check_super_admin_login.php';

if(empty($_POST['id'])){
	header('location:index.php?success=Phải truyền mã để sửa');
     exit;
 }


$id = $_POST['id'];

if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['photo'])){
	header("location:form_update.php?id=$id&loi=Phải Điền Đầy Đủ Thông Tin");
	exit;
}

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$photo = $_POST['photo'];

require '../connect.php';
$sql = "update manufacturers
set
name = '$name',
address = '$address',
phone = '$phone',
photo = '$photo'
where
id = '$id'
";
mysqli_query($connect,$sql);
$error = mysqli_error($connect);
mysqli_close($connect);
if(empty($error)){
	header('location:index.php?success=Sửa Thành Công');
}else {
	header("location:form_update.php?id=$ìd$error=Lỗi truy vấn");

}
