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
<?php
session_start();
// require 'admin/connect.php';
$sum = 0;
$cart = [];
if(isset($_SESSION['cart'])){
	$cart = $_SESSION['cart'];
}
?>
<table border="1" width="100">
	<a href="index.php">
		Trang chủ
	</a>
		<tr>
			<th>Ảnh</th>
			<th>Tên Sản Phẩm</th>
			<th>Giá Sản Phẩm</th>
			<th>Số Lượng</th>
			<th>Tổng Tiền</th>
			<th>Xóa</th>
		</tr>
 <?php if(!empty($cart)) ?>  
	<?php foreach ($cart as $id => $each): ?>
		<tr>
			<td><img height='100' src="admin/products/photos/<?php echo $each['photo'] ?>" ></td>
			<td><?php echo $each['name'] ?></td>
			<td><?php echo $each['price'] ?></td>
			<td>
				<a href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=decre">-</a>
				<?php echo $each['quantity'] ?>
				<a href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=incre">+</a>
			</td>
			<td>
				<?php
				$result = $each['price'] * $each['quantity'];
				echo $result;
				$sum += $result;
				?>
			</td>
			<td>
				<a href="delete_from_cart.php?id=<?php echo $id ?>">X</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>
<h1>
	Tổng tiền hóa đơn
	$<?php echo $sum ?>
</h1>
<?php
$id = $_SESSION['id'];
require 'admin/connect.php';
$sql = "select * from customers where id = '$id'";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);
?>
<form method="post" action="process_checkout.php" >
 <h1 class="form-heading">Tổng tiền hóa đơn</h1>
            <div class="form-group">
                <i class="far fa-user">Tên Khách Hàng</i>
                <input type="text" class="form-input" name="name_receiver" value='<?php echo $each['name']?>'>
            </div>
            <div class="form-group">
                <i class="fas fa-key">Số Điện Thoại</i>
                <input type="password" class="form-input" name="phone_receiver" value='<?php echo $each['phone_number']?>' >
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
             <div class="form-group">
                <i class="far fa-remember">Địa Chỉ</i>
                <input type="text" class="form-input" name="address_receiver"value='<?php echo $each['address']?>'>
            </div>
            <input type="submit" value="Đặt Hàng" class="form-submit">
</form>
</body>
</html>