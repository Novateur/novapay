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
  <title>Payment :: Profile</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/icon.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />
  <link rel="stylesheet" href="js/datepicker/datepicker.css" type="text/css" />    
  
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body onload="get_emailphone()">
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
		<li>
		  <a href="wallet.php" class="dropdown-toggle">
            <i class='fa fa-briefcase'></i> Wallet
          </a>
        </li>
		        <li class="dropdown active">
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
					<div class="container" style="margin-top:0px">
						<div class="container">
								<div class='col-sm-12' id="paste_cards" style="font-size:15px">
									<div class='panel b-a col-sm-5'>
										<div class='panel-heading no-border bg-default lt'>
											<div>

											</div>
												
													<div class="row">
														<div  class="col-sm-3" style="margin-left:1px">
															<div class="row">
																<h2>Profile</h2>
															</div>
															<div class="row">
																<?php
																	$image = get_photo();
																	echo "<img src='uploads/{$image}' class='img-circle' with='100' height='100'style='border:4px solid #f2dede'>";
																?>
															</div>
															<div class="row">
																<a href="#" onclick="$('#change_dp').modal('show')"style="font-size:12px;color:blue;margin-left:10px">Update Photo</a>
															</div>
														</div>														
														<div  class="col-sm-9" style="margin-top:60px;margin-left:-60px">
															<h3 style="margin-left:60px"><?php echo get_firstname()." ".get_lastname();?></h3>
															<p style="margin-left:60px;font-size:13px" class="text-muted;font-size:10px">Joined in <?php echo get_joined(); ?><span class="pull-right"><a href="#" style="color:blue;font-size:12px" onclick="$('#edit_name_form').modal('show')">Edit</a></span></p>
														</div>
													</div>
										</div>
									</div>
									<div class='panel b-a col-sm-6'style="margin-left:20px;padding-bottom:10px">
										<div class='panel-heading no-border bg-default lt'>
											<div class="row">
												<div class="col-sm-12">
													<h2>Address</h2>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-6">
													<div class="row">
														<div class="col-sm-12">
															<?php echo get_add1(); ?>
														</div>
													</div>													
													<div class="row">
														<div class="col-sm-12">
															<a href="#" style="font-size:12px;color:blue" onclick="$('#edit_add1').modal('show')">Edit</a>
														</div>
													</div>
												</div>												
												<div class="col-sm-6" style="border-left:1px solid gray">
													<div class="row">
														<div class="col-sm-12">
															<?php echo get_add2(); ?>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-12">
															<a href="#" style="font-size:12px;color:blue" onclick="$('#edit_add2').modal('show')">Edit</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class='col-sm-12' id="paste_cards" style="font-size:15px">
										<div class='panel b-a col-sm-5'style="padding-bottom:10px">
											<div class='panel-heading no-border bg-default lt'>
												<div class="row">
													<div class="col-sm-12">
														<h2>Account Options</h2>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-8">
														<div class="row">
															<div class="col-sm-12">
																<select class="form-control rounded" id="nation" name="nation" onchange="update_nationality()">
																	<option value="<?php echo get_nationality(); ?>"><?php echo get_nationality(); ?></option>
																	<option value="Nigeria">Nigeria</option>
																	<option value="Ghana">Ghana</option>
																	<option value="United Kingdom">United Kingdom</option>
																</select>
															</div>
														</div>													
														<div class="row"><br/>
															<div class="col-sm-12">
																<a href="#" style="font-size:12px;color:blue" onclick="$('#close_account').modal('show')">Deactivate your account</a>
															</div>
														</div>
													</div>													
													<div class="col-sm-4">
														<div class="row">
															<p>Nationality</p>
														</div>													
													</div>												
												</div>
											</div>
										</div>
										<div class='panel b-a col-sm-6'style="margin-left:20px;padding-bottom:12px">
											<div class='panel-heading no-border bg-default lt'>
												<div class="row">
													<div class="col-sm-12">
														<p class="pull-right"><a href="#" style="font-size:20px" onclick="add_email()">+</a></p>
														<h2>Email Address</h2>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-8">
														<div class="row">
															<div class="col-sm-12">
																<p><?php echo get_email(); ?><span class="text-muted" style="font-size:13px"> (primary)</span></p>
															</div>
														</div>													
													</div>												
												</div>
												<div id="paste_emails">
												
												</div>
											</div>
										</div>										
									</div>
									<div class='col-sm-12' id="paste_cards" style="font-size:15px">
										<div class="col-sm-5">
										</div>
										<div class='panel b-a col-sm-6'style="margin-left:20px;padding-bottom:12px">
											<div class='panel-heading no-border bg-default lt'>
												<div class="row">
													<div class="col-sm-12">
														<p class="pull-right"><a href="#" style="font-size:20px" onclick="add_phone()">+</a></p>
														<h2>Phone</h2>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-8">
														<div class="row">
															<div class="col-sm-12">
																<p><?php echo get_phone(); ?><span class="text-muted" style="font-size:13px"> (primary)</span></p>
															</div>
														</div>													
													</div>												
													<div class="col-sm-4">
														<div class="row">
															<div class="col-sm-12">
																
															</div>
														</div>
													</div>
												</div>
												<div id="paste_phones">
												
												</div>
											</div>
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
  			<div id="change_dp" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="max-height:90px;margin-top:100px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class='fa i i-images'></i> Change profile image</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px'>
							<form id="change_dp_form">
								<input type="file" name="file1" id="file1" class="form-control rounded"/><br/>
								<p>Supported file format: The file to be uploaded must be one of the following file formats : .PNG, .JPEG, .JPG</p>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default btn-rounded" style="border:1px solid red" data-dismiss="modal" aria-hidden="true">Cancel</button>
							<button type="submit" class="btn btn-danger btn-rounded" >Upload image</button>
						</div>
							</form>
					</div>
				</div>
			</div>  			
			<div id="close_account" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="width:450px;margin-top:90px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class='i i-trashcan'></i> Deactivate account</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px'>
							Are you sure you want to deactivate your account, once you proceed with this action there is no going back.
						</div>
						<div class="modal-footer">
							<button class="btn btn-default btn-rounded" style="border:1px solid red" data-dismiss="modal" aria-hidden="true">Cancel</button>
							<button type="button" class="btn btn-danger btn-rounded" onclick="close_account()">Proceed</button>
						</div>
					</div>
				</div>
			</div>			
			<div id="edit_name_form" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="width:450px;margin-top:90px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class='i i-pencil'></i> Edit name</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px'>
							<form id="edit_name">
								<?php
									$firstname = get_firstname();
									$lastname = get_lastname();
									echo "<label>First name</label><br/>
									<input type='text' value=\"{$firstname}\" name='first_name' id='fname' class='form-control rounded'><br/>
									<label>Last name</label><br/>
									<input type='text' value=\"{$lastname}\" name='last_name' id='lname' class='form-control rounded'><br/>";
								?>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default btn-rounded" style="border:1px solid red" data-dismiss="modal" aria-hidden="true">Cancel</button>
							<button type="button" class="btn btn-danger btn-rounded" onclick="save_name()">Save</button>
							</form>
						</div>
					</div>
				</div>
			</div>			
			<div id="edit_add1" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="width:450px;margin-top:90px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class='i i-pencil'></i> Edit primary address</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px'>
							<form id="edit_add1">
								<?php
									$add1 = get_add1();
									echo "<label>Primary Adress</label><br/>
									<input type='text' class='form-control rounded' value=\"{$add1}\" name='add1' id='add1'>";
								?>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default btn-rounded" style="border:1px solid red" data-dismiss="modal" aria-hidden="true">Cancel</button>
							<button type="button" class="btn btn-danger btn-rounded" onclick="save_add1()">Save</button>
							</form>
						</div>
					</div>
				</div>
			</div>			
			<div id="edit_add2" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="width:450px;margin-top:90px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class='i i-pencil'></i> Edit secondary address</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px'>
							<form id="edit_add2">
								<?php
									$add2 = get_add2();
									echo "<label>Secondary Adress</label><br/>
									<input type='text' class='form-control rounded' value=\"{$add2}\" name='add2' id='add2'>";
								?>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default btn-rounded" style="border:1px solid red" data-dismiss="modal" aria-hidden="true">Cancel</button>
							<button type="button" class="btn btn-danger btn-rounded" onclick="save_add2()">Save</button>
							</form>
						</div>
					</div>
				</div>
			</div>									
			<div id="edit_emailphone" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="width:450px;margin-top:90px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class='i i-pencil'></i> Edit contact details</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px' id="paste_emailphone">
							
						</div>
						<div class="modal-footer">
							<button class="btn btn-default btn-rounded" style="border:1px solid red" data-dismiss="modal" aria-hidden="true">Cancel</button>
							<span id="paste_btn"></span>
						</div>
					</div>
				</div>
			</div>			
			<div id="add_emailphone" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog" style="width:450px;margin-top:90px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<p class="modal-title" id="myModalLabel"style="font-size:13px"><h4><i class='i i-pencil'></i> Add contact details</h4></p>
						</div>
						<div class="modal-body" style='font-size:14px' id="paste_addemailphone">
							
						</div>
						<div class="modal-footer">
							<button class="btn btn-default btn-rounded" style="border:1px solid red" data-dismiss="modal" aria-hidden="true">Cancel</button>
							<span id="paste_addbtn"></span>
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
  <script src="js/app.plugin.js"></script>
  <script>
	$('#change_dp_form').submit(function(e){
		e.preventDefault();
		var image_file = $('#file1').val();
		if(image_file=="")
		{
			document.getElementById("file1").style.border="1px solid red";
		}
		else
		{
			$.ajax({
					url:"handler/update_dp.php",
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
							location.reload(true);
						}
						else
						{
							alert(data);
						}
					}
			})
		}
	})
	function close_account()
	{
		$.get("handler/close_account.php",function(response){
			if(response=="closed")
			{
				location.assign("login.php?closed_account=closed");
			}
			else
			{
				alert(response);
			}
		})
	}
	function save_name()
	{
		var fname = $('#fname').val();
		var lname = $('#lname').val();
		
		if(fname=="" || lname=="")
		{
			if(fname=="")
			{
				document.getElementById("fname").style.border="1px solid red";
			}			
			if(lname=="")
			{
				document.getElementById("lname").style.border="1px solid red";
			}
		}
		else
		{
			$.post("handler/update_name_pro.php",{fname:fname,lname:lname},function(response){
				if(response=="updated")
				{
					location.reload(true);
				}
				else
				{
					alert(response);
				}
			})
		}
	}
	function update_nationality()
	{
		var nation = $('#nation').val();
		if(nation=="")
		{
			document.getElementById("nation").style.border="1px solid red";
		}
		else
		{
			$.post("handler/update_nationality.php",{nation:nation},function(response){
				if(response=="updated")
				{
					location.reload(true);
				}
				else
				{
					alert(response);
				}
			})
		}
	}	
	function save_add1()
	{
		var address = $('#add1').val();
		if(address=="")
		{
			document.getElementById("add1").style.border="1px solid red";
		}
		else
		{
			$.post("handler/update_address1.php",{address:address},function(response){
				if(response=="updated")
				{
					location.reload(true);
				}
				else
				{
					alert(response);
				}
			})
		}
	}	
	function save_add2()
	{
		var address = $('#add2').val();
		if(address=="")
		{
			document.getElementById("add2").style.border="1px solid red";
		}
		else
		{
			$.post("handler/update_address2.php",{address:address},function(response){
				if(response=="updated")
				{
					location.reload(true);
				}
				else
				{
					alert(response);
				}
			})
		}
	}	
	function save_email(id)
	{
		var email = $('#edit_my_mail').val();
		if(email=="")
		{
			document.getElementById("edit_my_mail").style.border="1px solid red";
		}
		else
		{
			$.post("handler/update_email.php",{email:email,id:id},function(response){
				if(response=="updated")
				{
					location.reload(true);
				}
				else
				{
					alert(response);
				}
			})
		}
	}	
	function save_phone(id)
	{
		var phone = $('#edit_my_phone').val();
		if(phone=="")
		{
			document.getElementById("edit_my_phone").style.border="1px solid red";
		}
		else
		{
			$.post("handler/update_phone.php",{phone:phone,id:id},function(response){
				if(response=="updated")
				{
					location.reload(true);
				}
				else
				{
					alert(response);
				}
			})
		}
	}	
	function save_phone_add()
	{
		var phone = $('#add_my_phone').val();
		if(phone=="")
		{
			document.getElementById("add_my_phone").style.border="1px solid red";
		}
		else
		{
			$.post("handler/add_phone.php",{phone:phone},function(response){
				if(response=="added")
				{
					$('#add_emailphone').modal('hide');
					$.get("handler/get_phones.php",function(response){
						$('#paste_phones').html(response);
					})
				}	
				else
				{
					alert(response);
				}
			})
		}
	}	
	function save_email_add()
	{
		var email = $('#add_my_email').val();
		if(email=="")
		{
			document.getElementById("add_my_email").style.border="1px solid red";
		}
		else
		{
			$.post("handler/add_email.php",{email:email},function(response){
				if(response=="added")
				{
					$('#add_emailphone').modal('hide');
					$.get("handler/get_emails.php",function(response){
						$('#paste_emails').html(response);
					})
				}
				else
				{
					alert(response);
				}
			})
		}
	}
	function add_phone()
	{
		$('#paste_addemailphone').html("<input type='text' name='add_my_phone' id='add_my_phone' class='form-control rounded' placeholder='New phone number'/>");
		$('#paste_addbtn').html("<button type='button' class='btn btn-danger btn-rounded' onclick=\"save_phone_add()\">Add</button>");
		$('#add_emailphone').modal('show');	}	
	function add_email()
	{
		$('#paste_addemailphone').html("<input type='text' name='add_my_email' id='add_my_email' class='form-control rounded' placeholder='New email'/>");
		$('#paste_addbtn').html("<button type='button' class='btn btn-danger btn-rounded' onclick=\"save_email_add()\">Save</button>");
		$('#add_emailphone').modal('show');
	}
	function get_emailphone()
	{
		$.get("handler/get_emails.php",function(response){
			$('#paste_emails').html(response);
		})		
		$.get("handler/get_phones.php",function(response){
			$('#paste_phones').html(response);
		})
	}
	function edit_email(email,id)
	{
		$('#paste_emailphone').html("<input type='text' name='edit_my_mail' id='edit_my_mail' value='"+email+"' class='form-control rounded'/>");
		$('#paste_btn').html("<button type='button' class='btn btn-danger btn-rounded' value="+id+" onclick=\"save_email(this.value)\">Save</button>");
		$('#edit_emailphone').modal('show');
	}	
	function edit_phone(phone,id)
	{
		$('#paste_emailphone').html("<input type='text' name='edit_my_phone' id='edit_my_phone' value='"+phone+"' class='form-control rounded'/>");
		$('#paste_btn').html("<button type='button' class='btn btn-danger btn-rounded' value="+id+" onclick=\"save_phone(this.value)\">Save</button>");
		$('#edit_emailphone').modal('show');
	}	
	function remove_email(id)
	{
		$.post("handler/remove_email.php",{id:id},function(response){
			if(response=="removed")
			{
				$.get("handler/get_emails.php",function(response){
					$('#paste_emails').html(response);
				})
			}
			else
			{
				alert(response);
			}
		})
	}	
	function remove_phone(id)
	{
		$.post("handler/remove_phone.php",{id:id},function(response){
			if(response=="removed")
			{
				$.get("handler/get_phones.php",function(response){
					$('#paste_phones').html(response);
				})
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