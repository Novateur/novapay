<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$phone = sanitize($_POST['phone']);
	$id = get_user_id();

	$sql="INSERT INTO phones(phones,user_id) VALUES ('{$phone}',{$id})";
	$query = $connection->query($sql);
	if($query)
	{
		echo "added";
	}
	else
	{
		echo "Error: We couldn't add your new phone number,please try again later";
	}


?>