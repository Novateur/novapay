<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$email = sanitize($_POST['email']);
	$id = get_user_id();

	$sql="INSERT INTO emails(email,user_id) VALUES ('{$email}',{$id})";
	$query = $connection->query($sql);
	if($query)
	{
		echo "added";
	}
	else
	{
		echo "Error: We couldn't add your new email address,please try again later";
	}


?>