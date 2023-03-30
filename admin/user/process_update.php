<?php 

if(empty($_POST['id'])){
	header('location:index.php?success=Phải truyền mã để sửa');
     exit;
 }


$id = $_POST['id'];

if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['san_pham'])){
	header("location:form_update.php?id=$id&loi=Phải Điền Đầy Đủ Thông Tin");
	exit;
}

$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$san_pham = $_POST['san_pham'];

require '../connect.php';
$sql = "update user
set
name = '$name',
address = '$address',
email = '$email',
phone = '$phone',
san_pham = '$san_pham'
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
