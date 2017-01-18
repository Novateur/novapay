<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = $_POST['id'];

	$sql="DELETE FROM emails WHERE id={$id}";
	$query = $connection->query($sql);
	if($query)
	{
		echo "removed";
	}
	else
	{
		echo "We were unable to remove your email,please try again later";
	}


?>