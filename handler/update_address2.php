<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$address = sanitize($_POST['address']);

	$sql="UPDATE users SET add2='{$address}' WHERE email='{$_SESSION['username']}'";
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