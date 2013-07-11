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
	function executeQuery($query) {
				
		$dbh = $this->createConnection();
		$statementHandler = $dbh->query($query);
		$result = $statementHandler->fetchAll(PDO::FETCH_ASSOC);
		
		if ($result) 
			$this->setResponsetext($result['description']);
		
		return $this->getResponsetext();
	}
	
}

?>