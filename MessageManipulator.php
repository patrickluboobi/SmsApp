<?php

class MessageManipulator {

	const LANDSTRING = "land";
	const HOUSESTRING = "house";
	private $message;
	
	function __construct($message) {
		
		$this->message = $message;	
	}
	
	function checkProperty() {
		$property = substr($this->message, 0, 4);
		$stringArray = explode(' ', $this->message);
		if (strlen($stringArray[1]) == 5) {
			$property = substr($this->message, 0, 5);
		}
		
		return $property;
	}
	function checkLocation() {
		
		$stringArray = explode(' ', $this->message);
		$location = $stringArray[2];
		return $location;
		
	}
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