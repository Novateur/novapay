<?php
session_start();
require_once("db.inc");

function sanitize($input)
{
	$my_input=htmlspecialchars(addslashes(trim($input)));
	return $my_input;
}

function get_time_interval_sm($date){
	$mydate=date("Y-m-d H:i:s");
	$theDiff="";
	$datetime1 = date_create($date);
	$datetime2 = date_create($mydate);
	$interval = date_diff($datetime1, $datetime2);
	$min = $interval->format('%i');
	$sec = $interval->format('%s');
	$hour = $interval->format('%h');
	$mon = $interval->format('%m');
	$day = $interval->format('%d');
	$year = $interval->format('%y');
	if($interval->format('%i%h%d%m%y')=="00000"){
		if($sec<10){
			return "just now";
		}
		else{
			return $sec." secs ";
		}
	}
	else if($interval->format('%h%d%m%y')=="0000"){
		if($min==1){
			return $min." min";
		}
		else{
			return $min." mins";
		}
	}
	else if($interval->format('%d%m%y')=="000"){
		if($hour==1){
			return $hour." hr";
		}
		else{
			return $hour." hrs";
		}
	}
	else if($interval->format('%m%y')=="00"){
		if($day==1){
			return $day." day";
		}
		else{
			return $day." days";
		}
	}
	else if($interval->format('%y')=="0"){
		if($mon==1){
			return $mon." mth";
		}
		else{
			return $mon." mths";
		}
	}
	else{
		if($year==1){
			return $year." yr";
		}
		else{
			return $year." yrs";
		}
	}
}

function check_email($email)
{
	global $connection;
	$sql="SELECT email FROM users WHERE email='{$email}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		return true;
	}
	else
	{
		return false;
	}
	
}

function get_user_id()
{
	global $connection;
	$sql="SELECT id FROM users WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['id'];
		}
	}
}

function get_user_login_id($email)
{
	global $connection;
	$sql="SELECT id FROM users WHERE email='{$email}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['id'];
		}
	}
}

function get_lastname()
{
	global $connection;
	$sql="SELECT lastname FROM users WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['lastname'];
		}
	}
}

function get_user_lastname($id)
{
	global $connection;
	$sql="SELECT lastname FROM users WHERE id={$id}";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['lastname'];
		}
	}
}

function get_firstname()
{
	global $connection;
	$sql="SELECT firstname FROM users WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['firstname'];
		}
	}
}

function get_user_firstname($id)
{
	global $connection;
	$sql="SELECT firstname FROM users WHERE id={$id}";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['firstname'];
		}
	}
}

function get_nationality()
{
	global $connection;
	$sql="SELECT nationality FROM users WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['nationality'];
		}
	}
}

function get_email()
{
	global $connection;
	$sql="SELECT email FROM users WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['email'];
		}
	}
}

function get_phone()
{
	global $connection;
	$sql="SELECT phone FROM users WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['phone'];
		}
	}
}

function get_user_phone($id)
{
	global $connection;
	$sql="SELECT phone FROM users WHERE id={$id}";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['phone'];
		}
	}
}

function get_add1()
{
	global $connection;
	$sql="SELECT add1 FROM users WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['add1'];
		}
	}
}

function get_add2()
{
	global $connection;
	$sql="SELECT add2 FROM users WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['add2'];
		}
	}
}

function get_dob()
{
	global $connection;
	$sql="SELECT dob FROM users WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['dob'];
		}
	}
}

function get_photo()
{
	global $connection;
	$sql="SELECT photo FROM users WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['photo'];
		}
	}
}

function get_joined()
{
	global $connection;
	$sql="SELECT joined FROM users WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['joined'];
		}
	}
}

function check_card()
{
	global $connection;
	$id = get_user_id();
	$sql="SELECT * FROM cards WHERE user_id={$id}";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function check_login_card($email)
{
	global $connection;
	$id = get_user_login_id($email);
	$sql="SELECT * FROM cards WHERE user_id={$id}";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function check_status()
{
	global $connection;
	$sql="SELECT status FROM users WHERE email='{$_SESSION['username']}' AND status=0";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function check_activated($email)
{
	global $connection;
	$sql="SELECT status FROM users WHERE email='{$email}' AND status=1";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function change_card()
{
	global $connection;
	$id = get_user_id();
	$sql="SELECT * FROM cards WHERE user_id={$id}";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			$last_four = substr($r['card_num'],-4);
			echo "<option value='{$r['id']}'> {$r['type']} x-{$last_four}</option>";
		}
	}
	else
	{
		echo "No card found";
	}
}

function confirm_pass($pass)
{
	global $connection;
	$sql="SELECT * FROM users WHERE password='{$pass}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function get_code()
{
	global $connection;
	$sql="SELECT veri_code FROM users WHERE email='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['veri_code'];
		}
	}
}
