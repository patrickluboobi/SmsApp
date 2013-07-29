<?php

/**
 * @author Patrick
 *
 */
class MessageManipulator {

	const LANDSTRING = "land";
	const HOUSESTRING = "house";
	private $messageArray;
	
	/**
	 * @param string $message
	 */
	function __construct($message) {
		
		$this->messageArray = explode(' ', $message);	
	}
	
	/**
	 * @return the $message
	 * @access public
	 */
	public function getMessage () {
		return $this->messageArray;
	}
	
	 
	/**
	 * Checks if first string item of the message is 4 letters( land check)
	 * to substring the first four letters of the message and  5 letters
	 * (house check) to substring the first five letters of the message
	 * 
	 * @return string						First string item
	 * @access public
	 * 
	 */
	function checkProperty() {
		
		$property = $this->messageArray;
		return $property[0];
	}
	
	 
	/**
	 * Checks the second string item of the message to get the
	 * specified location, returns null if message has
	 * less than three string items or is empty
	 * 
	 * @return NULL|string					Second string item if exists else null
	 * 
	 */
	function checkLocation() {
		
		$location = $this->messageArray;
		
		if (count($location) < 2){
			return null;
		}
		
		return $location[1];
	}
	
	
	/**
	 * 
	 * @return string|NULL					Returns land if the first string of
	 * 										the message is 'land' and returns 
	 * 										house if the first string of the 
	 * 										message is 'house' and returns 
	 * 										null if it is neither
	 * 
	 */
	function compareProperty() {
		
		$property = $this->checkProperty($this->messageArray);
		
		if (strcasecmp($property, self::LANDSTRING) == 0)
			return "land";
		elseif (strcasecmp($property, self::HOUSESTRING) == 0)
			return "house";
		
		return null;
	}
	
	
	/**
	 * 
	 * Checks the third string item of the message to get the price
	 * 
	 * @return NULL|string					returns price, returns null if message
	 * 										has one string or is empty
	 * 
	 */
	function checkPrice() {
		$price = $this->messageArray;	
		
		if (count($price) < 3){
			return null;
		}
		
		return $price[2];	
	}
	
	
	/**
	 * @return string						The error message
	 */
	function printError() {
		$errorMessage ="Error, Please type land location or house location eg land kololo";
		return $errorMessage;
	}
}

?>