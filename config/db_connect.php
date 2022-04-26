<?php
// connect database : kết nối với dtb
$conn = mysqli_connect('127.0.0.1', 'shaun', 'text123', 'ninja_pizza');
	
// check connection: kiểm tra kết nối 
	if(!$conn) {
		echo 'Connection error: ' .mysqli_connect_error();
	}
?>

