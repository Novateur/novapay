<?php

$selector = "MAnchy1";
if (preg_match('/^[0-9A-Za-z]/', $selector)) 
{
	echo "All found";
}
else
{
	echo "All not found";
}

?>