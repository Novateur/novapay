<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$card_num = sanitize($_POST['card_num']);
	$acc_number=sanitize($_POST['acc_number']);
	$bank=sanitize($_POST['bank']);
	$type=sanitize($_POST['type']);
	$user_id=get_user_id();
	if(isset($_POST['default']) && !empty($_POST['default']))
	{
		$sql="UPDATE cards SET status=NULL WHERE user_id={$user_id}";
		$query = $connection->query($sql);
		if($query)
		{
			$sql = "INSERT INTO cards (card_num,acc_number,bank,type,user_id,status) 
			VALUES ('{$card_num}','{$acc_number}','{$bank}','{$type}','{$user_id}','default')";
			$query = $connection->query($sql);
			if($query)
			{
				//$_SESSION['username']=$email;
				echo "inserted";
			}
			else
			{
				echo "Error:sorry,we couldn't add a add to your account please try again";
			}
		}
		else
		{
			echo "Error:sorry,we couldn't set this card as your default card";
		}
	}
	else
	{
		$sql = "INSERT INTO cards (card_num,acc_number,bank,type,user_id) 
		VALUES ('{$card_num}','{$acc_number}','{$bank}','{$type}','{$user_id}')";
		$query = $connection->query($sql);
		if($query)
		{
			//$_SESSION['username']=$email;
			echo "inserted";
		}
		else
		{
			echo "Error:sorry,we couldn't add a add to your account please try again";
		}
	}

?>