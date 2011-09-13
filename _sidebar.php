<aside>
		
	<h3>Welcome, <?php echo $dash->user; ?></h3>

	<p class="logout"><a href="logout.php">logout</a></p>

	<h4 class="white">Friends</h4>

	<?php 
			
			echo "<ul id=\"dash_list\">";

			$friends = $dash->show_friends($dash->id);
		
			foreach ($friends as $value) {
				
				echo "<li>" . $value . "</li>";

			}

			echo "</ul>";

	?>
		
</aside>