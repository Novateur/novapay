<?php

	ob_start();
	//require_once("includes/functions.php");

?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Payment :: Create account</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/icon.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />
  <link rel="stylesheet" href="js/datepicker/datepicker.css" type="text/css" />  
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
<body>
  <section class="vbox">
    <header class="bg-danger header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
          <i class="fa fa-bars"></i>
        </a>
        <a href="index.php" class="navbar-brand">
          <img src="images/logo.PNG"  alt="scale" height="200" width="50">
          <span class="hidden-nav-xs">Payment</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
        </a>
      </div>    
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
							<div class="row"style="margin-top:10px">
								<div class="col-sm-2">
								</div>
								<div class="col-sm-8">
									<section class="panel panel-default" style="padding-bottom:10px">
										<!--<header class="panel-heading font-bold">-->
										<div class='col-sm-12' align="center">
										  <h1><i class="fa fa-key"></i> Account set up</h1>
										</div>
										<!--</header>-->
										<form id="setup_form">
											<div id="first_set">
												<div class="panel-body">
													<div align="center"><i class="i i-circle text-danger-dk"></i> <i class="i i-circle text"></i></div>
													<h3 style='text-align:center'>Join us today and experience the best quality in online payment</h3>
													<div class="row">
														<div class="col-sm-12">
															<label style="margin-left:15px"><span class="req"></span></label><br/>
															<div id="errors1_msg" class="req" style="margin-left:15px"></div>
															<div class="col-sm-12">
																<input type="email"  class="form-control rounded input-lg" placeholder="Your email" name="email" id="email">
															</div>
														</div>														
														<div class="col-sm-12">
															<label style="margin-left:15px"><span class="req"></span></label><br/>
															<div id="password_msg" class="req" style="margin-left:15px"></div>
															<div class="col-sm-12">
																<input type="password" class="form-control rounded input-lg" placeholder="Create your password" name="password" id="password" onkeyup="check_strong(this.value)">
															</div>
														</div>														
														<div class="col-sm-12">
															<label style="margin-left:15px"><span class="req"></span></label><br/>
															<div id="country_msg" class="req" style="margin-left:15px"></div>
															<div class="col-sm-12">
																<input type="password"  class="form-control rounded input-lg" placeholder="Confirm your password" name="password1" id="password1"onkeyup="check_passmatch()">
															</div>
														</div>
													</div>	
													<div class="row"><br/>
														<div class='col-sm-12'>
															<button type="button" class="btn btn-danger btn-rounded btn-lg pull-right" onclick="process1()" style="margin-right:15px">Next</button>
														</div>
													</div>
												</div>
												<!--<header class="panel-heading font-bold" style="padding:30px">-->
													<div class="form-group " style="margin-top:-10px;float:right">
														<div class="col-sm-4 col-sm-offset-2">
															
														</div>
													</div>
												<!--</header>-->
											</div>
											<div id="second_set" style="display:none">
												<div class="panel-body">
													<div align="center"><i class="i i-circle text"></i> <i class="i i-circle text-danger-dk"></i></div>
													<h3 style='text-align:center'>Add your personal details</h3>
													<div class="row">
														<div class="col-sm-12">
															<label style="margin-left:15px"><span class="req"></span></label><br/>
															<div id="error_msg" class="req" style="margin-left:15px"></div>
															<div class="col-sm-12">
																<input type="text"  class="form-control rounded input-lg" placeholder="First name" name="first_name" id="first_name">
															</div>
														</div>														
														<div class="col-sm-12">
															<label style="margin-left:15px"><span class="req"></span></label><br/>
															<div id="country_msg" class="req" style="margin-left:15px"></div>
															<div class="col-sm-12">
																<input type="text"  class="form-control rounded input-lg" placeholder="Last name" name="last_name" id="last_name">
															</div>
														</div>														
														<div class="col-sm-12">
															<label style="margin-left:15px"><span class="req"></span></label><br/>
															<div id="end_msg" class="req"></div>
															<div class="col-sm-12">
																<input class="input-sm datepicker-input form-control rounded input-lg" placeholder="Date of birth" name="dob" id="dob" size="16" type="text" data-date-format="dd-mm-yyyy" >
															</div>
														</div>														
														<div class="col-sm-12">
															<label style="margin-left:15px"><span class="req"></span></label><br/>
															<div id="end_msg" class="req"></div>
															<div class="col-sm-12">
																<select class="form-control rounded input-lg" id="nationality" name="nationality">
																	<option value="">Nationality</option>
																	<option value="Nigeria">Nigeria</option>
																	<option value="Ghana">Ghana</option>
																</select>
															</div>
														</div>
														<div class="col-sm-12">
															<label style="margin-left:15px"><span class="req"></span></label><br/>
															<div id="country_msg" class="req" style="margin-left:15px"></div>
															<div class="col-sm-12">
																<input type="text"  class="form-control rounded input-lg" placeholder="Address line 1" name="add1" id="add1">
															</div>
														</div>														
														<div class="col-sm-12">
															<label style="margin-left:15px"><span class="req"></span></label><br/>
															<div id="country_msg" class="req" style="margin-left:15px"></div>
															<div class="col-sm-12">
																<input type="text"  class="form-control rounded input-lg" placeholder="Address line 2 (opt)" name="add2" id="add2">
															</div>
														</div>														
														<div class="col-sm-12">
															<label style="margin-left:15px"><span class="req"></span></label><br/>
															<div id="country_msg" class="req" style="margin-left:15px"></div>
															<div class="col-sm-12">
																<input type="text"  class="form-control rounded input-lg" placeholder="Mobile number" name="phone" id="phone">
															</div>
														</div>
													</div>
													<div class="row"><br/>
														<div class='col-sm-12'>
															<button type="submit" class="btn btn-danger btn-rounded btn-lg pull-right" style="margin-right:15px">Create my account</button> 
														</div>
													</div>
												</div>
												<!--<header class="panel-heading font-bold" style="padding:30px">-->
													<div class="form-group " style="margin-top:-10px;float:right">
														<div class="col-sm-4 col-sm-offset-2">
															
														</div>
													</div>
												<!--</header>-->
											</div>
										</form>
									</section>
								</div>
								<div class="col-sm-2">
								
								</div>
							</div>
						</div>
                    </div>
					<div class="col-sm-12">
						<div id="paste_vendors2">
						
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

  	  		<div id="alert" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="width:400px;max-height:90px;margin-top:100px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class="i i-notice"></i> Alert</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px'>
							Please kindly select your account type inorder to continue with the registration process 
						</div>
						<div class="modal-footer">
							<button class="btn btn-danger btn-rounded" data-dismiss="modal" aria-hidden="true">Ok</button>
						</div>
					</div>
				</div>
			</div>
  <script src="js/jquery.min.js"></script>  
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>
  <script src="js/datepicker/bootstrap-datepicker.js"></script> 
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
	function process1()
	{
		var email = $('#email').val();
		var pass = $('#password').val();
		var pass1 = $('#password1').val();
		
		if(email=="" || pass=="" || pass1=="")
		{
			if(email=="")
			{
				document.getElementById("email").style.border="1px solid red";
			}		
			if(pass=="")
			{
				document.getElementById("password").style.border="1px solid red";
			}		
			if(pass1=="")
			{
				document.getElementById("password1").style.border="1px solid red";
			}
		}
		else if(pass!="" && pass1!="")
		{
			if(pass!=pass1 || pass.length < 8)
			{
				if(pass.length < 8)
				{
					$('#password_msg').html("<div class='alert alert-danger'><i class='i i-notice'></i> Your password must contain atleast 8 characters</div>");
				}
				if(pass!=pass1)
				{
					$('#password_msg').html("<div class='alert alert-danger'><i class='i i-notice'></i> Both password do not match</div>");
				}
			}
			else
			{
				document.getElementById("first_set").style.display="none";
				document.getElementById("second_set").style.display="block";
			}
		}	
	}

	function check_passmatch()
	{
		var pass = $('#password').val();
		var pass1 = $('#password1').val();
		if(pass!="")
		{
			if(pass==pass1)
			{
				$('#password_msg').html("");
			}
			else
			{
				$('#password_msg').html("<div class='alert alert-danger'><i class='i i-notice'></i> Both password do not match</div>");
			}
		}
		else
		{
			$('#password_msg').html("<div class='alert alert-danger'><i class='fa fa-key'></i> Create password  field is required</div>");
		}
	}

	$('#setup_form').submit(function(e){
		e.preventDefault();
		
		var first_name = $('#first_name').val();
		var last_name = $('#last_name').val();
		var dob = $('#dob').val();
		var nation = $('#nationality').val();
		var add1 = $('#add1').val();
		var add2 = $('#add2').val();
		var phone = $('#phone').val();
		
		if(first_name=="" || last_name=="" || dob=="" || nation=="" || add1=="" || add2=="" || phone=="")
		{
			if(first_name=="")
			{
				document.getElementById("first_name").style.border="1px solid red";
			}		
			if(last_name=="")
			{
				document.getElementById("last_name").style.border="1px solid red";
			}		
			if(dob=="")
			{
				document.getElementById("dob").style.border="1px solid red";
			}		
			if(nation=="")
			{
				document.getElementById("nationality").style.border="1px solid red";
			}		
			if(add1=="")
			{
				document.getElementById("add1").style.border="1px solid red";
			}			
			if(add2=="")
			{
				document.getElementById("add2").style.border="1px solid red";
			}					
			if(phone=="")
			{
				document.getElementById("phone").style.border="1px solid red";
			}
		}
		else
		{
				$.ajax({
					url:"handler/register.php",
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
							location.assign("add_card.php");
						}
						else
						{
							$('#error_msg').html("<div class='alert alert-danger'>"+data+"</div>");
						}
					}
				})
		}
	})
	function check_strong(val)
	{
		if(val.length < 8)
		{
			$('#password_msg').html("<div class='alert alert-danger'><i class='i i-notice'></i> Your password must contain atleast 8 characters</div>");
		}
		else if(val.length <= 10)
		{
			$('#password_msg').html("<div class='alert alert-warning'><i class='i i-notice'></i> This is a moderate password</div>");
		}
		else
		{
			$('#password_msg').html("<div class='alert alert-success'><i class='i i-notice'></i> This is a strong password</div>");
		}
	}
  </script>
</body>
</html>