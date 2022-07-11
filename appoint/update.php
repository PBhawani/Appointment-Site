
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="style.css">

 </head>
  <body>
  <?php

require_once'conne.php';

session_start();
$appoint_id=$_GET['appoint_id'];
//echo $appoint_id;
$sql="select * from contact_form where appoint_id=$appoint_id";
 $result=mysqli_query($conn,$sql);
 $row=mysqli_fetch_assoc($result);
 //print_r($row);
 
	$appoint_id=$row['appoint_id'];
	$date=$row['date'];
	$name=$row['name'];
	$age=$row['age'];
	$sex=$row['sex'];
	$appoint_by=$row['appoint_by'];
	$email=$row['email'];
	$number=$row['number'];
	
	
?>

  <section class="contact" id="contact">

   <h1 class="heading">update appointment</h1>

   <form action="edit.php" method="POST">
      <?php 
         if(isset($message)){
            foreach($message as $message){
               echo '<p class="message">'.$message.'</p>';
            }
         }
      ?>
	  <input type="hidden" name="appoint_id" value="<?php echo $appoint_id?>">
      <span>your name :</span>
      <input type="text" name="name" placeholder="enter your name" class="box" value="<?php echo $name?>" required>
	  
	  <span>your age :</span>
      <input type="number" name="age" placeholder="enter your age" class="box" value="<?php echo $age?>" required>
	  <span>sex :</span><br>
      <input type="radio"name="sex"value="m"class="">Male <input type="radio"name="sex"value="f"class="">Female <input type="radio"name="sex"value="o"class="">Other<br><br>
	  <span>appointment with :</span>
      <select name="appoint_by" class="box" required>
	  <option value="<?php echo $appoint_by?>" disabled selected hidden>select your option...</option>
	  <option>Genral Physician</option>
	  <option>Dermatologist</option>
	  <option>Dentist</option>
	  <option>Pediatrician</option>
	  <option>Gynaecologist</option>
	  <option>Cardiologist</option>
	  </select>
      <span>your email :</span>
      <input type="email" name="email" placeholder="enter your email" class="box" value="<?php echo $email?>"required>
      <span>your phone number :</span>
      <input type="number" name="number" placeholder="enter your number" class="box"value="<?php echo $number?>" required>
      <span>appointment date :</span>
      <input type="datetime-local" name="date" class="box" value="<?php echo $date?>" required>
      <input type="submit" value="update appointment" name="submit" class="link-btn">
   </form>  
   </body>
</html>










