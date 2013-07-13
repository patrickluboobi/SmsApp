<?php

 #####################################################
 #                                                   #
 #   Written By Luboobi Patrick(Software Engineer)   #
 #                                                   #
 #####################################################

$sender = $_GET['sender'];
$message = $_GET['msgdata'];

	/* Process Message */
	$messageManipulator = new MessageManipulator($message);
	$propertyString = $messageManipulator->compareProperty();
		
	if(strcasecmp($propertyString, "land") == 0){
		$location = $messageManipulator->checkLocation();
		/* query land table in database */
		$query = "select description from land where location ='$location' LIMIT(0, 10)";
		$databaseHelper = new DatabaseHelper();
		$responsetext = $databaseHelper->executeQuery($query);

	}
	elseif(strcasecmp($propertyString, "house") == 0){
		$location = $messageManipulator->checkLocation();
		/* query house table in database */
		$query = "select description from house where location ='$location' LIMIT(0, 10)";
		$databaseHelper = new DatabaseHelper();
		$responsetext = $databaseHelper->executeQuery($query);
		
	}

	else{
		
		$responsetext = "Error, Please type land location or house location eg land kololo";

		}

	/* send message back to user */
	echo "{SMS:TEXT}{}{}{".$sender."}{".$responsetext."}";

?>