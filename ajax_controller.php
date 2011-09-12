<?php 

require_once '_config.php';

/**
 * File to handle all the incoming ajax hits from the client-side
 */

 if ($_GET["method"]) {
 	
 	$method = $_GET["method"];

 	$method($_GET);

 }



 /**
  * grab all of a user's geolocation and return them as an object
  *
  * @return object
  * @author jeffreyhogan
  **/
 function getGeos($obj) {

 	GLOBAL $mysqli;

 	$id = cln($obj["user_id"]);

 	$results = array();
 	$return = array();

 	$sql = "SELECT address_entered, lat, lon, date FROM locations WHERE user_id='$id'";

 	$results = $mysqli->query($sql);

 	while($row = $results->fetch_array()){

 		array_push($return, array(

 				"address_entered" => $row["address_entered"],
 				"lat" => $row["lat"],
 				"lon" => $row["lon"],
 				"date" => $row["date"]

	 		));
	
	}

 	$return = json_encode($return);

 	echo $return;

 }

/**
 * function to write a new geolocation to the db
 *
 * @return void
 * @author jeffreyhogan
 **/
function writeGeo($obj) {

	GLOBAL $mysqli;

	$user_id = cln($obj["user_id"]);
	$address_entered = cln($obj["address_entered"]);
	$lat = cln($obj["lat"]);
	$lon = cln($obj["lon"]);
	$date = date("YmdGis");

	$sql = "INSERT INTO locations (user_id, address_entered, lat, lon, date) VALUES ('$user_id', '$address_entered', '$lat', '$lon', '$date')";

	$results = $mysqli->query($sql);

}

?>