<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
// connect database : kết nối với dtb
// $conn = mysqli_connect('localhost', 'shaun', 'text123', 'ninja_pizza');
// check connection: kiểm tra kết nối 
// if(!$conn) {
// 		echo 'Connection error: ' .mysqli_connect_error();
// 	}
	
// import file 
	include('config/db_connect.php');
// write query for all pizzas: Lựa chọn 1 hoặc nhiều hoặc tất cả các chỉ mục để lấy ra từ dtb, 
// theo thứ tự thời gian lúc tạo ra dữ liệu đó (create-at)
	$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';
// make query & get result: hứng dữ liệu
	$result = mysqli_query($conn, $sql);
// fetch the result rows as an array: chuyển dữ liệu từ các cột thành mảng
	$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
// free dtb in the memory: giải phóng dữ liệu trong bộ nhớ 
	mysqli_free_result($result); 
// Cancel connection: ngắt kết nối tới dtb
	mysqli_close($conn);

	// print_r($pizzas);
?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>
	<h4 class="center text-grey">Pizzas !</h4>
	<div class="container">
		<div class="row">
			<?php foreach($pizzas as $pizza) : ?>
				<div class="col s6 md3">
					<div class="card z-depth-0">
						<img src="img/pizza.jpg" class="pizza" >
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
							<ul>
								<?php foreach(explode(',', $pizza['ingredients']) as $ing) : ?>
									<li><?php echo htmlspecialchars($ing); ?></li>
								<?php endforeach; ?>	
							</ul>
						</div>
						<div class="card-action right-align">
							<a href="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text">more info</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>	
		</div>
	</div>	
	<?php include('templates/footer.php'); ?>

</html>