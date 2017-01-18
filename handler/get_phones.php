<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id = get_user_id();

	$sql="SELECT * FROM phones WHERE user_id={$id}";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			echo "<div class='row'>
				<div class='col-sm-8'>
					<div class='row'>
						<div class='col-sm-12'>
							<p>{$r['phones']}</p>
						</div>
					</div>													
				</div>												
				<div class='col-sm-4'>
					<div class='row'>
						<div class='col-sm-12'>
							<a href='#' style='font-size:12px;color:blue' onclick=\"edit_phone('{$r['phones']}',{$r['id']})\">Edit</a> | <a href='#' style='font-size:12px;color:blue' onclick=\"remove_phone({$r['id']})\">Remove</a>
						</div>
					</div>
				</div>
			</div>";
		}
	}
	else
	{
		
	}


?>