<?php
session_start();
	include 'conne.php';
   
	?>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
.t1{
	color:white  
}
#h1{
	width:100%;
	height:160px;
	font-size:60px;
	color:white;
	text-align:center;
	padding:40px;
	background-color:#20B2AA;
	box-sizing:border-box;
	text-shadow:2px 2px 4px #000000;
}

.d1{
	border-collapse:collaps;
	margin:25px 0;
	padding-top:200px;
	font-size:1em;
	min-width:1000px;
	position:absolute;
	flex-wrap:wrap;
	top:250px;
	left:150px;
	border-radius:5px 5px 0 0;
	overflow:hidden;
	float:bottom;
	box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.d1 container{
	padding:20px;
}
.d1 thead tr{
	background-color:teal;
	color:white;
	text-align:center;
	font-weight:bold;
}
.d1 th,
.d1 td{
	padding:12px 12px;
	text-align:center;
}
.d1 tbody tr:last-of-type{
	border-bottom:2px solid teal;
}
.d1 tbody tr{
	background-color:#E0FFFF;
	border-bottom:2px solid gray;
}
.container{
	background-color:white;
}
</style>
</head>
<body style="background-color:#F0FFFF;">
<div id="h1">Appointment Details</div>
<div class="container">
  
  <table class="d1">
  <thead>
    <tr>
      <th scope="col">APPOINTMENT ID</th>
      <th scope="col">DATE & TIME</th>
      <th scope="col">NAME</th>
      <th scope="col">AGE</th>
      <th scope="col">SEX</th>
	  <th scope="col">APPOINTMENT BY</th>
	  <th scope="col">NUMBER</th>
	  <th scope="col">EMAIL</th>
	  <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  
  <?php
  $username=$_SESSION["username"];
$query1="select * from user_details where username='$username'";
$result1=mysqli_query($conn,$query1);
$row=mysqli_fetch_assoc($result1);
$user_id=$row["user_id"];
  $query="select * from contact_form where id=$user_id";
  $result=mysqli_query($conn,$query);
  if($result)
  {
	  while($row=mysqli_fetch_assoc($result))
	  {
		  $id=$row['id'];
		  $appoint_id=$row['appoint_id'];
		  $date=$row['date'];
		  $name=$row['name'];
		  $age=$row['age'];
		  $sex=$row['sex'];
		  $appoint_by=$row['appoint_by'];	  
          $number=$row['number'];
          $email=$row['email'];
		  
		  echo"<tr><td scope='row'>$appoint_id</td>
		  <td>$date</td>
		  <td>$name</td>
		  <td>$age</td>
		  <td>$sex</td>
		  <td>$appoint_by</td>
		  <td>$number</td>
		  <td>$email</td>
		  <td><button class='btn btn-info'><a href='update.php?appoint_id=$appoint_id'class='t1'>Update</a></button>
          <button class='btn btn-danger'><a href='delete.php?appoint_id=$appoint_id'class='t1'>Cancel</a></button>
          </td>
	   </tr>";
	  }
  }
  
  ?>
  
 </table>
 
 </div>
  </body>
  </html>
