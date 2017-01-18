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
  <title>Payment :: Make payment</title>
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
<?php echo "<body>"; ?>
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
		<li class="active" style="border-bottom:3px solid #f2dede">
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
							<div class="col-sm-3">
								
							</div>							
							<div class="col-sm-6" id="paste_ma_result">
								<div id='paste_result_mail'>
								
								</div>							
										
							<!--<div align="center"><h2>Pay for goods or services</h2></div><br/>
								<p class="text-center">Currency conversion fee may apply</p>
								<div align="center">
									<input type="text" name="email" id="email" class="form-control rounded" placeholder="Email or phone number">
								</div>-->
								<div class='panel b-a'style='margin-top:0px'>
									<div class='panel-heading no-border bg-default lt'>
										<div style='margin-top:20px'>
											<p><h2 class='text-center'>Request for a payment</h2></p>
											<p>
												<div class="alert alert-success" style="font-size:13px">
													<button type="button" class="close" data-dismiss="alert">&times;</button>
													<h4><i class="fa fa-bell-o"></i> Notice!</h4>
													A text message will be sent to the email or phone number inputed in the text field below
												</div>
											</p>
											<p>
												<form id="request_form">
											<p>
												<?php
													$fname = get_firstname();
													$lname = get_lastname();
													echo "<input type='hidden' name='my_name' id='my_name' value='{$fname} {$lname}'>";
												?>
											</p>
											<p>
												<input type="text" name="user_ref" id="email" class="form-control rounded input-lg" placeholder="Email or phone number">
												
											</p>											
											<p>
												<textarea rows="3" class="form-control input-lg" name="desc" id="desc" placeholder="Add a description..." style='border-radius:5px'></textarea>
												
											</p>
											<p class='text-center'><b>Amount requesting for</b></p>
											<p>
												<div class="text-center"><sup style='font-size:25px'>&#8358;</sup><span id="parsed" style='font-size:50px'>0.00</span></div>
												<div class='inline v-middle' style="margin-left:110px">
												  <div class='input-group input-s-sm'>
													  <input type='text' id='appendedInput' name='appendedInput' class='input-lg form-control no-border' style='width:100px;color:#fff'>
													  <div class='input-group-btn'>
														<button class='btn btn-default btn-lg dropdown-toggle no-border' data-toggle='dropdown'>
														  <span class='dropdown-label'>NGN</span>  
														  <i class='i i-arrow-down4'></i>
														</button>
														<ul class='dropdown-menu dropdown-select pull-right'>
														  <li class='active'>
															<a href='#'><input type='radio' value='NGN' name='pay_unit' checked=''>NGN</a>
														  </li>
														</ul>
													  </div>
												  </div>
												</div>
											</p>
											<p class='text-center'><button type='submit' class='btn btn-danger btn-rounded btn-lg'>Proceed</button><p>
											</form>
										</div>
									</div>
									<div class='padder-v text-center clearfix' style='height:20px;background-color:#fff'>                            
										<div class='col-xs-12 b-r'>
										</div>
									</div>
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
	$('#email').keyup(function(e){
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
	})
	$('#request_form').submit(function(e){
		e.preventDefault();
		var email = $('#email').val();
		var appendedInput = $('#appendedInput').val();
		var description = $('#desc').val();
		if(email=="" || appendedInput=="" || description=="")
		{
			if(email=="")
			{
				document.getElementById("email").style.border="1px solid red";
			}
			if(appendedInput=="")
			{
				document.getElementById("parsed").style.border="1px solid red";
			}			
			if(description=="")
			{
				document.getElementById("desc").style.border="1px solid red";
			}
		}
		else
		{
			var name = $('#my_name').val();
			var val = $('#parsed').html();
			
			$.post("handler/request.php",{name:name,email:email,amount:val,desc:description},function(response){
				if(response=="sent")
				{
					$('#paste_result_mail').html("<div class='alert alert-success' style='font-size:13px'>You have successfully sent a payment request to "+email);
				}
				else
				{
					$('#paste_result_mail').html("<div class='alert alert-danger' style='font-size:13px'>"+response+"</div>");
				}
			})
			
				/*$.ajax({
					url:"handler/request.php",
					type:"POST",
					data: new FormData(this),
					cache:false,
					contentType:false,
					processData:false,
					success:function(data)
					{
						//alert(data);
						if(data=="sent")
						{
							$('#paste_result_mail').html("<div class='alert alert-success'>You have successfully sent a payment request to "+email);
						}
						else
						{
							$('#paste_result_mail').html("<div class='alert alert-danger'>"+data+"</div>");
						}
					}
				})*/
		}
	})
	$(function(){
		$('#parsed').click(function(){
			$('#appendedInput').focus();
			document.getElementById("parsed").style.borderRight="2px solid gray";
		});
				
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
			if(number1.length > 8 )
			{
				//document.getElementById("appendedInput").readOnly=true;
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
	})	
	/*$(function(){
		var input="";
		$('#appendedInput').keydown(function(e){
			if(e.keyCode==8 && input.length > 0)
			{
				input = input.slice(0,input.length-1);
				$(this).val(formatNumber(input));
			}
			else
			{
				var key = getKeyValue(e.keyCode);
				if(key)
				{
					input*=key;
					$(this).val(formatNumber(input));
				}
			}
			return false;
		});
		
		function getKeyValue(keyCode)
		{
			if(keyCode > 57)
			{
				keyCode-=48;
			}
			if(keyCode>=48 && keyCode<=57)
			{
				return String.fromCharCode(keyCode);
			}
		}
		
		function formatNumber(input)
		{
			if(isNaN(parseFloat(input)))
			{
				return "0.00";
			}
			var num = parseFloat(input);
			return(num/100).toFixed(2);
		}
	})*/
  </script>
</body>
</html>