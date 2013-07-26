<?php

class MessageManipulator {

	const LANDSTRING = "land";
	const HOUSESTRING = "house";
	private $message;
	
	function __construct($message) {
		
		$this->message = $message;	
	}
	
	/**
	 * @return the $message
	 */
	public function getMessage () {
		return $this->message;
	}
	
	
	 // Checks if first string item of the message is 4 letters( land check)
	 // to substring the first four letters of the message and  5 letters
	 // (house check) to substring the first five letters of the database
	 
	function checkProperty() {
		$property = substr($this->message, 0, 4);
		
		$messageArray = explode(' ', $this->message);
		
		if ((strlen($messageArray[0])) == 5) {
			$property = substr($this->message, 0, 5);

		}
		return $property;
	}
	
	
	 // Checks the last string item of the message to get the
	 // specified location, returns null if message has 
	 // one string or is empty  
	 
	function checkLocation() {
		
		$stringArray = explode(' ', $this->message);
		
		if (count($stringArray) < 2){
			return null;
		}
		
		$location = $stringArray[1];
		return $location;
		
	}
	
	 // Returns land if the first string of the message is 'land' and
	 // returns house if the first string of the message is 'house' and
	 // returns null if it is neither
	
	function compareProperty() {
		
		$property = $this->checkProperty($this->message);
		
		if (strcasecmp($property, self::LANDSTRING) == 0)
			return "land";
		elseif (strcasecmp($property, self::HOUSESTRING) == 0)
			return "house";
		
		return null;
	}		
	
}

?>