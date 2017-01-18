<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$fname = sanitize($_POST['first_name']);
	$lname=sanitize($_POST['last_name']);
	$dob=sanitize($_POST['dob']);
	$nationality=sanitize($_POST['nationality']);
	$add1=sanitize($_POST['add1']);
	$add2=sanitize($_POST['add2']);
	$phone=sanitize($_POST['phone']);
	$password=sha1(md5($_POST['password']));
	$email=sanitize($_POST['email']);
	$t = time();
	$date_time = strftime("%Y",$t);
	$code = rand(100000,999999);
	
	if(check_email($email))
	{
		echo "You already have an account with us please login in with your details <a href='login.php'>Login</a>";
	}
	else
	{
		$sql = "INSERT INTO users (firstname,lastname,dob,nationality,add1,add2,phone,password,email,photo,joined,status,veri_code) 
		VALUES ('{$fname}','{$lname}','{$dob}','{$nationality}','{$add1}','{$add2}','{$phone}','{$password}','{$email}','avatar_2.png','{$date_time}',1,'{$code}')";
		$query = $connection->query($sql);
		if($query)
		{
			$_SESSION['username']=$email;
			echo "inserted";
		}
		else
		{
			echo "Error:sorry,we couldn't create your account";
		}
	}

?>