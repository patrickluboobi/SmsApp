<?php

$sender = $_GET['sender'];
$message = $_GET['msgdata'];

if ($sender!='') {


	/* Return a response SMS message */

	/* Process Message */
	$messageManipulator = new MessageManipulator($message);
	$propertyString = $messageManipulator->compareProperty();
		
	if(strcasecmp($propertyString, "land") == 0){
		$location = $messageManipulator->checkLocation();
		/* query land table in database */
		$query = "select description from land where location ='$location'";
		$databaseHelper = new DatabaseHelper();
		$responsetext = $databaseHelper->executeQuery($query);

	}
	elseif(strcasecmp($propertyString, "house") == 0){
		$location = $messageManipulator->checkLocation();
		/* query house table in database */
		$query = "select description from house where location ='$location'";
		$databaseHelper = new DatabaseHelper();
		$responsetext = $databaseHelper->executeQuery($query);
		
	}

	else{
		
		$responsetext = "Please type land location or house location eg land kololo";

		}

	/* send message back to user */
	echo "{SMS:TEXT}{}{}{".$sender."}{".$responsetext."}";

}

else{

	echo "The PHP script is ready for accepting messages";
}

?>