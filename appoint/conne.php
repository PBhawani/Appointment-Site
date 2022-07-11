<?php

$conn = mysqli_connect('localhost','root','','appointment') ;
if(!$conn)
{
	
	die(mysql_error($conn));
}

?>