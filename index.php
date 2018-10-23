<html>
	<head lang="hu">
		<!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#333">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#333">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#333">

		<meta charset="utf-8">
		<meta name="author" content="Szabó Martin">
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"/> -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content=""/>
		
		<title>ADK</title>
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<header>
			<div class="head">
				<div class="column">
					<div class="logo">
						<h1>Ajtósi Dürer sori Kollégium</h1>
					</div>
				</div>
			</div>
		</header>
		

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
							$link = mysqli_init(); 
						
							mysqli_real_connect_caesar($link);

							if (mysqli_connect_errno()) {
								$result = mysqli_connect_error();
								$result = json_encode($result);
								echo $result;
								exit;
							}

							mysqli_set_charset($link,"utf8");

							$query = "SELECT id, name FROM locations;";

							$result  = mysqli_query($link, $query);

							while($fetch = mysqli_fetch_assoc($result)) {
								echo "<a class='category-link' href='showcategory.php?id={$fetch['id']}'>{$fetch['name']}</a>";
							}
						 ?>
					</div>
				</div>
			</div> <!-- column -->
		</content>


		<footer>
			<div class="footer">
				<div class="column column-footer">
					<div class="footer-col-1">
					<h2>Szabó Martin 2018</h2>
				</div>
				<div class="footer-col-2">
					<!-- <a href="" class="footer-link">Elérhetőségek</a> -->
					<!-- <a href="" class="footer-link">Hibabejelentés</a> -->
				</div>
				</div>
			</div>
		</footer>
	</body>


</html>