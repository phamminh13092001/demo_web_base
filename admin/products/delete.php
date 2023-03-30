<?php 
require '../check_admin_login.php';
if(empty($_GET['id'])){
	header('location:index.php?success=Phải truyền mã để xóa');
     exit;
 }


$id = $_GET['id'];


require '../connect.php';
$sql = "delete from  products
where
id = '$id'
";
mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:index.php?success=Xóa Thành Công');