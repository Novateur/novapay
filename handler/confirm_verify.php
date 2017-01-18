<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	require ("../PHPMailer/PHPMailerAutoload.php");
	
	$mail = new PHPMailer;
		
	$email = sanitize($_POST['email']);
	$veri_code = rand(100000,999999);
	$encrypt_veri_code = base64_encode($veri_code);
	
	$mail->isSMTP();                                   // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                            // Enable SMTP authentication
	$mail->Username = 'akobundumichael94@gmail.com';          // SMTP username
	$mail->Password = 'akobundumic?'; // SMTP password
	$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                 // TCP port to connect to

	$mail->setFrom('info@payment.com', 'Payment');
	$mail->addReplyTo('info@payment.com', 'Payment');
	$mail->addAddress($email);   // Add a recipient
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	$sql = "UPDATE users SET veri_code='{$veri_code}' WHERE email='{$email}'";
	$query = $connection->query($sql);
	if($query)
	{
				$mail->isHTML(true);  // Set email format to HTML
	
				$bodyContent = "<h1>Novapay payment account verification</h1>";
				$bodyContent .= "<p>You've successfully registered with novapay your verification code is <b>{$veri_code}</b> <br/> or you can also follow the link http://127.0.0.1/payment/handler/verify_account.php?con_code=".$encrypt_veri_code."</p>";

				$mail->Subject = "Account verification";
				$mail->Body    = $bodyContent;

				if(!$mail->send()) {
					echo 'Message could not be sent due to network loss please do try again later.';
					//echo 'Mailer Error: ' . $mail->ErrorInfo;
				} else {
					echo "inserted";
				}
		
	}
	else
	{
		echo "Error:sorry,we couldn't add a add to your account please try again";
	}

?>