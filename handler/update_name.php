<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$fname = sanitize($_POST['first_name']);
	$lname = sanitize($_POST['last_name']);

	$sql="UPDATE users SET firstname='{$fname}' AND lastname='{$lname}' WHERE email='{$_SESSION['username']}'";
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