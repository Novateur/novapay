<?php
		
	$gap=30;
	$tm1=date("Y-m-d H:i:s", mktime(date("H"),date("i")-$gap,date("s"),date("m"),date("d"),date("Y")));
	$que ="UPDATE users SET pin=NULL WHERE pin_date <'{$tm1}'";
	$query1=$connection->query($que);
	
?>