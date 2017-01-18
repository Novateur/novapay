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
	
	$sql = "SELECT * FROM pending_transact WHERE user_id={$id} OR receiver_id={$id} LIMIT $start, $limit";
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
            <input type="text" class="form-control input-sm" name="term" placeholder="Input a transaction name...">            
          </div>
        </div>
      </form>
	  </div>';
	  echo "<div class='col-sm-4'>
		</div>";
	  echo "<div class='col-sm-4'>";
	  	  		echo "<div class='pull-right' style='margin-top:30px'>
			<a href='#' onclick=\"get_simple_activity()\"data-toggle='tooltip' data-placement='top' title='Simple view'><i class='fa fa-bars'></i></a> &nbsp;&nbsp;&nbsp;&nbsp;<a href='#' onclick=\"get_detailed_activity()\" data-toggle='tooltip' data-placement='top' title='Detailed view'><i class='fa fa-list'></i></a>
		</div>
	  </div>";
		echo "<form id='ma_multi_del' style='font-size:14px'>";
		echo "<table class='table table-striped table-responsive'>
			<tr>
			<th><b>Date</b></th>
			<th><b>Name</b></th>
			<th><b>Amount</b></th>
			</tr>";
		foreach($query as $r)
		{
			echo"<tr>
			<td style='font-size:15px'>".strtoupper($r['month'])."<br/>{$r['day']}</td>
			<td>";if($r['receiver_id']==$id){ echo $r['sender_name'];}else{ echo $r['name'];} echo"</td>
			
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
								echo "<li><a href='#' onclick=\"paginate_simple({$previous})\"><i class='i i-arrow-left4'></i></a></li>";
							}
							for($i=1;$i<=$total_num_pages;$i++)
							{
								if($i==$page)
								{
									echo "<li class='active'><a href='#'>{$i}</a></li>";
								}
								else
								{
									echo "<li><a href='#'onclick=\"paginate_simple({$i})\">{$i}</a></li>";
								}
							}
							if($next<=$total_num_pages)
							{
								echo "<li><a href='#' onclick=\"paginate_simple({$next})\"><i class='i i-arrow-right4'></i></a></li>";
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