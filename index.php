<?php
	
	require_once '_config.php';
 
	ob_start();
	is_logged_in(false);
	ob_end_flush();

?>
<?php include('_header.php'); ?>
		
		<?php include('_login.php'); ?>


		<div id="map">
			
		</div>

		<div id="dashboard" class="main">

			<div class="index_column">

				<h3>Welcome to an exploration of travel and web development!</h3>

				<p>This site is an educational project aimed at exploring several facets of web development, such as:</p>

			</div>

			<div class="index_column">

				<ul id="index_list">
					
					<li>Html5</li>
					<li>CSS</li>
					<li>Javascript</li>
					<li>Php</li>
					<li>MySQL</li>
					<li>google maps</li>
					<li>twilio</li>
				
				</ul>

			</div>

			<div class="index_column">

				<p>The idea behind this site? Create an account and log in! Add map points to your dashboard map and (hopefully) SMS text a location directly!</p><br />

				<h3>In the works:</h3>

				<p>Track and plan itineraries</p>
				<p>SMS alerts for when fellow travelers are near you</p>
				<p>Social Node Ticketing</p>

			</div>

		</div>

		<?php include('_footer.php'); ?>

	</div>

	

	<div id="banner"></div>
	
</body>
</html>