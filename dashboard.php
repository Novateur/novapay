<?php

	ob_start();
	
	require_once("includes/functions.php");
	require_once("includes/update_pin.php");
	
	if(!isset($_SESSION['username']))
	{
		header("location:login.php");
	}
	else if(!check_status())
	{
		header("location:verify_account.php");
	}
	else if(!check_card())
	{
		header("location:add_card.php");
	}	

?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Payment :: Dashboard</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/icon.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />   
  <link rel="stylesheet" href="js/calendar/bootstrap_calendar.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
  <style>
	.req	{color:red}
	#loading {background:rgba(255,255,255,0.7);height:1600px;width:100%;z-index:5000;top:0px;position:fixed;opacity:1;left:0px}
	#loader {color:black;margin:300px auto;width:80px;height:24px}	
  </style>
</head>
<?php echo "<body onload=\"get_cards_trasact()\">"; ?>
	<div id="loading"style='display:none'><div id="loader"><img src="loader/hh.gif"/></div></div>
	<div id="tell"style='display:none;z-index:3000000;margin-top:10px;color:white;position:absolute;background:rgba(0,0,0,0.3);margin-left:600px;padding:5px;border-radius:3px;font-size:17px;font-style:italic'></div>
  <section class="vbox">
    <header class="bg-danger header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
          <i class="fa fa-bars"></i>
        </a>
        <a href="dashboard.php" class="navbar-brand">
          <img src="images/logo.PNG"  alt="scale" height="200" width="50">
          <span class="hidden-nav-xs">Payment</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      <!--<form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button>
            </span>
            <input type="text" class="form-control input-sm no-border" placeholder="Input a keyword/search term...">            
          </div>
        </div>
      </form>-->
      <ul class="nav navbar-nav hidden-xs nav-user user pull-right">
		<li class="active" style="border-bottom:3px solid #f2dede">
          <a href="dashboard.php" class="dropdown-toggle">
            <i class='i i-home'></i> Overview
          </a>
		</li>		
		<li>
          <a href="make_payment.php" class="dropdown-toggle">
            <i class="fa fa-credit-card"></i> Send payment
          </a>
		</li>
		<li>
		  <a href="request_payment.php" class="dropdown-toggle">
			<i class="fa fa-money"></i> Request payment
          </a> 
		</li>
		<li>
		  <a href="security.php" class="dropdown-toggle">
            <i class='fa fa-key'></i> Security
          </a>
        </li>		
		<li>
		  <a href="wallet.php" class="dropdown-toggle">
            <i class="fa fa-briefcase"></i> Wallet
          </a>
        </li>
		        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
			<?php
			   $image = get_photo();
              echo "<img src='uploads/{$image}' class='dker' alt='profile picture'/>
            </span>".get_firstname()." ".get_lastname()."<b class='caret'></b>";
			?>
          </a>
          <ul class="dropdown-menu animated fadeInRight">            
            <li>
              <span class="arrow top"></span>
              <a href="profile.php" onclick="show_profile()"><i class="i i-user3"></i> Profile</a>
            </li>
            <li>
              <a href="#"><i class="i i-support"></i> Help</a>
            </li>              
			<li>
              <a href="activity.php"><i class="i i-graph"></i> My activities</a>
            </li>            
            <li class="divider"></li>
            <li>
              <a href="logout.php" ><i class="i i-logout"></i> Logout</a>
            </li>
          </ul>
        </li>
      </ul>      
    </header>
    <section>
      <section class="hbox stretch">
        <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder"><br/> 
					<div class="container">
						<div class="container">
							<div class="col-sm-12">
								<div class="col-sm-2">
									<?php
										$image = get_photo();
										echo "<a href='profile.php'><img src='uploads/{$image}' class='img-circle' width='100' height='100' style='border:4px solid #f2dede'/></a>";
									?>
								</div>
								<div class="col-sm-10">
									<div class="alert alert-danger animated fadeInRight"><h2>Hi <?php echo get_lastname(); ?>,Welcome! </div>
								</div> 
								<div class='col-sm-4'>
									<div class='panel b-a'>
										<div class='panel-heading no-border bg-default lt'>
										<div>
											<a href='wallet.php'><i class="i i-arrow-right4 pull-right"></i></a>
											<b>Cards</b><hr/>
										</div>
											<div  id="paste_cards">
											
											</div>
										<div class='padder-v clearfix' style='height:20px;'>                            
											
												<p class='text-muted'>
													You can update them in your <a href='wallet.php' style="color:blue">Wallet</a>
												</p>
											
										</div>
									</div>
								</div>
								</div>
								<div class='col-sm-8' id="paste_transactions">
								
								</div>
							</div>
						</div>
                    </div>
                </section>
              </section>
            </section>

          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
      </section>
    </section>
  </section>
			<div id="add_more" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="max-height:90px;margin-top:100px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class='fa fa-credit-card'></i> Add a new card</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px'>
							<form id="add_card_form">
								<input type="text" name="card_num" id="card_num" class="form-control rounded" placeholder="Card number"/><br/>
								<input type="text" name="acc_number" id="acc_number" class="form-control rounded" placeholder="Account number"/><br/>
								<input type="text" name="bank" id="bank" class="form-control rounded" placeholder="Bank name"/><br/>
								<select class="form-control rounded" id="type" name="type">
									<option value="">Choose card type</option>
									<option value="Mastercard">Mastercard</option>
									<option value="Verve">Verve</option>
									<option value="Visa">Visa</option>
									<option value="Genesis">Genesis</option>
								</select><br/>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default btn-rounded" style="border:1px solid red" data-dismiss="modal" aria-hidden="true">Cancel</button>
							<button type="submit" class="btn btn-danger btn-rounded" >Save</button>
						</div>
							</form>
					</div>
				</div>
			</div>			
			<div id="confirm_trans" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="max-height:90px;margin-top:100px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class='fa fa-barcode'></i> Confirm transaction</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px'>
							<form id="trans_code_form">
								<input type="text" name="trans_code" id="trans_code" class="form-control rounded" placeholder="transaction code"/><br/>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default btn-rounded" style="border:1px solid red" data-dismiss="modal" aria-hidden="true">Cancel</button>
							<button type="submit" class="btn btn-danger btn-rounded" >Confirm</button>
						</div>
							</form>
					</div>
				</div>
			</div>
			<div id="delete_card" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="width:400px;max-height:90px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class="i i-trashcan"></i> Confirm</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px'>
							Are you sure you want to delete this card?
						</div>
						<div class="modal-footer">
							<button class="btn btn-default btn-rounded" style='border:1px solid red' data-dismiss="modal" aria-hidden="true">Cancel</button>
							<span id='paste_proceed_btn'></span>
						</div>
					</div>
				</div>
			</div>
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>  
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="js/charts/flot/jquery.flot.min.js"></script>
  <script src="js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="js/charts/flot/jquery.flot.spline.js"></script>
  <script src="js/charts/flot/jquery.flot.pie.min.js"></script>
  <script src="js/charts/flot/jquery.flot.resize.js"></script>
  <script src="js/charts/flot/jquery.flot.grow.js"></script>
  <script src="js/charts/flot/demo.js"></script>

  <script src="js/calendar/bootstrap_calendar.js"></script>
  <script src="js/calendar/demo.js"></script>

  <script src="js/sortable/jquery.sortable.js"></script>
  <script src="js/app.plugin.js"></script>
  <script>
	function get_cards_trasact()
	{
		$.get("handler/get_cards.php",function(response){
			$('#paste_cards').html(response);
		});
		$.get("handler/get_trasactions.php?page=1",function(response){
			$('#paste_transactions').html(response);
		})
	}
	$('#add_card_form').submit(function(e){
		e.preventDefault();
		var card_num = $('#card_num').val();
		var acc_number = $('#acc_number').val();
		var bank = $('#bank').val();
		var type = $('#type').val();
		
		if(card_num=="" || acc_number=="" || bank=="" || type=="")
		{
			if(card_num=="")
			{
				document.getElementById("card_num").style.border="1px solid red";
			}		
			if(acc_number=="")
			{
				document.getElementById("acc_number").style.border="1px solid red";
			}		
			if(bank=="")
			{
				document.getElementById("bank").style.border="1px solid red";
			}		
			if(type=="")
			{
				document.getElementById("type").style.border="1px solid red";
			}		
		}
		else
		{
				$.ajax({
					url:"handler/add_card.php",
					type:"POST",
					data: new FormData(this),
					cache:false,
					contentType:false,
					processData:false,
					success:function(data)
					{
						//alert(data);
						if(data=="inserted")
						{
							$('#card_num').val("");
							$('#acc_number').val("");
							$('#bank').val("");
							$('#add_more').modal('hide');
							get_cards_trasact();
						}
						else
						{
							alert(data);
						}
					}
				})
		}
	})
	function del_card(id)
	{
		$('#paste_proceed_btn').html("<button type='button' class='btn btn-danger btn-rounded' onclick=\"cont_card_del("+id+")\">Proceed</button>");
		$('#delete_card').modal('show');
	}
	function cont_card_del(id)
	{
		$.post("handler/delete_card.php",{id:id},function(response){
			if(response=="deleted")
			{
				$('#delete_card').modal('hide');
				get_cards_trasact();
			}
			else
			{
				alert(response);
			}
		})
	}
	function paginate(page_to)
	{
		$.get("handler/get_trasactions.php?page="+page_to,function(response){
			$('#paste_transactions').html(response);
		})
	}
	function confirm_payment()
	{
		$('#confirm_trans').modal('show');
		//document.getElementById("loading").style.display="block";
	}
  </script>
</body>
</html>