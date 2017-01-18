<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	
	$card = sanitize($_POST['card']);
	$id = get_user_id();
	
	$sql="UPDATE cards SET status=NULL WHERE user_id={$id}";
	$query=$connection->query($sql);
	if($query)
	{
		$sql="UPDATE cards SET status='default' WHERE id='{$card}'";
		$query=$connection->query($sql);
		if($query)
		{
			echo "updated";
		}
		else
		{
			echo "error";
		}
	}
	else
	{
		echo "error";
	}
?>