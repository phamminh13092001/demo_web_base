 <style type="text/css">
 	 body{
    background: url('https://png.pngtree.com/thumb_back/fh260/background/20220216/pngtree-oligomeric-light-blue-background-template-image_935719.jpg');
    background-size: cover;
    background-position-y: -80px;
    font-size: 16px;
    float: left;
}
 	#tren {
    width: 100%;
    height: 100vh;
    float: left;
}
#header {
    width: 100%;
    padding:0px 30px;
    margin-top:33px;
    display: flex;
    justify-content: space-between;
    align-items: center;    
}
#menu {
    list-style:none;
    display: flex;
    float: left;
}

#menu .item {
    margin:0px 25px;
}

#menu .item a {
    color:#626A67;
    text-decoration: none;
}


#actions {
    display: flex;
}

#actions .item {
    margin-left:22px;
}

 </style>
<div id='tren'>
 	<div id="header">
        <a href="" class="logo">
        <img src="https://heyoto.vn/wp-content/themes/heyoto/assets/imgs/common/logo_heyoto.svg" alt="HeyOto" width="135" height="42"></a>
		<ol>
			 <div id="menu">
                <div class="item">
                    <a href="index.php">Trang chủ</a>
                </div>
			<?php if(empty($_SESSION['id'])) {
				?>
			
			<div class="item">
                    <a href="signin.php">Đăng Nhập </a>
            </div>
			<div class="item">
                    <a href="signup.php">Đăng Ký</a>
           	</div>
			
		<?php } else{
			?>
		<div class="item">
			Chào <?php echo $_SESSION['name'] ?>
			<a href="signout.php">
				Đăng xuất
			</a>
	    </div>

	<?php } ?>
		</ol>
</div>