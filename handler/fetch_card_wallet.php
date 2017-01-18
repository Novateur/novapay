<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = get_user_id();
	$sql = "SELECT * FROM cards WHERE user_id={$id}";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{	
		echo "<div class='row'>";
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			$last_four = substr($r['card_num'],-4);
			echo "<a href='#' dropdown-toggle' data-toggle='dropdown'><div class='col-md-3 col-sm-6'>
				<div class='panel b-a' style='border-radius:7px;background-color:#gray'>
					<div class='panel-heading no-border bg-default lt' style='height:100px'>
						<p style='color:#5bc0de;margin-top:30px;font-size:20px' class='text-center'>XXXX-XXXX-XXXX-{$last_four}</p>
					</div>
					<div class='padder-v text-center clearfix' style='height:20px;background-color:#fff;border-radius:7px'>                            
						<div class='col-xs-12 b-r'>
							<p class='text-muted pull-right' style='margin-top:-10px'>";
								if($r['type']=="MasterCard")
								{
									echo "<img src='images/mastercard.svg' width='35' height='35' style='margin-top:-10px'/>";
								}								
								if($r['type']=="Visa")
								{
									echo "<img src='images/visa.svg' width='35' height='35' style='margin-top:-10px'/>";
								}								
								if($r['type']=="Verve")
								{
									echo "<img src='images/verve.png' width='35' height='25' style='margin-top:-10px'/>";
								}								
								if($r['type']=="Genesis")
								{
									echo $r['type'];
								}
							echo"</p>
						</div>
					</div>
					<ul class='dropdown-menu pull-right'>
						<span class='arrow top'></span>
						<li><a href='#' onclick=\"del_card({$r['id']})\"><i class='i i-trashcan'></i> Delete</a></li>
					</ul>
				</div>
			</div></a>";
		}
			echo "<a href='#' onclick=\"$('#add_more').modal('show')\" style='color:#5bc0de'><div class='col-md-3 col-sm-6'>
				<div class='panel b-a'>
					<div class='panel-heading no-border bg-default lt' style='height:100px'>
						<p style='color:#5bc0de;margin-top:15px;font-size:50px' class='text-center'>+</p>
					</div>
					<div class='padder-v text-center clearfix' style='height:20px;background-color:#fff'>                            
						<div class='col-xs-12 b-r'>

						</div>
					</div>
				</div>
			</div></a>";
		echo "</div>";
	}
	else
	{
		echo "<a href='#' onclick=\"$('#add_more').modal('show')\" style='color:#5bc0de'><div class='col-md-3 col-sm-6'>
				<div class='panel b-a'>
					<div class='panel-heading no-border bg-default lt' style='height:100px'>
						<p style='color:#5bc0de;margin-top:15px;font-size:50px' class='text-center'>+</p>
					</div>
					<div class='padder-v text-center clearfix' style='height:20px;background-color:#fff'>                            
						<div class='col-xs-12 b-r'>

						</div>
					</div>
				</div>
			</div></a>";
		echo "</div>";
	}

?>