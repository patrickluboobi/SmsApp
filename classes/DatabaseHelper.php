<?php
class DatabaseHelper {
	
	private $responsetext;
	
	function __construct() {
		
		$this->setResponsetext("Area not found");
	}
	

	/**
	 * @return the $responsetext
	 */
	public function getResponsetext() {
		return $this->responsetext;
	}

	/**
	 * @param field_type $responsetext
	 */
	public function setResponsetext($responsetext) {
		$this->responsetext = $responsetext;
	}

	/**
	 * Connect to server and the database   
	 */
	function createConnection() {
		try {
	
			return new PDO("mysql:host=localhost;dbname=Property", "root", "");
	
		} catch (PDOException $e) {
	
			echo "Connection error: ".$e->getMessage();
		}
	}
	/**
	 * Execute the query returning the string as a numbered list of 
	 * property descriptions and returning the default "area not found"
	 * response if the location does not exist in the database.
	 * 
	 */
	function executeQuery($query) {
				
		$dbh = $this->createConnection();
		$statementHandler = $dbh->query($query);
		$result = $statementHandler->fetchAll(PDO::FETCH_ASSOC);
		
		if($result){
			$returnedString = null;
			$i = 0;
			
			foreach ($result as $row){
				$i++;			
				$returnedString = $returnedString.$i.'. '.$row['description'];
			}
		
		$this->setResponsetext($returnedString);
		}		 
		
		//$dbh = null;
		return $this->getResponsetext();
		
	}
	
}

?>