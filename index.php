<html>
	<?php include 'pageparts/head.php'; ?>
	<body>
		<?php include 'pageparts/header.php'; ?>
		

		<content>
			<div class="column column-home">
				<div class="wrapper">
					<h2 class="homepage-h2">Válassz kategóriát</h2>
					<div class="categories">
						<!-- <a class="category-link" href="showcategory.php?id=1">5.emeleti mosógép</a> -->
						<!-- <a class="category-link" href="showcategory.php?id=3">7.emeleti mosógép</a> -->
						<!-- <a class="category-link" href="showcategory.php?id=5">Biliárd asztal</a> -->
						<!-- <a class="category-link" href="showcategory.php?id=5">Konditerem</a> -->
						<?php 
							// $link = mysqli_init(); 
						
							// mysqli_real_connect_caesar($link);

							// if (mysqli_connect_errno()) {
							// 	$result = mysqli_connect_error();
							// 	$result = json_encode($result);
							// 	echo $result;
							// 	exit;
							// }

							// mysqli_set_charset($link,"utf8");

							// $query = "SELECT id, name FROM locations;";

							// $result  = mysqli_query($link, $query);

							// while($fetch = mysqli_fetch_assoc($result)) {
							// 	echo "<a class='category-link' href='showcategory.php?id={$fetch['id']}'>{$fetch['name']}</a>";
							// }
						 ?>
					</div>
				</div>
			</div> <!-- column -->
		</content>


		<?php include 'pageparts/footer.php'; ?>
	</body>


</html>