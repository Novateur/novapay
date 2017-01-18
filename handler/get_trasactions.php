<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");

	$id = get_user_id();
	
	$sql_pag="SELECT COUNT(*) FROM pending_transact WHERE user_id={$id} OR receiver_id={$id}";
	$totalpage=$connection->query($sql_pag);
	$totalpage->setFetchMode(PDO::FETCH_ASSOC);
	foreach($totalpage as $t)
	{
		$totalpage1=array_shift($t);
	}
	$limit=20;
	$page=$_GET['page'];
	if($page)
	{
		$start=($page-1) * $limit;
	}
	else
	{
		$start=0;
	}
	
	$sql = "SELECT * FROM pending_transact WHERE user_id={$id} OR receiver_id={$id} LIMIT $start, $limit";
	$query = $connection->query($sql);

	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		//echo "<div class='pull-right'>
			//<a href='#' onclick=\"get_vendors_grid()\"data-toggle='tooltip' data-placement='top' title='Simple view'><i class='i i-grid'></i></a> <a href='#' onclick=\"get_vendors_list()\" data-toggle='tooltip' data-placement='top' title='Detailed view'><i class='fa fa-align-justify'></i></a>
		//</div>";
		echo "<form id='ma_multi_del' style='font-size:14px'>";
		echo "<table class='table table-striped table-responsive'>
			<tr>
			<th><b></b></th>
			<th><b></b></th>
			<th><b></b></th>
			<th><a href='activity.php'><i class='i i-arrow-right4'></i></a></th>
			</tr>";
		foreach($query as $r)
		{
			echo"<tr>
			<td style='font-size:15px'>".strtoupper($r['month'])."<br/>{$r['day']}</td>
			<td>";if($r['receiver_id']==$id){ echo $r['sender_name'];}else{ echo $r['name'];} echo"</td>
			
			<td>";if($r['receiver_id']==$id){ echo "<span style='color:green'>+</span>";}else{ echo "<span style='color:red'>-</span>";}echo "&#8358;".number_format($r['amount'],2)."</td>
			<td></td>";
		}
		echo "</table>";
		echo "</form>";
		
		echo"<div class='row'>";
			echo "<div class='col-sm-12'>";
				echo "<div class='text-right'>";
					echo "<ul class='pagination pagination'>";
						$previous=$page-1;
						$next=$page+1;
						$total_num_pages=ceil($totalpage1/$limit);
						if($total_num_pages>1)
						{
							if($previous>=1)
							{
								echo "<li><a href='#' onclick=\"paginate({$previous})\"><i class='i i-arrow-left4'></i></a></li>";
							}
							for($i=1;$i<=$total_num_pages;$i++)
							{
								if($i==$page)
								{
									//echo "<li class='active'><a href='#'>{$i}</a></li>";
								}
								else
								{
									//echo "<li><a href='#'onclick=\"paginate({$i})\">{$i}</a></li>";
								}
							}
							if($next<=$total_num_pages)
							{
								echo "<li><a href='#' onclick=\"paginate({$next})\"><i class='i i-arrow-right4'></i></a></li>";
							}
						}
					echo "</ul>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	}
	else
	{
		echo "<h2>You've not performed any transaction</h2>";
	}

?>