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
		 * get all the friends for a specific user
		 *
		 * @return object
		 * @author jeffreyhogan
		 **/
		public function show_friends($id) {

			$names = array();
		
			GLOBAL $mysqli;

			$sql = "SELECT name FROM friends WHERE user_id='$id[0]'";

			$results = $mysqli->query($sql);

			while($row = $results->fetch_row()) {
			
				array_push($names, $row[0]);
				
			}

			return $names;

		}




	}

?>