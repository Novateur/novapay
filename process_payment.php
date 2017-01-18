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
  <title>Payment :: Process payment</title>
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

<?php 
	if(isset($_POST['user_ref']) && !empty($_POST['user_ref']))
	{
		$user_ref = sanitize($_POST['user_ref']);
		if($user_ref==get_email() || $user_ref==get_phone())
		{
			header("location:make_payment.php?self=self");
		}
		else
		{
			echo "<body onload=\"fetch_user('{$user_ref}')\">";
		}
	} 
	else
	{
		header("location:make_payment.php?empty_field=empty");
	}
?>
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
		<li class="active" style="border-bottom:3px solid #f2dede">
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
		<li>
		  <a href="wallet.php" class="dropdown-toggle">
            <i class='fa fa-briefcase'></i> Wallet
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
							<div class="col-sm-3">
								
							</div>							
							<div class="col-sm-6" id="paste_ma_result">
		
							</div>							
							<div class="col-sm-3">
								
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
			<div id="change_card" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="width:400px;max-height:90px;margin-top:100px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class="i i-checked"></i> Select a card</h4></p>
						</div>
						<div class="modal-body">
							<form>
							<select class='form-control rounded' name='card' id='card'>
								<?php
									change_card();
								?>
							</select>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default btn-rounded" style='border:1px solid red' data-dismiss="modal" aria-hidden="true">Cancel</button>
							<button type="button" onclick="change_card()" class="btn btn-danger btn-rounded">Save</button>
						</div>
						</form>
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
	/*$('#email').keyup(function(e){
		if(e.keyCode==13)
		{
			var email = $('#email').val();
			if(email=="")
			{
				document.getElementById("email").style.border="1px solid red";
			}
			else
			{
				$.post("handler/get_user_details.php",{email:email},function(response){
					$('#paste_ma_result').html(response);
				})
			}
		}
	})*/
	function fetch_user(email)
	{
		$.post("handler/get_user_details.php",{email:email},function(response){
			$('#paste_ma_result').html(response);
		})
	}
	function show_details()
	{
		var price = $('#parsed').html();
		var input = $('#appendedInput').val();
		if(input=="")
		{
			document.getElementById("parsed").style.border="1px solid red";
		}
		else
		{

			$.get("handler/get_default_number.php",function(response){
				$('#card_num').val(response);
			})
			$.get("handler/get_default_card.php",function(response){
				$('#paste_default').html(response);
				$('#paste_amount').html("&#8358;"+price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g,"$1,"));
				$('#paste_total').html("<b>&#8358;"+price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g,"$1,")+"</b>");
				$('#amount').val(price);
				document.getElementById("payment_proceed").style.display="block";
				document.getElementById("continue_btn").style.display="none";
				document.getElementById("parsed").style.display="none";
				document.getElementById("appendedInput").style.display="none";
				document.getElementById("ngn_btn").style.display="none";
				document.getElementById("naira_sign").style.display="none";
				document.getElementById("submit_btn").style.display="block";
				document.getElementById("cancel").innerHTML="Cancel";
			})
		}
	}
	function send_tranzact(user_ref)
	{
		var amount = $('#amount').val();
		var id = $('#id').val();
		var card_num = $('#card_num').val();
		var email = $('#email').val();
		$.post("handler/sub_trasact.php",{amount:amount,id:id,card_num:card_num,email:email},function(response)
		{
			if(response=="added")
			{
				//location.assign("process_payment.php?user_ref="+user_ref+"&response=sent");t
				alert("Your payment has been requested,it will be completed if the user acknowledge it");
			}
			else
			{
				alert(response);
			}
		})
	}
	function change_card()
	{
		var card = $('#card').val();
		$.post("handler/set_default_process.php",{card:card},function(response){
			if(response=="updated")
			{	
				$('#show_cards_target').html("<i class='i i-arrow-right4 pull-right'></i>");
				
				$('#change_card').slideUp('fast');
				$.get("handler/get_default_card.php",function(response){
					$('#paste_default').html(response);
				
				})
			
				$.get("handler/get_default_number.php",function(data){
					$('#card_num').val(data);
				})
			}
		})
	}
	function show_cards()
	{
		$('#show_cards_target').html("<i class='i i-arrow-down4 pull-right'></i>");
		$('#change_card').slideToggle('fast');
	}
	function get_amount()
	{
		$('#appendedInput').focus();
		document.getElementById("parsed").style.borderRight="2px solid gray";
		
		$('#appendedInput').click(function(){
			$(this).blur();
		});		
		$('#appendedInput').dblclick(function(){
			$(this).blur();
		})
		
		$('#appendedInput').blur(function(){
			document.getElementById("parsed").style.borderRight="none";
		})
		$('#appendedInput').keyup(function(e){
			var number1 = $('#appendedInput').val();
			if(number1.length > 8)
			{
				$('#appendedInput').blur();
				//alert("Max reached");
				return false;
			}
			else
			{	
				var new_num=(Math.round(parseFloat(number1)*100)/100)/100;
			}
			var new_num1 = new_num.toFixed(2);
			$('#parsed').html(new_num1);
			if($('#parsed').html()=="NaN")
			{
				$('#parsed').html("0.00");
			}
		})
	}

  </script>
</body>
</html>