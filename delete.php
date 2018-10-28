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
					<form action='delelte.php' method='POST'>
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

					<?php 
						// Connect to the database
						$link = mysqli_init(); 
				                        
				        mysqli_real_connect_caesar($link);

				        if (mysqli_connect_errno()) {
				                echo "Database is not avaible at the moment";
				                exit;
				        }
				        mysqli_set_charset($link,"utf8");

				        if ((!isset($_POST["pw"])) or (!isset($_POST["id"]))) {
				        	echo "Missing parameters";
				        	exit;
				        }

				        $id = $_POST["id"];
				        $pw = $_POST["pw"];

				        $query = "SELECT password, location FROM reservations WHERE id={$id}";
				   // var_dump($query);
				        $result = mysqli_query($link, $query);
				        $result = mysqli_fetch_assoc($result);

				        $password = $result["password"];
				        $location = $result["location"];

				        if ($password != $pw) {
				        	echo "Invalid password";
				        	exit;
				        }

				        $query = "DELETE FROM reservations WHERE id = {$id}";
				        $result = mysqli_query($link, $query);

				        header("Location: http://szaffo.web.elte.hu/showcategory.php?id={$location}");


					?>

				
					
				</div>
			</div> <!-- column -->
		</content>


		<?php include 'pageparts/footer.php'; ?>
		<!-- <script src="js/getContent.js"></script> -->
		<script src="js/expander.js"></script>
	</body>
</html>