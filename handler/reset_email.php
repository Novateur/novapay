<?php
	//require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	require ("../PHPMailer/PHPMailerAutoload.php");

	$mail = new PHPMailer;

	$email = sanitize($_POST['reset_email']);
	$random = rand(1000,100000);
	
	$sql1="SELECT email FROM users WHERE email='{$email}'";
	$query1 = $connection->query($sql1);
	if($query1->rowCount()==1)
	{
		$sql="UPDATE users SET password='{$random}' WHERE email='{$email}'";
		$query = $connection->query($sql);
		if($query)
		{
			$mail->isSMTP();                                   // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                            // Enable SMTP authentication
			$mail->Username = 'akobundumichael94@gmail.com';          // SMTP username
			$mail->Password = 'akobundumic?'; // SMTP password
			$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                 // TCP port to connect to

			$mail->setFrom('email@codexworld.com', 'CodexWorld');
			$mail->addReplyTo('email@codexworld.com', 'CodexWorld');
			$mail->addAddress($email);   // Add a recipient
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			$mail->isHTML(true);  // Set email format to HTML
			
			$bodyContent = "<h1>Invitation as a vendor by </h1>";
			$bodyContent .= "<p>This is the HTML email sent from localhost using PHP script by <b>Novateur Nigeria</b></p>";

			$mail->Subject = "Email from Localhost by Novateur Nigeria";
			$mail->Body    = $bodyContent;

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				echo 'sent';
			}
		}
	}
	else
	{
		echo "Sorry you do not have an account with us,click <b><a href='account_type.php'>here</a></b> to open an account";
	}
?>