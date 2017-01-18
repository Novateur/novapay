<?php

	ob_start();
	//require_once("includes/functions.php");
	
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Payment :: Add card</title>
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
	#loading1 {background:rgba(255,255,255,0.7);height:1600px;width:100%;z-index:5000;top:0px;position:fixed;opacity:1;left:0px}
	#loader {color:black;margin:300px auto;width:80px;height:24px}
  </style>
</head>
<body>
  <div id="loading1"style='display:none'><div id="loader"><img src="loader/hh.gif"/></div></div>
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
								<div class="row"style="margin-top:20px">
									<div class="col-sm-6">
										<img src="images/pay1.jpg" width="500"/>
									</div>
									<div class="col-sm-6">
										<!--<section class="panel panel-default">
											<header class="panel-heading font-bold">
											  <h4><i class="fa fa-key"></i> Account set up</h4>
											</header>-->
											<form id="setup_form">
												<div id="second_set">
													<!--<div class="panel-body">
														<h3 style='text-align:center'>Add a card</h3>-->
														<div class="row">
															<div class="col-sm-12">
																<label style="margin-left:15px"><span class="req"></span></label><br/>
																<div id="error_msg" class="req" style="margin-left:15px"></div>
																<div class="col-sm-12">
																	<input type="text"  class="form-control input-lg rounded" placeholder="Card number" name="card_num" id="card_num">
																</div>
															</div>
															<div class="col-sm-12"><br/>
																<div id="error_msg" class="req" style="margin-left:15px"></div>
																<div class="col-sm-6">
																	<input type="text"  class="form-control input-lg rounded" placeholder="CSC (3 digits)" name="code" id="code">
																</div>
																<div id="country_msg" class="req" style="margin-left:15px"></div>
																<div class="col-sm-6">
																	<input type="text"  class="form-control input-lg rounded" placeholder="Account number" name="acc_number" id="acc_number">
																</div>
															</div>														
															<div class="col-sm-12">
																<label style="margin-left:15px"><span class="req"></span></label><br/>
																<div id="end_msg" class="req"></div>
																<div class="col-sm-12">
																	<input class="input-lg form-control rounded" placeholder="Bank name" name="bank" id="bank" type="text" >
																</div>
															</div>														
															<div class="col-sm-12">
																<label style="margin-left:15px"><span class="req"></span></label><br/>
																<div id="end_msg" class="req"></div>
																<div class="col-sm-12">
																	<select class="form-control input-lg rounded" id="type" name="type">
																		<option value="">Choose card type</option>
																		<option value="MasterCard">Mastercard</option>
																		<option value="Verve">Verve</option>
																		<option value="Visa">Visa</option>
																		<option value="Genesis">Genesis</option>
																	</select><br/>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="col-sm-12"> 
																	<button type="submit" class="btn btn-danger btn-lg btn-rounded">Submit</button>
																</div>
															</div>
														</div>
															<div class="row"><br/>
																<div class="col-sm-12">
																	<div class="col-sm-12" style="font-size:17px">
																		Please kindly note that the card you're adding now is your default card and that you can add more cards
																		and also change your default card
																	</div>
																</div>
															</div>
														<!--</div>-->
													<!--</div>
													<header class="panel-heading font-bold" style="padding:30px">
														<div class="form-group " style="margin-top:-10px;float:right">
															<div class="col-sm-4 col-sm-offset-2">
																<button type="submit" class="btn btn-danger btn-rounded">Submit</button>
															</div>
														</div>
													</header>-->
												</div>
											</form>
										</section>
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
	$('#setup_form').submit(function(e){
		e.preventDefault();
		var card_num = $('#card_num').val();
		var acc_number = $('#acc_number').val();
		var bank = $('#bank').val();
		var type = $('#type').val();
		var code = $('#code').val();
		
		if(card_num=="" || acc_number=="" || bank=="" || type=="" || code=="")
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
			if(code=="")
			{
				document.getElementById("code").style.border="1px solid red";
			}		
		}
		else
		{
			document.getElementById("loading1").style.display="block";
				$.ajax({
					url:"handler/add_card_reg.php",
					type:"POST",
					data: new FormData(this),
					cache:false,
					contentType:false,
					processData:false,
					success:function(data)
					{
						
							location.assign("verify_account.php");
					}
				})
		}
	})
  </script>
</body>
</html>