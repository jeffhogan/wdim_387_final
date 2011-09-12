<?php
	
	require_once '_config.php';
 
	ob_start();
	is_logged_in();
	ob_end_flush();

	$dash = new Dashboard($_SESSION["username"]);

?>
<?php include('_header.php'); ?>
		
		<?php include('_sidebar.php'); ?>

		<div id="map">
			
		</div>

		<div id="dashboard">
			
			<h4>Add Location</h4>
			<input type="text" name="add_location" id="add_location" placeholder="Add a city, street, or any location">
			<input type="submit" name="add" value="Add" id="add_button">

		</div>

		<?php include('_footer.php'); ?>

	</div>
	
	<input type="hidden" name="id" value="<?php echo $dash->id[0]; ?>" id="hidden_id">

	
	<div id="banner"></div>
	
</body>
</html>