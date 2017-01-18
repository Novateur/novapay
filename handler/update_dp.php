<?php

require_once("../includes/db.inc");
require_once("../includes/functions.php");


	$tmp_file2=$_FILES['file1']['tmp_name'];
	$target_file2=basename($_FILES['file1']['name']);
	$size=$_FILES['file1']['size'];
	$type=$_FILES['file1']['type'];
	$extension=strtolower(substr($target_file2,strpos($target_file2,'.')+1));
	
	$rename = rand(0,10000)."USER".rand(0,10000).".".$extension;
	
	if($extension=="jpg" || $extension=="jpeg" || $extension=="png" && $size<=1000000){
		$upload_dir2="../uploads";
		$db_upload=move_uploaded_file($tmp_file2, $upload_dir2."/".$rename);
		$query=$connection->query("UPDATE users SET photo='{$rename}' WHERE email='{$_SESSION['username']}'");
		if($query)
		{
			echo "updated";
		}
		else
		{
			echo "Error: Sorry an error occured while trying to change your profile picture,please try again later";
		}
	}
	else
	{
		echo "Error: Uploaded file must be less than or equal to 1MB and must be in .png or .jpg or .jpeg format";
	}
?>