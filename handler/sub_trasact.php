<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	require ("../PHPMailer/PHPMailerAutoload.php");
	
	
	$amount = sanitize($_POST['amount']);
	$user_id = get_user_id();
	$receiver_id = $_POST['id'];
	$card_num = sanitize($_POST['card_num']);
	$email= sanitize($_POST['email']);
	$my_email= get_email();
	$code = rand(1000,100000000000);
	$t = time();
	$day = strftime("%d",$t);
	$month = date("M");
	$year = strftime("%Y",$t);
	$time1 = date("H:i:s");
	$name = get_user_firstname($_POST['id'])." ".get_user_lastname($_POST['id']);
	$sender_name = get_firstname($user_id)." ".get_lastname($user_id);
	//$time1 = date("Y-m-d H:i:s");

	$sql="INSERT INTO pending_transact (amount,card_num,code,status,user_id,receiver_id,day,month,year,time1,name,sender_name) VALUES 
	('{$amount}','{$card_num}','{$code}',0,'{$user_id}','{$receiver_id}','{$day}','{$month}','{$year}','{$time1}','{$name}','{$sender_name}')";
	$query = $connection->query($sql);
	if($query)
	{
		$mail = new PHPMailer;
		
		$mail->isSMTP();                                   // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                            // Enable SMTP authentication
		$mail->Username = 'akobundumichael94@gmail.com';          // SMTP username
		$mail->Password = 'akobundumic?'; // SMTP password
		$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                 // TCP port to connect to

		$mail->setFrom('info@novateur.ng', 'Novateur Nigeria');
		$mail->addReplyTo('info@novateur.ng', 'Novateur Nigeria');
		$mail->addAddress($my_email);   // Add a recipient
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		$mail->isHTML(true);  // Set email format to HTML
		
		$bodyContent = "<h1>Confirm transaction pin</h1>";
		$bodyContent .= "<p>To acknowledge the payment transaction that was made with your account login to 'our url goes here' 
		and use this pin <b>{$code}</b></p>";

		$mail->Subject = "transaction verification from Payment";
		$mail->Body    = $bodyContent;
		
		if(!$mail->send()) 
		{
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} 
		else 
		{
			echo "added";
		}
	}
	else
	{
		echo "error";
	}


?>