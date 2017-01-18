<?php

	require_once("../includes/functions.php");
	require ("../PHPMailer/PHPMailerAutoload.php");
	
	$mail = new PHPMailer;

	$email = $_POST['email'];
	$amount = $_POST['amount'];
	$my_name = $_POST['name'];
	$desc = $_POST['desc'];
	
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

	$mail->isHTML(true);  // Set email format to HTML
	
	$bodyContent = "<h1>Novapay payment request system</h1>";
	$bodyContent .= "<p><b>{$my_name}</b> is requesting for a payment of <b>NGN {$amount}</b></p>
	<p><b>Description:</b>{$desc}</p>";

	$mail->Subject = "Request for payment";
	$mail->Body    = $bodyContent;

	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'sent';
	}
?>