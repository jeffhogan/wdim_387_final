<?php 

	include '_header.php';	

	if (!empty($_POST)) {
		
		if (checkUserName(cln($_POST["new_user"])) && checkPass(cln($_POST["pass1"]), cln($_POST["pass2"]))) {
				
			if(checkAvailable($_POST["new_user"])) {

				$results = register($_POST["new_user"], $_POST["pass1"]);
				
		
			} else {
				
				$error["msg"] = "<p class=\"error\">That username is taken</p>";

			}

		} else {
			
			$error["msg"] = "<p class=\"error\">Please verify that you are using a valid email address and that your entered passwords match</p>";
			
		}
	}	

?>
	<div id="register">

		<?php if(!empty($results["contents"])) {echo $results["contents"];}; ?>
		<form action="" method="post">
			<fieldset>
				<?php if(!empty($error["msg"])) {echo $error["msg"];}; ?>
				<legend>New User Registration</legend>
				<label for="new_user">Username:</label>
				<input type="text" name="new_user" value="" placeholder="email address"><br />
				
				<label for="pass1">Password:</label>
				<input type="password" name="pass1" value="" placeholder="password"><br />
				
				<label for="pass2">Verify Password:</label>
				<input type="password" name="pass2" value="" placeholder="re-type password"><br/>
				
				<input type="submit" name="register" value="Register">
			
			</fieldset>
		</form>
	</div>
		
		<?php include '_footer.php'; ?>

	</div><!-- /container -->

	<div id="banner"></div>
	
</body>
</html>