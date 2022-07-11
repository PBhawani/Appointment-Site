<?php
require_once'conne.php';
//print_r($_POST);

	$appoint_id=$_POST['appoint_id'];
	$date=$_POST['date'];
	$name=$_POST['name'];
	$age=$_POST['age'];
	$sex=$_POST['sex'];
	$appoint_by=$_POST['appoint_by'];
	$email=$_POST['email'];
	$number=$_POST['number'];
	
	$sql="UPDATE `contact_form` SET `appoint_id`='$appoint_id',`name`='$name',`age`='$age',`sex`='$sex',
	`appoint_by`='$appoint_by',`number`='$number',`email`='$email',`date`='$date' WHERE appoint_id=$appoint_id";
	$update=mysqli_query($conn,$sql);
	if($update){
	$message[]='appointment updated successfully!';	
	header("Location:report.php");
	}
	else{
		$message[]='appointment failed';
	}
	
?>