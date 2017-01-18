<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$phone = sanitize($_POST['phone']);
	$id = sanitize($_POST['id']);

	$sql="UPDATE phones SET phones='{$phone}' WHERE id={$id}";
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