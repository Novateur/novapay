<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	if(isset($_POST['con_code']))
	{
		$code = sanitize($_POST['con_code']);
	}	
	if(isset($_GET['con_code']))
	{
		$decoded_url = base64_decode($_GET['con_code']);
		$code = sanitize($decoded_url);
	}
	
	$sql="UPDATE users SET status=0 WHERE veri_code='{$code}'";
	$query = $connection->query($sql);
	if($query)
	{
		$sql="SELECT email FROM users WHERE veri_code='{$code}'";
		$query = $connection->query($sql);
		if($query->rowCount()>0)
		{
			$query->setFetchMode(PDO::FETCH_ASSOC);
			foreach($query as $r)
			{
				$_SESSION['username']=$r['email'];
				echo "verified";
			}
		}
		else
		{
			echo "error";
		}
	}
	else
	{
		echo "Account not found";
	}
	
?>