<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$term = sanitize($_POST['term']);
	$id = get_user_id();
	
	
	$sql_pag="SELECT COUNT(*) FROM pending_transact WHERE name LIKE '%".$term."%' AND user_id={$id} OR name LIKE '%".$term."%' AND receiver_id={$id} OR sender_name LIKE '%".$term."%' AND user_id={$id} OR sender_name LIKE '%".$term."%' AND receiver_id={$id} ORDER BY id DESC";
	$totalpage=$connection->query($sql_pag);
	$totalpage->setFetchMode(PDO::FETCH_ASSOC);
	foreach($totalpage as $t)
	{
		$totalpage1=array_shift($t);
	}
	$limit=25;
	$page=$_GET['page'];
	if($page)
	{
		$start=($page-1) * $limit;
	}
	else
	{
		$start=0;
	}
	
	$sql = "SELECT * FROM pending_transact WHERE name LIKE '%".$term."%' AND user_id={$id} OR name LIKE '%".$term."%' AND receiver_id={$id} OR sender_name LIKE '%".$term."%' AND user_id={$id} OR sender_name LIKE '%".$term."%' AND receiver_id={$id} ORDER BY id DESC LIMIT $start, $limit";
	$query = $connection->query($sql);

	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "<div class='row'>";
		echo "<div class='col-sm-4'>";
      echo '<form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" action="search.php" method="get" role="search">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-danger b-danger btn-icon" id="sub" onclick=\"sub_search()\"><i class="fa fa-search"></i></button>
            </span>
            <input type="text" class="form-control input-sm" name="term" id="transaction" placeholder="Input a transaction name...">            
          </div>
        </div>
      </form>
	  </div>';
	  echo "<div class='col-sm-4'>
		</div>";
	  //echo "<div class='col-sm-4'>";
	  	  		//echo "<div class='pull-right' style='margin-top:30px'>
			//<a href='#' onclick=\"get_vendors_grid()\"data-toggle='tooltip' data-placement='top' title='Simple view'><i class='fa fa-bars'></i></a> &nbsp;&nbsp;&nbsp;&nbsp;<a href='#' onclick=\"get_vendors_list()\" data-toggle='tooltip' data-placement='top' title='Detailed view'><i class='fa fa-list'></i></a>
		//</div>
	  //</div>";
		echo "<form id='ma_multi_del' style='font-size:14px'>";
		echo "<table class='table table-striped table-responsive'>
			<tr>
			<th><b>Date</b></th>
			<th><b>Confirm</b></th>
			<th><b>Name</b></th>
			<th><b>Type</b></th>
			<th><b>Status</b></th>
			<th><b>Amount</b></th>
			</tr>";
		foreach($query as $r)
		{
			echo"<tr>
			<td style='font-size:15px'>{$r['day']} ".strtoupper($r['month']).",{$r['year']} @ {$r['time1']}</td>
			<td>";if($r['status']==0){ echo "<a href='confirm.php'><i class='i i-publish'></i></a>";}else{ echo "";}echo "</td>
			<td>";if($r['receiver_id']==$id){ echo $r['sender_name'];}else{ echo $r['name'];} echo"</td>
			<td>";if($r['user_id']==$id){ echo "Paid";}else{echo"Received";} echo"</td>
			<td>";if($r['status']==0){ echo "Pending";}else{ echo "Completed";}echo "</td>
			<td>";if($r['receiver_id']==$id){ echo "<span style='color:green'>+</span>";}else{ echo "<span style='color:red'>-</span>";}echo "&#8358;".number_format($r['amount'],2)."</td>";
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
								echo "<li><a href='#' onclick=\"paginate_search({$previous},'{$term}')\"><i class='i i-arrow-left4'></i></a></li>";
							}
							for($i=1;$i<=$total_num_pages;$i++)
							{
								if($i==$page)
								{
									echo "<li class='active'><a href='#'>{$i}</a></li>";
								}
								else
								{
									echo "<li><a href='#'onclick=\"paginate_search({$i},'{$term}')\">{$i}</a></li>";
								}
							}
							if($next<=$total_num_pages)
							{
								echo "<li><a href='#' onclick=\"paginate_search({$next},'{$term}')\"><i class='i i-arrow-right4'></i></a></li>";
							}
						}
					echo "</ul>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	}
	else
	{
		echo "<h2 style='text-align:center'>No transaction of such was found</h2>";
	}

?>