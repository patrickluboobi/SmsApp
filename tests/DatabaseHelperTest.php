<?php
require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once('../classes/DatabaseHelper.php');

class TestOfMessageManipulation extends UnitTestCase {
	
	function testFirstDatabaseHelperIfNonexistent() {
		@unlink(dirname(__FILE__) . '/../temp/test.log');
		$databaseHelper = new DatabaseHelper();
		$this->assertTrue($databaseHelper);
	}
	
	function testDefaultMessageInTheconstructor() {
		$databaseHelper = new DatabaseHelper();
		$this->assertEqual("Area not found", $databaseHelper->getResponsetext());
	}
	
	function testSetMessageFunction() {
		$databaseHelper = new DatabaseHelper();
		$databaseHelper->setResponsetext("New Response");
		$this->assertEqual("New Response", $databaseHelper->getResponsetext());
	}
	
	function testDatabaseConnection() {
		$databaseHelper = new DatabaseHelper();
		$this->assertTrue($databaseHelper->createConnection());
	}
	
	function testResultWhenAreaIsNotInDatabase() {
		$databaseHelper = new DatabaseHelper();
		$this->assertEqual("Area not found", $databaseHelper->executeQuery("SELECT description FROM land WHERE location = 'noArea'"));
	}
	
	function testResultWhenAreaIsEmpty() {
		$databaseHelper = new DatabaseHelper();
		$this->assertEqual("Area not found", $databaseHelper->executeQuery("SELECT description FROM land WHERE location = 'noArea'"));
	}
	
	function testResultWhenAreaExists() {
		$databaseHelper = new DatabaseHelper();
		$this->assertEqual("1. 3 acres near st James Primary school", $databaseHelper->executeQuery("SELECT description FROM land WHERE location = 'mukono'"));
	}
}

?>