<?php

class MessageManipulator {

	const LANDSTRING = "land";
	const HOUSESTRING = "house";
		
	function __construct() {
	
	}
	function checkProperty($message) {
	
		$property = substr($message, 0, 4);
		return $property;
	}
	function checkLocation($message) {
		
		$length = ((strlen($message))-1);
		$location = substr($message, 5, $length);
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