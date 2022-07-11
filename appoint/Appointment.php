<?php

include("conne.php");
session_start();
$username=$_SESSION["username"];
$query="select * from user_details where username='$username'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
$user_id=$row["user_id"];




if(isset($_POST['submit']))
{

   $appoint_id = mysqli_real_escape_string($conn, $_POST['appoint_id']);
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $age = mysqli_real_escape_string($conn, $_POST['age']);
   $sex = mysqli_real_escape_string($conn, $_POST['sex']);
   $appoint_by = mysqli_real_escape_string($conn, $_POST['appoint_by']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $date = $_POST['date'];

   $insert = mysqli_query($conn, "INSERT INTO `contact_form`(appoint_id, id, name, age, sex, appoint_by, email, number, date) VALUES('$appoint_id','$user_id','$name','$age','$sex','$appoint_by','$email','$number','$date')") or die('query failed');

   if($insert){
	 
      $message[] = 'appointment made successfully!';
			  
   }else{
      $message[] = 'appointment failed';
   }
   header("location:report.php");
}

?>
<?php 

if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!==true)
{
header("location:login.php");	
}
?>

<html>
<head>
<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">
   <script src="https://kit.fontawesome.com/a99c977b93.js" crossorigin="anonymous"></script>
<style>


</style>
</head>
<body>
<section class="contact" id="contact">

   <h1 class="heading">make appointment</h1>
   

   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <?php 
         if(isset($message)){
            foreach($message as $message){
               echo '<p class="message">'.$message.'</p>';
            }
         }
      ?>
      <span>your name :</span>
      <input type="text" name="name" placeholder="enter your name" class="box" required>
	  <span>your age :</span>
      <input type="number" name="age" placeholder="enter your age" class="box" required>
	  <span>sex :</span><br>
      <input type="radio"name="sex"value="m"class="">Male <input type="radio"name="sex"value="f"class="">Female <input type="radio"name="sex"value="o"class="">Other<br><br>
	  <span>appointment with :</span>
      <select name="appoint_by" class="box" required>
	  <option value="" disabled selected hidden>select your option...</option>
	  <option>Genral Physician</option>
	  <option>Dermatologist</option>
	  <option>Dentist</option>
	  <option>Pediatrician</option>
	  <option>Gynaecologist</option>
	  <option>Cardiologist</option>
	  </select>
      <span>your email :</span>
      <input type="email" name="email" placeholder="enter your email" class="box" required>
      <span>your phone number :</span>
      <input type="telNo" name="number" placeholder="enter your number" class="box" required>
      <span>appointment date :</span>
      <input type="datetime-local" name="date" class="box" required>
      <input type="submit" value="request appointment" name="submit" class="link-btn">
   </form>  
</body>
</html>