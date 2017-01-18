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
<?php echo "<body onload=\"get_pin()\">"; ?>
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
		<li class="active" style="border-bottom:3px solid #f2dede">
		  <a href="make_payment.php" class="dropdown-toggle">
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
							<div class="col-sm-1">
								
							</div>							
							<div class="col-sm-10" id="paste_ma_result">
								<div id="b"class='alert alert-success' style="display:none;font-size:13px">
									You have successfully updated your new password
								</div>									
								<div id="c"class='alert alert-success' style="display:none;font-size:13px">
									You have chosen your security question,this will be used to log you in when you forgot your account details 
								</div>							
								<div class='panel b-a'style='margin-top:20px;padding:20px'>
									<div class='panel-heading no-border bg-default lt'>
										<div style='margin-top:30px'>
											<p><h3>Password</h3></p>
											<p>Create or update your password <span class='pull-right'><a href="#" style="color:blue" onclick="$('#change_pass').modal('show')">Edit</a></span></p>
											<p><hr/></p>											
											<p><h3>Security questions</h3></p>
											<p>To help protect your account,please choose two security questions it will help confirm your identity<span class='pull-right'><a href="#" style="color:blue" onclick="$('#question').modal('show')">Revise</a></span></p>
											<p><hr/></p>											
											<p><h3>Customer service pin</h3></p>
											<p>Generate a pin which you will be using to make contact with the admin<span class='pull-right' id='paste_submit_btn'></span></p>
										
										</div>
									</div>
									<div class='padder-v text-center clearfix' style='height:20px;background-color:#fff'>                            
										<div class='col-xs-12 b-r'>
										</div>
									</div>
								</div>							
							<div class="col-sm-1">
								
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
			<div id="change_pass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="max-height:90px;margin-top:100px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4>Change password</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px'>
							<form id="change_pass_form">
								<h4>Confirm your current password</h4>
								<div id="current_password_msg"></div>
								<input type="password" name="current_pass" id="current_pass" class="form-control rounded" placeholder="Current password"/><br/>
								<h4>Enter your new password</h4>
								<div id="password_msg"></div>
								<input type="password" name="new_pass" id="new_pass" class="form-control rounded" placeholder="New password"/><br/>
								<input type="password" name="confirm_new_pass" id="confirm_new_pass" class="form-control rounded" placeholder="Confirm new password"/><br/>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default btn-rounded" style="border:1px solid red" data-dismiss="modal" aria-hidden="true">Cancel</button>
							<button type="submit" class="btn btn-danger btn-rounded" >Change password</button>
						</div>
							</form>
					</div>
				</div>
			</div>			
			<div id="question" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="max-height:90px;margin-top:50px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4>Security settings</h4></p>
						</div>
						<div class="modal-body" style='font-size:13px'>
							<form id="security_form">
								<h3>Choose a security question</h3>
								<div id="question_result"></div>
								<p>
									<div class="radio i-checks">
										<label>
											<input type="radio" name="a" value="Your mother's maiden name">
											<i></i>
											Your mother's maiden name
										</label>
									</div>
								</p>								
								<p>
									<div class="radio i-checks">
										<label>
											<input type="radio" name="a" value="Your first pet's name">
											<i></i>
											Your first pet's name
										</label>
									</div>
								</p>								
								<p>
									<div class="radio i-checks">
										<label>
											<input type="radio" name="a" value="Your widely used password">
											<i></i>
											Your widely used password
										</label>
									</div>
								</p>								
								<p>
									<textarea name="hint" id="hint" class="form-control" rows="5" placeholder="Hint to your answer"></textarea>
								</p>								
								<p>
									<textarea name="answer" id="answer" class="form-control" rows="5" placeholder="Answer to the question"></textarea>
								</p>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default btn-rounded" style="border:1px solid red" data-dismiss="modal" aria-hidden="true">Cancel</button>
							<button type="submit" class="btn btn-danger btn-rounded" >Save</button>
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
	$('#change_pass_form').submit(function(e)
	{
		e.preventDefault();
		var current_pass = $('#current_pass').val();
		var new_pass = $('#new_pass').val();
		var confirm_new_pass = $('#confirm_new_pass').val();
		if(current_pass=="" || new_pass=="" || confirm_new_pass=="")
		{
			if(current_pass=="")
			{
				document.getElementById("current_pass").style.border="1px solid red";
			}			
			if(new_pass=="")
			{
				document.getElementById("new_pass").style.border="1px solid red";
			}			
			if(confirm_new_pass=="")
			{
				document.getElementById("confirm_new_pass").style.border="1px solid red";
			}
		}
		else if(new_pass!="" && confirm_new_pass!="")
		{

			if(new_pass!=confirm_new_pass || new_pass.length < 8)
			{
				if(new_pass.length < 8)
				{
					$('#password_msg').html("<div class='alert alert-danger'><i class='i i-notice'></i> Your password must contain atleast 8 characters</div>");
				}
				if(new_pass!=confirm_new_pass)
				{
					$('#password_msg').html("<div class='alert alert-danger'><i class='i i-notice'></i> Both password do not match</div>");
				}
			}
			else
			{
				$.ajax({
					url:"handler/change_pass.php",
					type:"POST",
					data: new FormData(this),
					cache:false,
					contentType:false,
					processData:false,
					success:function(data)
					{
						//alert(data);
						if(data=="updated")
						{
							$('#change_pass').modal('hide');
							document.getElementById("b").style.display="block";
						}
						else
						{
							$('#current_password_msg').html("<div class='alert alert-danger'>"+data+"</div>");
						}
					}
				})
			}
		}	
	})	
	$('#security_form').submit(function(e)
	{
		e.preventDefault();
		var question = $('input:radio[name=a]:checked').val();
		var hint = $('#hint').val();
		var answer = $('#answer').val();
		if(question=="" || hint=="" || answer=="")
		{
			if(question==null)
			{
				$('#question_result').html("<div class='alert alert-danger'>Please choose a security question</div>");
			}			
			if(hint=="")
			{
				document.getElementById("hint").style.border="1px solid red";
			}			
			if(answer=="")
			{
				document.getElementById("answer").style.border="1px solid red";
			}
		}
		else
		{
				$.ajax({
					url:"handler/update_security.php",
					type:"POST",
					data: new FormData(this),
					cache:false,
					contentType:false,
					processData:false,
					success:function(data)
					{
						//alert(data);
						if(data=="updated")
						{
							$('#question').modal('hide');
							document.getElementById("c").style.display="block";
						}
						else
						{
							alert(data);
						}
					}
				})
		}	
	})
	function get_pin()
	{
		$.get("handler/get_pin.php",function(response){
			$('#paste_submit_btn').html(response);
		});
	}
	function update_pin()
	{
		$.get("handler/update_pin.php",function(response){
			//alert(response);
			if(response=="updated")
			{
				get_pin();
			}
			else
			{
				alert(response);
			}
		});
	}
  </script>
</body>
</html>