<?php 
	function toString($post) {
		$end = substr($post["end"], 0,5);
		$start = substr($post["start"], 0,5);
		$note = $post["note"];
		$id = $post["id"];
		$rtn = "<div class='post-container'>
				<div class='post-wrapper'>	
					<div class='time-box'>
						<div class='from'>{$start}</div>
						<div class='to'>{$end}</div>
					</div>
					<div class='notebox'>{$note}</div>
				</div>
				<div class='details'>
					<form action='delete.php' method='POST'>
						<input type='password' name='pw' class='input-password'>
						<button class='post-delete-button' name='id' value='{$id}'>Törlés</button>
					</form>
				</div>
			</div>";
		return $rtn;
	}
 ?>

<html>
	<?php include 'pageparts/head.php'; ?>
	<body>
		<?php include 'pageparts/header.php'; ?>
		

		<content>
			<div class="column column-home">
				<div class="backplate" id="container">
					
					<div class="post-container">
						<div class="post-wrapper expand">	
							<div class="time-box">
								<div class="from">10:30</div>
								<div class="to">14:10</div>
							</div>
							<div class="notebox">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem earum officia modi amet, praesentium fugit erro</div>
						</div>
						<div class="details">
							<form action="delelte.php" method="GET">
								<input type="password" name="pw" class="input-password">
								<div class="information">Wrong Password</div>
								<button class="post-delete-button" name='id' value="1">Törlés</button>
							</form>
						</div>
					</div>

					<?php 
// 						// Connect to the database
// 						$link = mysqli_init(); 
				                        
// 				        mysqli_real_connect_caesar($link);

// 				        if (mysqli_connect_errno()) {
// 				                echo "Database is not avaible at the moment";
// 				                exit;
// 				        }
// 				        mysqli_set_charset($link,"utf8");

// 						$params = "start, end, note, id";

// 						// Check if the id is given
// 						if (!isset($_GET["id"])) {
// 							echo "No location id given";
// 							exit;
// 						}
// 						$location = $_GET["id"];

// 						// Check that the id is exist 
// 						$querry = "SELECT name FROM locations WHERE id = '{$location}'";
// 						$result = mysqli_query($link, $querry);
// 						$result = mysqli_fetch_assoc($result);

// 						if ($result == null) {
// 							echo "Invalid location id";
// 							exit;
// 						}

// 						// Get the records from database
// 						$date = date("Y-m-d");
// 						$time = date("H:i");
// 					    $querry = "SELECT {$params} FROM reservations WHERE location = '{$location}' AND ((date > '{$date}') OR ((date = '{$date}') AND (start >= '{$time}')) ) ORDER BY date, start;";
// // var_dump($querry);
// 					    $result = mysqli_query($link, $querry);
// // var_dump($result);
// 					    // MAGIC with data
// 					    $posts = array();
// 					    while ($post = mysqli_fetch_assoc($result)) {
// 					    	array_push($posts, $post);
// 					    }
// // var_dump($posts);
// 					    foreach ($posts as  $post) {
// // var_dump($post);
// 					    	echo toString($post);
// 					    }
					?>

				
					
				</div>
			</div> <!-- column -->
		</content>


		<?php include 'pageparts/footer.php'; ?>
		<script src="js/getContent.js"></script>
		<!-- <script src="js/deletePost.js"></script> -->
		<script src="js/postClass.js"></script>
		<!-- <script src="js/expander.js"></script> -->
	</body>
</html>