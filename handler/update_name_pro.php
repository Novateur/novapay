<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$fname = sanitize($_POST['fname']);
	$lname = sanitize($_POST['lname']);

	$sql="UPDATE users SET firstname='{$fname}',lastname='{$lname}' WHERE email='{$_SESSION['username']}'";
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