<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$sql="SELECT pin FROM users WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			if($r['pin']!="")
			{	
				echo $r['pin'];
			}
			else
			{
				echo "<button type='button' id='get_pin' onclick=\"update_pin()\" class='btn btn-danger btn-rounded btn-sm'>Get pin</button>";
			}
		}
	}
	else
	{
		//echo "<button type='button' id='get_pin' onclick=\"get_pin()\">Get pin</button>";
	}
?>