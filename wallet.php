<?php

	ob_start();
	
	require_once("includes/functions.php");
	require_once("includes/update_pin.php");
	
	if(!isset($_SESSION['username']))
	{
		header("location:login.php");
	}
	if(!check_status())
	{
		header("location:verify_account.php");
	}
	if(!check_card())
	{
		header("location:add_card.php");
	}

?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Payment :: Wallet</title>
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
  </style>
</head>
<?php echo "<body onload=\"get_cards()\">"; ?>
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
		<li>
          <a href="dashboard.php" class="dropdown-toggle">
            <i class='i i-home'></i> Overview
          </a>
		</li>		
		<li>
          <a href="make_payment.php" class="dropdown-toggle">
            <i class='fa fa-credit-card'></i> Send payment
          </a>
		</li>
		<li>
		  <a href="request_payment.php" class="dropdown-toggle">
			<i class='fa fa-money'></i> Request payment
          </a> 
		</li>
		<li>
		  <a href="security.php" class="dropdown-toggle">
            <i class='fa fa-key'></i> Security
          </a>
        </li>		
		<li class='active' style="border-bottom:3px solid #f2dede">
		  <a href="wallet.php" class="dropdown-toggle">
            <i class='fa fa-briefcase'></i> wallet
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
              <a href="docs.html"><i class="i i-support"></i> Help</a>
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
							<div class="col-sm-12" id="paste_cards_wallet">
								
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
									<div class="checkbox i-checks">
									  <label>
										<input type="checkbox" value="default" name="default">
										<i></i>
										Make default card
									  </label>
									</div>
							</div>	
						<div class="modal-footer">
							<button class="btn btn-default btn-rounded" style="border:1px solid red" data-dismiss="modal" aria-hidden="true">Cancel</button>
							<button type="submit" class="btn btn-danger btn-rounded" >Save</button>
						</div>
							</form>
					</div>
				</div>
			</div>
			<div id="delete_card" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="width:400px;max-height:90px;margin-top:100px">
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
	function get_cards()
	{
		$.get("handler/fetch_card_wallet.php",function(response){
			$('#paste_cards_wallet').html(response);
		});
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
							get_cards();
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
				get_cards();
			}
			else
			{
				alert(response);
			}
		})
	}
  </script>
</body>
</html>