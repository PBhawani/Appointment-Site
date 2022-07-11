<?php
include 'conne.php';
session_start();
	$appoint_id=$_GET['appoint_id'];
	$sql="delete from contact_form where appoint_id=$appoint_id";
    $delete=mysqli_query($conn,$sql);
	if($delete)
	{
    echo "Appointment cncelled successfully";
	header("Location:report.php");
	}
	else
	{
	   echo "Error deleting appointment". mysqli_error($conn);
	}
	mysqli_close($conn);

?>

