<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = sanitize($_POST['id']);
	
	$sql="DELETE FROM cards WHERE id={$id}";
	$query=$connection->query($sql);
	if($query)
	{
		echo "deleted";
	}
	else
	{
		echo "Error: An error occured while trying to delete your card,please try again later";
	}
?>