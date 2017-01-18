<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$nation = sanitize($_POST['nation']);

	$sql="UPDATE users SET nationality='{$nation}' WHERE email='{$_SESSION['username']}'";
	$query = $connection->query($sql);
	if($query)
	{
		echo "updated";
	}
	else
	{
		echo "Error: We couldn't update your profile,try again later";
	}


?>