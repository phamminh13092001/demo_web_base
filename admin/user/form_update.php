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
$id = $_GET['id'];
	require '../menu.php';
	require '../connect.php';
	$sql = "select * from user where id = '$id'";
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);

	$sql = "select * from products";
	$products = mysqli_query($connect,$sql);
	?>
<form action='process_update.php'method="post">
	<input type="hidden" name="id" value="<?php echo $each['id'] ?>">
	Tên
	<input type="text" name="name" value="<?php echo $each['name'] ?>">
	<br>
	Địa Chỉ
	<input type="text" name="address" value="<?php echo $each['address'] ?>">
	<br>
	Email
	<input type="text" name="email" value="<?php echo $each['email'] ?>">
	<br>
	Số Điẹn Thoại
	<input type="text" name="phone" value="<?php echo $each['phone'] ?>">
	<br>
	Sản Phẩm
    	<select name="san_pham">
    		<?php foreach ($products as $products): ?>
    			<option
    			 value="<?php echo $products['id'] ?>"
    				<?php if($each['san_pham'] == $products['id']){ ?>
                      selected
                  <?php } ?>
                  >
    				<?php echo $products['name'] ?>
    			</option>
    		<?php endforeach ?>
    		</select>

	<br>
	<button>Sửa</button>
</form>
</body>
</html>