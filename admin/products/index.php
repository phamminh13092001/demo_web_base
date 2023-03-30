<?php
 require '../check_admin_login.php';
 ?>
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
require '../connect.php';

// bỏ qua = số bài trên 1 trang nhân với (số trang hiện tại -1)
$trang = 1;
if(isset($_GET['trang'])){
	$trang = $_GET['trang'];
}
$tim_kiem = '';

if(isset($_GET['tim_kiem'])){
	$tim_kiem = $_GET['tim_kiem'];
}

$sql_so_tin_tuc = "select count(*) from products
where
description like '%$tim_kiem%'";
$mang_so_tin_tuc = mysqli_query($connect,$sql_so_tin_tuc);
$ket_qua_so_tin_tuc = mysqli_fetch_array($mang_so_tin_tuc);
$so_tin_tuc = $ket_qua_so_tin_tuc['count(*)'];

$so_tin_tuc_tren_1_trang = 2;

$so_trang = ceil($so_tin_tuc / $so_tin_tuc_tren_1_trang);
$bo_qua =$so_tin_tuc_tren_1_trang * ($trang - 1);

$tim_kiem = '';

if(isset($_GET['tim_kiem'])){
	$tim_kiem = $_GET['tim_kiem'];
}
$sql = "select * from products
where
description like '%$tim_kiem%'

limit $so_tin_tuc_tren_1_trang offset $bo_qua";

$result = mysqli_query($connect,$sql);
?>

	<?php
	require '../menu.php';
	require '../connect.php';
	$sql = "select products. *,
    manufacturers.name as manufacturer_name
	 from products join manufacturers on products.manufacturer_id = manufacturers.id ";
	$result = mysqli_query($connect,$sql);
	?>
<h1>
	Quản Lý Sản Phẩm
</h1>
<a href="form_insert.php">Thêm</a>
<table border="2" width="100%">
	<caption>
		<form>
			<input type="search" name="tim_kiem" 
			value="<?php echo $tim_kiem ?>">
		</form>
	</caption>
	<tr>
		<th>Mã</th>
		<th>Tên</th>
		<th>Ảnh</th>
		<th>Giá</th>
		<th>Nhà sản xuất</th>
		<th>Sửa</th>
		<th>Xóa</th>

		
	</tr>
	<?php foreach ($result as $each): ?>
		<tr>
			<td><?php echo $each['id'] ?></td>
			<td><?php echo $each['name'] ?></td>
			<td>
				<img height="100" src="photos/<?php echo $each['photo'] ?>">
			</td>
			<td><?php echo $each['price'] ?></td>
			<td><?php echo $each['manufacturer_name'] ?></td>
			<td>
   		<a href="form_update.php?id=<?php echo $each['id'] ?>">
   			Sửa
   		</a>
   	</td>
   	<td>
   		<a href="delete.php?id=<?php echo $each['id'] ?>">
   			Xóa
   		</a>
   	</td>
		</tr>
	<?php endforeach ?>
</table>
</body>
</html>