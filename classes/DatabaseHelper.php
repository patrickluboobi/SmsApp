<?php
class DatabaseHelper {
	
	private $responsetext;
	
	function __construct() {
		
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
	
			return new PDO("mysql:host=localhost;dbname=land", "root", "", "");
	
		} catch (PDOException $e) {
	
			echo "Connection error: ".$e->getMessage();
		}
	}
	function executeQuery($query) {
				
		$this->setResponsetext("Area not found");
		
		$dbh = $this->createConnection();
		$statementHandler = $dbh->query($query);
		$result = $statementHandler->fetchAll(PDO::FETCH_ASSOC);
		
		if ($result) 
			$this->setResponsetext($result['description']);
		
		return $this->getResponsetext();
	}
	
}

?>