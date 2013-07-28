<?php

require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once('../classes/MessageManipulator.php');

class TestOfMessageManipulation extends UnitTestCase {
	function testFirstMessageManipulatorIfNonexistent() {
		@unlink(dirname(__FILE__) . '/../temp/test.log');
		$MessageManipulator = new MessageManipulator("land kampala");
		$this->assertTrue($MessageManipulator);
	}
	
	function testStringpasedInConstructor() {
		$MessageManipulator = new MessageManipulator("land kampala");
		$messageString = $MessageManipulator->getMessage();
		$this->assertEqual("land kampala", $messageString);
	}
	
	function testStringReturnedFromcheckPropertyWhenGivenLandWithoutArea() {
		$MessageManipulator = new MessageManipulator("land");
		$messageString = $MessageManipulator->checkProperty();
		$this->assertEqual("land", $messageString);
	}
	

	function testStringReturnedFromcheckPropertyWhenGivenOneStringItemOfThreeLetters() {
		$MessageManipulator = new MessageManipulator("lan");
		$messageString = $MessageManipulator->checkProperty();
		$this->assertEqual("lan", $messageString);
	}
	
	function testStringReturnedFromcheckPropertyWhenGivenLandAndArea() {
		$MessageManipulator = new MessageManipulator("land kampala");
		$messageString = $MessageManipulator->checkProperty();
		$this->assertEqual("land", $messageString);
	}
	
	function testStringReturnedFromcheckPropertyForHouseWhenGivenTwoStrings() {
		$MessageManipulator = new MessageManipulator("house kampala");
		$messageString = $MessageManipulator->checkProperty();
		$this->assertEqual("house", $messageString);
	}
	
	function testStringReturnedFromcheckPropertyForHouseWhenGivenThreeStrings() {
		$MessageManipulator = new MessageManipulator("house kampala munyonyo");
		$messageString = $MessageManipulator->checkProperty();
		$this->assertEqual("house", $messageString);
	}
	 
	function testStringReturnedFromcheckLocationWhenGivenANullString() {
		$MessageManipulator = new MessageManipulator(null);
		$messageString = $MessageManipulator->checkLocation();
		$this->assertEqual(null, $messageString);
	}
	
	
	function testStringReturnedFromcheckLocationWhenGivenAnEmptyString() {
		$MessageManipulator = new MessageManipulator("");
		$messageString = $MessageManipulator->checkLocation();
		$this->assertEqual(null, $messageString);
	}
	
	function testStringReturnedFromcheckLocationWhenGivenOneStringValue() {
		$MessageManipulator = new MessageManipulator("land");
		$messageString = $MessageManipulator->checkLocation();
		$this->assertEqual(null, $messageString);
	} 
	
	function testStringReturnedFromcheckLocationWhenGivenLand() {
		$MessageManipulator = new MessageManipulator("land kampala");
		$messageString = $MessageManipulator->checkLocation();
		$this->assertEqual("kampala", $messageString);
	}
	
	function testStringReturnedFromcheckLocationWhenGivenHouse() {
		$MessageManipulator = new MessageManipulator("house kampala");
		$messageString = $MessageManipulator->checkLocation();
		$this->assertEqual("kampala", $messageString);
	}
	
	function testStringReturnedFromcheckLocationForHouseWhenGivenThreeStrings() {
		$MessageManipulator = new MessageManipulator("house kampala munyonyo");
		$messageString = $MessageManipulator->checkLocation();
		$this->assertEqual("kampala", $messageString);
	}
	
	function testStringReturnedFromcheckPropertyWhenGivenAnEmptyStrring() {
		$MessageManipulator = new MessageManipulator("");
		$messageString = $MessageManipulator->compareProperty();
		$this->assertEqual(null, $messageString);
	}
	
	function testStringReturnedFromcomparePropertyWhenFedGabbage() {
		$MessageManipulator = new MessageManipulator("skhjgsjkdf cmvhhx nmabscbbk");
		$messageString = $MessageManipulator->compareProperty();
		$this->assertEqual(null, $messageString);
	}
	
	function testStringReturnedFromcomparePropertyWhenGivenLand() {
		$MessageManipulator = new MessageManipulator("land makerere");
		$messageString = $MessageManipulator->compareProperty();
		$this->assertEqual("land", $messageString);
	}
	
	function testStringReturnedFromcomparePropertyWhenGivenHouse() {
		$MessageManipulator = new MessageManipulator("house makerere");
		$messageString = $MessageManipulator->compareProperty();
		$this->assertEqual("house", $messageString);
	}
	
	function testStringReturnedFromcheckPriceWhenGivenEmptyString() {
		$MessageManipulator = new MessageManipulator("");
		$messageString = $MessageManipulator->checkPrice();
		$this->assertEqual(null, $messageString);
	}
	
	function testStringReturnedFromcheckPriceWhenGivenTwoStrings() {
		$MessageManipulator = new MessageManipulator("land Kampala");
		$messageString = $MessageManipulator->checkPrice();
		$this->assertEqual(null, $messageString);
	}
	
	function testStringReturnedFromcheckPriceWhenGivenOneString() {
		$MessageManipulator = new MessageManipulator("land");
		$messageString = $MessageManipulator->checkPrice();
		$this->assertEqual(null, $messageString);
	}
	
	function testStringReturnedFromcheckPriceWhenGivenThreeStrings() {
		$MessageManipulator = new MessageManipulator("land Kampala 5000000");
		$messageString = $MessageManipulator->checkPrice();
		$this->assertEqual("5000000", $messageString);
	}
}	

?>