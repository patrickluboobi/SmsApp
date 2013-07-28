<?php

 ########################################################
 ##                                                    ##
 ##   Written By Luboobi Patrick (Software Engineer)   ##
 ##                                                    ##
 ########################################################

	$sender = $_GET['sender'];
	$message = $_GET['msgdata'];
	
	function __autoload($classname){
		require ($classname.'.php');
	
	} 
	
	/* 
	 * Process Message
	 * 
	 *  */
	$messageManipulator = new MessageManipulator($message);
	$propertyString = $messageManipulator->compareProperty();
	
	if(strcasecmp($propertyString, "land") == 0){
		$location = $messageManipulator->checkLocation();
		
		if ($location != null) {
			$price = $messageManipulator->checkPrice();
			
			if ($price != null) {
								
				/*
				 *  query land table in database
				*
				*  */
				
				$query = "SELECT description FROM land WHERE location ='$location' LIMIT 0,10";
				$databaseHelper = new DatabaseHelper();
				$responsetext = $databaseHelper->executeQuery($query);
			}
						
		}
		else 
			$responsetext = $messageManipulator->printError();
		
	}
	elseif(strcasecmp($propertyString, "house") == 0){
		$location = $messageManipulator->checkLocation();
		
		if ($location != null) {
			$price = $messageManipulator->checkPrice();
			
			if ($price != null) {
								
				/*
				 *  query house table in database
				*
				*  */
				$query = "SELECT description FROM house WHERE location ='$location' LIMIT 0, 10";
				$databaseHelper = new DatabaseHelper();
				$responsetext = $databaseHelper->executeQuery($query);
			}
			
		}
		else 
			$responsetext = $messageManipulator->printError();
		
		
	}

	else{
		
		$responsetext = $messageManipulator->printError();

		}

	/* 
	 * send message back to user 
	 * 
	 * */
	echo "{SMS:TEXT}{}{}{".$sender."}{".$responsetext."}";

?>