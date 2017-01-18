<?php
include ( "NexmoMessage.php" );
/**
* To send a text message.
*
*/
// Step 1: Declare new NexmoMessage.
$nexmo_sms = new NexmoMessage('edd67578', 'f04d3ea883cbf242');
// Step 2: Use sendText( $to, $from, $message ) method to send a message.
$info = $nexmo_sms->sendText( '2347038988434', 'Novapay', 'Welcome to novapay your verification code is xxxx this lasts for 10 minutes' );
// Step 3: Display an overview of the message
echo $nexmo_sms->displayOverview($info);
// Done!
?>