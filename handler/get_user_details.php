<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$email = sanitize($_POST['email']);
	
	$sql = "SELECT * FROM users WHERE email='{$email}' AND status=0 OR phone='{$email}' AND status=0";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{	
		echo "<div class='row'>";
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			echo "<div class='col-md-12'>
				<div class='panel b-a'>
					<div class='panel-heading no-border bg-default lt'>
						<div style='margin-top:30px' class='text-center'>
							<p><img src='uploads/{$r['photo']}' width='110' height='110' class='img-circle' style='border:4px solid #f2dede'/><p>
							<p style='font-size:15px'>You're sending to <span style='color:#5bc0de'>{$email}</span></p>
							<p>
								<div class='text-center'><sup style='font-size:25px' id='naira_sign'>&#8358;</sup><span id='parsed' onclick=\"get_amount()\" style='font-size:50px'>0.00</span></div>
								<div class='inline v-middle' style='margin-left:-110px'>
								  <div class='input-group input-s-sm'>
									  <input type='text' id='appendedInput' name='appendedInput' class='input-lg form-control no-border' style='width:100px;color:#fff'>
									  <div class='input-group-btn'>
										<button class='btn btn-default btn-lg dropdown-toggle no-border' data-toggle='dropdown' id='ngn_btn'>
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
						</div>
					</div>
					<div class='padder-v text-center clearfix' style='height:20px;background-color:#fff'>                            
						<div class='col-xs-12 b-r'>
						</div>
					</div>
				</div>
			</div>			
			<div class='col-md-12' style='display:none' id='payment_proceed'>
				<div class='panel b-a'>
					<div class='panel-heading no-border bg-default lt'>
						<div>
							<a href='#' id='show_cards_target' onclick=\"show_cards()\"><i class='i i-arrow-right4 pull-right'></i></a>
							<b>You're paying with</b><hr/>
							<p id='change_card' style='display:none'>
								<select class='form-control rounded' name='card' id='card'>";
										change_card();
								echo "</select><br/>
								<button type='button' onclick=\"change_card()\" class='btn btn-danger btn-rounded btn-sm'>Save</button>
							</p>
							<div class='row'>
								<div class='col-sm-8' id='paste_default'>
									
								</div>							
								<div class='col-sm-4'>
									<div class='pull-right' id='paste_amount'>
										
									</div>
								</div>
							</div>
							<div class='row'><br/><br/>
								<div class='col-sm-8'>
									<b>Total</b>
								</div>							
								<div class='col-sm-4'>
									<div class='pull-right' id='paste_total'>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class='padder-v text-center clearfix' style='height:20px;background-color:#fff'>                            
						<div class='col-xs-12 b-r'>
						</div>
					</div>
				</div>
			</div>

				<form id='send_payment_form'>
					<p class='text-center'>For more information please read <a href='#' style='color:#5bc0de'>our user agreement</a></p>
					<p class='text-center' id='continue_btn'><button type='button' class='btn btn-danger btn-rounded btn-lg' onclick=\"show_details()\">Continue</button></p>			
					<p class='text-center' id='submit_btn' style='display:none'><button type='button' class='btn btn-danger btn-rounded btn-lg' onclick=\"send_tranzact('{$email}')\">Send now</button></p>
					<p class='text-center'><a href='#' style='color:#5bc0de' onclick=\"location.reload(true)\" id='cancel'>Refresh</a> | <a href='make_payment.php' style='color:#5bc0de'>Back</a></p>
					<input type='hidden' name='amount' id='amount'><br/>
					<input type='hidden' name='id' id='id' value='{$r['id']}'><br/>
					<input type='hidden' name='email' id='email' value='{$r['email']}'><br/>
					<input type='hidden' name='card_num' id='card_num'><br/>
				</form>";
		}
		echo "</div>";
	}
	else
	{
		echo "<div class='alert alert-danger' style='font-size:15px'>Sorry no such user was found, but an email was sent to her to sign up with us<br/><br/>
		<a href='make_payment.php'>try again</a> | <a href='dashboard.php'>My dashboard</a></div>";
	}

?>