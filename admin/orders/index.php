<?php require '../check_admin_login.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản Lý Đơn Hàng</title>
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
$sql = "select 
orders.*,
customers.name,
customers.phone_number,
customers.address
from orders
join customers
on customers.id = orders.customer_id";
$result = mysqli_query($connect,$sql);
?>
<table border="1" width="100%">
	<tr>
		<th>Mã</th>
		<th>Thời gian đặt hàng</th>
		<th>Thông tin người nhận</th>
		<th>Thông tin người đặt</th>
		<th>Trạng thái</th>
		<th>Tổng tiền</th>
		<th>Xem chi tiết</th>
		<th>Sửa</th>
	</tr>
	<?php foreach ($result as $each ): ?>
		<tr>
			<td><?php echo $each['id'] ?></td>
			<td><?php echo $each['created_at'] ?></td>
			<td>
				<?php echo $each['name_receiver'] ?>
				<?php echo $each['phone_receiver'] ?>
				<?php echo $each['address_receiver'] ?>
			</td>
			<td>
				<?php echo $each['name'] ?>
				<?php echo $each['phone_number'] ?>
				<?php echo $each['address'] ?>
			</td>
			<td>
				<?php
				switch ($each['status']){
					case '0':
					echo "Mới Đặt";
					break;
					case '1':
					echo "Đã Duyệt";
					break;
					case '2':
					echo "Đã Hủy";
					break;
				}
				?>
			</td>
			<td><?php echo $each['total_price'] ?></td>
			<td>
				<a href="detail.php?id=<?php echo $each['id'] ?>">
					Xem chi tiết
				</a>
			</td>
			<td>
				<a href="update.php?id=<?php echo $each['id'] ?>&status=1">
					Duyệt đơn
				</a>
				<br>
				<a href="update.php?id=<?php echo $each['id'] ?>&status=2">
					Hủy
				</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>
</body>
</html>