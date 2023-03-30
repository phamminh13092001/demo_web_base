
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		body{
    background: url('https://png.pngtree.com/thumb_back/fh260/background/20220216/pngtree-oligomeric-light-blue-background-template-image_935719.jpg');
    background-size: cover;
    background-position-y: -80px;
    font-size: 16px;
}
	</style>
</head>
<body>
<?php 

if(empty($_GET['id'])){
header('location:index.php?erros=Phải truyền mã để sửa');

}
$id = $_GET['id'];
     include '../menu.php';
     require '../connect.php';
$sql = "select * from manufacturers
where id = '$id'";
 $result = mysqli_query($connect,$sql);
 $each = mysqli_fetch_array($result);
?>
<form action='process_update.php'method="post">
	<input type="hidden" name="id" value="<?php echo $each['id'] ?>">
	Tên
	<input type="text" name="name" value="<?php echo $each['name'] ?>">
	<br>
	Địa Chỉ
    <textarea name="address"><?php echo $each['address']?></textarea>
	<br>
	Điện Thoại
	<input type="text" name="phone" value="<?php echo $each['phone'] ?>">
	<br>
	Ảnh
	<input type="text" name="photo" value="<?php echo $each['photo'] ?>">
	<br>
	<button>Sửa</button>
</form>
</body>
</html>