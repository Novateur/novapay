<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	
	$question = sanitize($_POST['a']);
	$hint = sanitize($_POST['hint']);
	$answer = sanitize($_POST['answer']);
	
	$sql="UPDATE users SET question='{$question}',hint='{$hint}',answer='{$answer}' WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query)
	{
		echo "updated";
	}
	else
	{
		echo "error";
	}

?>