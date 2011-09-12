<?php
	
	require_once '_config.php';
 
	ob_start();
	is_logged_in(false);
	ob_end_flush();

?>
<?php include('_header.php'); ?>
		
		<!-- <?php include('_sidebar.php'); ?> -->
		<?php include('_login.php'); ?>


		<div id="map">
			
		</div>

		<div id="dashboard">
			
			<p>Hi im some text</p>

		</div>

		<?php include('_footer.php'); ?>

	</div>

	

	<div id="banner"></div>
	
</body>
</html>