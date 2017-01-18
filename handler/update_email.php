<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$email = sanitize($_POST['email']);
	$id = sanitize($_POST['id']);

	$sql="UPDATE emails SET email='{$email}' WHERE id={$id}";
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