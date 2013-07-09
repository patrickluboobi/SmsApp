<?php

class MessageManipulator {

	const LANDSTRING = "land";
	const HOUSESTRING = "house";
		
	function __construct() {
	
	}
	function checkProperty($message) {
		$property = substr($message, 0, 4);
		$stringArray = explode(' ', $message);
		if (strlen($stringArray[1]) == 5) {
			$property = substr($message, 0, 5);
		}
		
		return $property;
	}
	function checkLocation($message) {
		
		$stringArray = explode(' ', $message);
		$location = $stringArray[2];
		return $location;
		
	}
	function compareProperty($message) {
		
		$property = $this->checkProperty($message);
		if (strcasecmp($property, self::LANDSTRING) == 0)
			return "land";
		elseif (strcasecmp($property, self::HOUSESTRING) == 0)
			return "house";
		
		return null;
	}		
	
}

?>