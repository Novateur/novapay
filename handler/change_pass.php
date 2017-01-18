<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	
	$current_pass=sha1(md5($_POST['current_pass']));
	$new_pass=sha1(md5($_POST['new_pass']));
	
	if(confirm_pass($current_pass))
	{
		$sql="UPDATE users SET password='{$new_pass}' WHERE email='{$_SESSION['username']}'";
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
		echo "We couldn't find the password you inputed in our record (Incorrect password)";
	}
?>