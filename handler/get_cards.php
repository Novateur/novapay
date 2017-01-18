<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = get_user_id();
	
	$sql="SELECT * FROM cards WHERE user_id={$id}";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			$last_four = substr($r['card_num'],-4);
			if($r['type']=="MasterCard")
			{
				echo "<div class='row'>";
					echo "<div class='col-sm-12'>";
						echo "<img src='images/mastercard.svg' width='35' height='35'/> MasterCard x-".$last_four."<br/><br/>";
					echo "</div>";
				echo "</div>";
			}			
			if($r['type']=="Visa")
			{
				echo "<div class='row'>";
					echo "<div class='col-sm-12'>";
						echo "<img src='images/visa.svg' width='35' height='35'/> Visa x-".$last_four."<br/><br/>";
					echo "</div>";
				echo "</div>";
			}			
			if($r['type']=="Verve")
			{
				echo "<div class='row'>";
					echo "<div class='col-sm-12'>";
						echo "<img src='images/verve.png' width='35' height='25'/> Verve x-".$last_four."<br/><br/>";
					echo "</div>";
				echo "</div>";
			}			
			if($r['type']=="Genesis")
			{
				echo "<div class='row'>";
					echo "<div class='col-sm-12'>";
						echo "<i class='fa fa-cc-visa'></i>Genesis x-".$last_four."<br/><br/>";
					echo "</div>";
				echo "</div>";
			}
		}
		//echo"<button class='btn btn-default btn-sm btn-rounded' style='border:1px solid red' onclick=\"$('#add_more').modal('show')\"><i class='fa fa-plus'></i> More</button>";
	}
	else
	{
		echo "You've not added any card yet,please add a card to perform transactions";
	}


?>