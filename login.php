<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Payment :: login</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/icon.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />  
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
    <style>
	.empty	{color:red}
	#loading1 {background:rgba(255,255,255,0.7);height:1600px;width:100%;z-index:5000;top:0px;position:fixed;opacity:1;left:0px}
	#loader {color:black;margin:300px auto;width:80px;height:24px}
  </style>
</head>
<body class="">
  <div id="loading1"style='display:none'><div id="loader"><img src="images/logo.png"/></div></div>
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xl">
		<?php
			if(isset($_GET['closed_account']) && !empty($_GET['closed_account']))
			{
				echo "<div class='alert alert-danger'>You have successfully closed your account. <a href='account_type.php'>Create new account</a></div>";
			}
		?>
      <a class="navbar-brand block" href="index.html">Novateur Payment</a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>Sign in to get in touch</strong>
        </header>
        <form action="index.php" id="signin_form">
          <div class="list-group">
            <div class="list-group-item">
			  <div id="email_msg"></div>
              <input type="email" placeholder="Email" class="form-control rounded" name="email" id="email">
            </div>
            <div class="list-group-item">
			   <div id="pass_msg"></div>
               <input type="password" placeholder="Password" class="form-control rounded" name="password" id="password">
            </div>
          </div>
          <button type="submit" class="btn btn-lg btn-danger btn-rounded btn-block">Sign in</button>
          <div class="text-center m-t m-b"><a href="#" onclick="$('#forget').modal('show')"><small>Forgot password?</small></a></div>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small>Do not have an account?</small></p>
          <a href="account_type.php" class="btn btn-lg btn-default btn-rounded btn-block">Create an account</a>
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>Novateur Nigeria Limited<br>&copy; 2016</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  			<div id="error_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="width:500px;margin-top:100px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class="i i-notification"></i> Error</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px'>
							Invalid Email/Password combination,If you've forgotten your password you can simply click on the <b>forgot password</b> link and follow the steps 
						</div>
						<div class="modal-footer">
							<a href='#' data-role='button' class="btn btn-danger btn-rounded" data-dismiss="modal" aria-hidden="true">OK</a>
						</div>
					</div>
				</div>
			</div>
			<div id="forget" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="width:500px;margin-top:100px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class="i i-pencil"></i> Reset password</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px'>
							<input type="email" id="reset_email" name="reset_email" placeholder="Email" class="form-control rounded"/><br/>							
						</div>
						<div class="modal-footer">
							<a href='#' data-role='button' class="btn btn-default btn-rounded" data-dismiss="modal" aria-hidden="true">Cancel</a>
							<button class="btn btn-danger btn-rounded" onclick="reset_pass()">Reset my password</button>
						</div>
					</div>
				</div>
			</div>			
			<div id="response" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="width:500px;margin-top:100px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class="i i-pencil"></i> Reset password</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px' id="reset_response">
														
						</div>
						<div class="modal-footer">
							<a href='#' data-role='button' class="btn btn-danger btn-rounded" data-dismiss="modal" aria-hidden="true">Ok</a>
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
  <script src="js/app.plugin.js"></script>
  <script>
	$('#signin_form').submit(function(e){
		e.preventDefault();
		
		var email = $('#email').val();
		var pass = $('#password').val();
		
		if(email=="" || pass=="")
		{
			if(email=="")
			{
				$('#email_msg').html("<div class='alert alert-danger'>The email field can't be empty</div>");
			}			
			if(pass=="")
			{
				$('#pass_msg').html("<div class='alert alert-danger'>The password field can't be empty</div>");
			}
		}
		else
		{
			document.getElementById("loading1").style.display="block";
				$.ajax({
					url:"handler/login.php",
					type:"POST",
					data: new FormData(this),
					cache:false,
					contentType:false,
					processData:false,
					success:function(data)
					{
						//alert(data);
						if(data=="yes")
						{
							location.assign("dashboard.php");
						}
						else if(data=="deactivated")
						{
							location.assign("confirm_verify.php");
						}						
						else if(data=="cardless")
						{
							location.assign("add_card.php");
						}
						else
						{
							document.getElementById("loading1").style.display="none";
							$('#error_modal').modal('show');
						}
					}
				})
		}
	})
	function reset_pass()
	{
		var reset_email = $('#reset_email').val();
		if(reset_email=="")
		{
			document.getElementById("reset_email").style.border="1px solid red";
		}
		else
		{
			$.post("handler/reset_email.php",{reset_email:reset_email},function(response){
				$('#reset_response').html(response);
				$('#forget').modal('hide');
				$('#response').modal('show');
			})
		}
	}
  </script>
</body>
</html>