<html>
	<?php include 'pageparts/head.php'; ?>
	<body>
		<?php include 'pageparts/header.php'; ?>
		

		<content>
			<div class="column column-home">
				<div class="backplate" id="container">
					
					<!-- <div class="post-container">
						<div class="post-wrapper expand">	
							<div class="time-box">
								<div class="from">10:30</div>
								<div class="to">14:10</div>
							</div>
							<div class="notebox">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem earum officia modi amet, praesentium fugit erro</div>
						</div>
						<div class="details">
							<form action="delelte.php" method="GET">
								<input type="password" name="pw" class="input-password input">
								<div class="information">Wrong Password</div>
								<button class="post-delete-button" name='id' value="1">Törlés</button>
							</form>
						</div>
					</div> -->
			
				</div>
			</div> <!-- column -->

			<!-- Plus button -->
			<div class="plus-button-container">
				<div class="plus-button-circle" id="plus-button">
					<div class="plus-button-vertical-line"><div class="plus-button-horizontal-line"></div></div>
				</div>
			</div>

			<!-- Add panel -->
			<div class="panel-container" id="panel">
				<div class="column">
					<div class="panel">
						<div class="times">
							<div class="times-from">
								<span>From</span>
								<input type="time" class="input" required value='<?php echo date("H:i") ?>' id="from">
							</div>
							<div class="times-to">
								<span>To</span>
								<input type="time" class="input" required value='<?php echo date("H:i", time() + 3600) ?>' id="to">
							</div>
							<div class="times-date">
								<span>Date</span>
								<input type="date" class="input" required value="<?php echo date('Y-m-d') ?>" id="date">
							</div>
						</div>
						<div class="datas">
							<div class="datas-nk">
								<span>Neptun code</span>
								<input type="text" class="input" required style="text-transform: uppercase;" id="nk">
							</div>
							<div class="datas-pw">
								<span>Password</span>
								<input type="password" class="input" required id="pw">
							</div>
						</div>
						<div class="comment-box">
							<span>Comment</span>
							<textarea id="note" rows="5" maxlength="120" class="input"></textarea>
						</div>
						<div class="button-box">
							<span class="response" id="response-box"></span>
							<button class="button" id="submit">Send</button>
						</div>
					</div>
				</div>
			</div>


		<?php include 'pageparts/footer.php'; ?>
		<script src="js/postClass.js"></script>
		<script src="js/getContent.js"></script>
		<script src="js/plusButton.js"></script>
		<script src="js/sendData.js"></script>
	</body>
</html>