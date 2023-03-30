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
	require '../menu.php';
	require '../connect.php';
	$sql = "select * from products";
	$result = mysqli_query($connect,$sql);
	?>
	 <form action='process_insert.php' method="post"  enctype="multipart/form-data">
 <h1 class="form-heading">Khách Hàng</h1>
            <div class="form-group">
                <i class="far fa-user">Tên Khách Hàng</i>
                <input type="text" class="form-input" name="name">
            </div>
            <div class="form-group">
                <i class="fas fa-key">Địa Chỉ</i>
                <input type="text" class="form-input" name="address">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
             <div class="form-group">
                <i class="far fa-remember">Email</i>
                <input type="text" class="form-input" name="email" >
            </div>
            <div class="form-group">
                <i class="far fa-remember">Số Điện Thoại</i>
                <input type="number" class="form-input" name="phone" >
            </div>
            <div class="form-group">
                <i class="far fa-remember">Sản Phẩm</i>
                <select name="san_pham" class="form-input">
    		<?php foreach ($result as $each): ?>
    			<option value="<?php echo $each['id'] ?>">
    				<?php echo $each['name'] ?>
    			</option>
    		<?php endforeach ?>
    	</select>
            </div>
            <input type="submit" value="Thêm" class="form-submit">
</form>
</body>
</html>