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
	 * @return PDO							For successsful database connection
	 */
	function createConnection() {
		try {
	
			return new PDO("mysql:host=localhost;dbname=Property", "root", "");
	
		} catch (PDOException $e) {
	
			echo "Connection error: ".$e->getMessage();
		}
	}
	
	/**
	 * @param string $query
	 * 
	 * @return string $message				Default "Area not Found" if there are
	 * 										no results	from the query else pass
	 * 										the result to the message and return
	 * 										the message
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