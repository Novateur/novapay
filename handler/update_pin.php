<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$random = rand(1000,9999);
	$tm = date("Y-m-d H:i:s");
	
	$sql="UPDATE users SET pin='{$random}',pin_date='{$tm}' WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query)
	{
		echo "updated";
	}
	else
	{
		echo "error";
	}

?>