<?php 
	
	require_once('_config.php');
	//function: check to see if a session exists then send to index or user dash

 ?>
<!doctype html>
<html>
<head>
	<title>Welcome to geeQuest</title>

	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

	<script type="text/javascript"
    src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/scripts.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>

	<div id="container">

		<header>
			<a href="index.php"><img src="assets/logo.png" alt="Welcome to geeQuest"></a>
			<h2>An SMS based geotracker for travelers!</h2>
		</header>