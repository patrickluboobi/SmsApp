<?php

/**
 * @author Patrick
 *
 */
class MessageManipulator {

	const LANDSTRING = "land";
	const HOUSESTRING = "house";
	private $message;
	
	function __construct($message) {
		
		$this->message = $message;	
	}
	
	/**
	 * @return the $message
	 * @access public
	 */
	public function getMessage () {
		return $this->message;
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
		$property = substr($this->message, 0, 4);
		
		$messageArray = explode(' ', $this->message);
		
		if ((strlen($messageArray[0])) == 5) {
			$property = substr($this->message, 0, 5);

		}
		return $property;
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
		
		$stringArray = explode(' ', $this->message);
		
		if (count($stringArray) < 2){
			return null;
		}
		
		$location = $stringArray[1];
		return $location;
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
		
		$property = $this->checkProperty($this->message);
		
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
		
		$stringArray = explode(' ', $this->message);
		
		if (count($stringArray) < 3){
			return null;
		}
		
		$price = $stringArray[2];
		return $price;	
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