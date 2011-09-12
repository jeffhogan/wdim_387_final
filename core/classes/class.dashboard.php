<?php  
	require_once '_config.php';
	/**
	* Class to construct user dashboards
	*/

	class Dashboard {

		public $id;
		public $user;
		
		function __construct($person) {
			
			$this->user = $person;

			$this->id = $this->setId($this->user);

		}

	/**
	 * set the id of the current dash ser id from members
	 *
	 * @return int
	 * @author jeffreyhogan
	 **/
	private function setId($user) {
	
		GLOBAL $mysqli;

		$sql = "SELECT id FROM members WHERE username='$user'";
		$id = $mysqli->query($sql);
		$id = $id->fetch_row();

		if ($id) {
			
			return $id;

		} else {

			return false;
		}

	}

	/**
	 * get all the geolocation points for a specific user
	 *
	 * @return object
	 * @author jeffreyhogan
	 **/
	public function getGeo($id) {
	
		

	}

	/**
	 * function for writing a geolocation to the database. Looking for an object returned from google's geolocation api
	 *
	 * @return void
	 * @author jeffreyhogan
	 **/
	public function writeGeo($obj) {


	}



	}

?>