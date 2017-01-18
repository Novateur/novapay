<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = get_user_id();

	$sql="SELECT * FROM cards WHERE user_id={$id} AND status='default'";
	$query = $connection->query($sql);
	if($query->rowCount()==1)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			echo $r['card_num'];
		}
	}
	else
	{
		echo "Undefined:kindly add a card";
	}


?>