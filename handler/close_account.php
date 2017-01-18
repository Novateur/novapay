<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");

	$sql="UPDATE users SET status=1 WHERE email='{$_SESSION['username']}'";
	$query = $connection->query($sql);
	if($query)
	{
		$_SESSION=array();
		if(isset($_COOKIE[session_name()]))
		{
			setcookie(session_name(),'',time()-42000,'/');
		}
		session_destroy();
		echo "closed";
	}
	else
	{
		echo "Error: We couldn't delete your account, try again later";
	}


?>