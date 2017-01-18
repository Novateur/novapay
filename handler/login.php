<?php
	ob_start();
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$email=$_POST['email'];
	$password=sha1(md5($_POST['password']));
	if(check_activated($email))
	{
		if(!check_login_card($email))
		{
			$_SESSION['username']=$email;
			echo "cardless";
		}
		else
		{
			$_SESSION['username']=$email;
			echo "deactivated";
		}
	}
	else
	{
		$sql="SELECT * FROM users WHERE email='{$email}' AND password='{$password}' AND status=0";
		$query = $connection->query($sql);
		if($query->rowCount()==1)
		{
			$_SESSION['username']=$email;
			echo "yes";
		}
		else
		{
			echo "no";
		}
	}
?>