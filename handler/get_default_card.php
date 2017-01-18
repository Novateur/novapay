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
			$last_four = substr($r['card_num'],-4);
			if($r['type']=="MasterCard")
			{
				echo "MasterCard x-".$last_four."<br/><br/>";
			}			
			if($r['type']=="Visa")
			{
				echo "Visa x-".$last_four."<br/>";
			}			
			if($r['type']=="Verve")
			{
				echo "<i class='fa fa-cc-visa'></i>Verve x-".$last_four."<br/><br/>";
			}			
			if($r['type']=="Genesis")
			{
				echo "Genesis x-".$last_four."<br/>";
			}
		}
	}
	else
	{
		echo "Select a card (click the arrow icon at the top)";
	}


?>