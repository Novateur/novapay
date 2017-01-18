<?php

	ob_start();
	
	require_once("includes/functions.php");
	
	if(!isset($_SESSION['username']))
	{
		header("location:login.php");
	}

?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Payment :: Confirm payment</title>
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
	if(isset($_GET['ref']) && !empty($_GET['ref']))
	{
		$id = base64_decode($_GET['ref']);
	}
	echo "<body>"; 
	
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
		<li class="active">
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
								<?php
									if(isset($_GET['no_card']) && !empty($_GET['no_card']))
									{
										echo "<div class='alert alert-danger'>Sorry,you can't proceed with this tractaction because you have no card 
											goto your <a href='wallet.php'><b>Wallet</b></a> to add a card
										</div>";
									}									
									if(isset($_GET['empty_field']) && !empty($_GET['empty_field']))
									{
										echo "<div class='alert alert-danger'>
											The email or phone number field can't be empty,kindly supply us with the email
											or phone number of the person you want to make payment to
										</div>";
									}
								?>
								<!--<div align="center"><h2>Pay for goods or services</h2></div><br/>
								<p class="text-center">Currency conversion fee may apply</p>
								<div align="center">
									<input type="text" name="email" id="email" class="form-control rounded" placeholder="Email or phone number">
								</div>-->
								<div class='panel b-a'style='margin-top:50px'>
									<div class='panel-heading no-border bg-default lt'>
										<div style='margin-top:30px'>
											<p><h2 class="text-center">Confirm your payment</h2></p>
											<p>
												<div class="alert alert-success" style="font-size:13px">
													<button type="button" class="close" data-dismiss="alert">&times;</button>
													<h4><i class="fa fa-bell-o"></i> Notice!</h4>
													Input the verification code that was sent to you in the text field below,to confirm your payment
												</div>
											</p>
											<p>
												<form method="post">
												<input type="text" name="code" id="code" class="form-control rounded input-lg" placeholder="Verification code">
											</p>
											<p class="text-center"><button type='submit' class='btn btn-danger btn-rounded btn-lg'>Confirm</button><p>
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
	$('#code').keyup(function(e){
		if(e.keyCode==13)
		{
			return false;
		}
	})
  </script>
</body>
</html>