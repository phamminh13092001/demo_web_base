<ul>
	<li>
		<a href="../user">
			Quản Lý Khách Hàng
		</a>
	</li>
	<li>
		<a href="../manufacturers">
			Quản Lý Nhà Sản Xuất
		</a>
	</li>
	 <li>
		<a href="../products">
			Quản Lý Sản Phẩm
		</a>
	</li>
	 <li>
		<a href="../orders">
			Quản Lý đơn hàng
		</a>
	</li>
</ul>
		<?php
		if(isset($_GET['loi'])){
		?>
		<span style='color:red'>
			<?php echo $_GET['loi']?>
     	</span>
    	<?php } ?>
		<?php
		if(isset($_GET['success'])){
		?>
		<span style='color:gray'>
		<?php echo $_GET['success']?>
     	</span>
    	<?php
		}
		?>

