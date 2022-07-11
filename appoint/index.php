<?php

include("conne.php");
 
session_start();
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

</head>
<body>
   
<!-- header section starts  -->

<header class="header fixed-top">

   <div class="container">

      <div class="row align-items-center justify-content-between">

         <a href="#home" class="logo">appoint<span>pluse</span></a>

         <nav class="nav">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#process">services</a>
            <a href="#reviews">reviews</a>
			<a href="report.php">appointment details</a>
			
         </nav>
		
         <a href="logout.php" class="link-btn">Logout</a>
         </ul>
         <div id="menu-btn" class="fas fa-bars"></div>
<div>
		 <ul class="">
         <a class="link-btn"href="#"><center><img src="user_icon.jpg" alt=""><?php echo" hello ".$_SESSION['username']?></center></a>
         </div>
      </div>

   </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

   <div class="container">
  

      <div class="row min-vh-100 align-items-center">
         <div class="content text-center text-md-left">
            <h3>now you can book appointment with doctors easily</h3>
            <p>Relax you are at Right place</p>
            <a href="Appointment.php" class="link-btn">request appointment >></a>
         </div>
      </div>

   </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <div class="container">

      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="about.jpg" class="w-100 mb-5 mb-md-0" alt="">
         </div>

         <div class="col-md-6 content">
            <span>about us</span>
            <h3>True Healthcare For Your Family</h3>
            <p>We are committed to help you maintain your oral health as an integral part of your overall health and wellness.</p>
            <a href="#footer" class="link-btn">contact us</a>
         </div>

      </div>

   </div>

</section>

<!-- about section ends -->

<!-- services section starts  -->

<section class="services" id="services">

   <h1 class="heading">find doctors in top specialities</h1>

   <div class="box-container container">

      <div class="box">
         <img src="icon.jpg" alt="">
         <h3>genral physician</h3>
         <p>fever, cough & cold, high sugar & BP, infection, allergies, anaemia, nausea, body ache, etc.</p>
      </div>

      <div class="box">
         <img src="icon2.jpg" alt="">
         <h3>dermatologist</h3>
         <p>acne, hair loss, skin infection, dandruff, itchy skin, pigmentation, nail problem, warts/skin tags, etc.</p>
      </div>

      <div class="box">
         <img src="icon3.jpg" alt="">
         <h3>dentist</h3>
         <p>pain or swelling in mouth, bleeding gums, misalignment of teeth, cavities, dental implants & dentures, trouble chewing, mouth ulcer, bad breath, etc.</p>
      </div>

      <div class="box">
         <img src="icon4.jpg" alt="">
         <h3>pediatrician</h3>
         <p>fever, vaccintion, infection, development issue,jaundice, vomiting, stomach ache, genetic disorder, etc.</p>
      </div>

      <div class="box">
         <img src="icon5.jpg" alt="">
         <h3>gynaecologist</h3>
         <p>pregnancy, PCOD, infertility treatment, irregular priods, menopause, etc.</p>
      </div>

      <div class="box">
         <img src="icon6.jpg" alt="">
         <h3>cardiologist</h3>
         <p>atherosclerosis, high blood pressure, high colesterol, chest pain,sudden cardiac arrest, blood clots, heart failure, heart attack, stroke. etc.</p>
      </div>

   </div>

</section>

<!-- services section ends -->

<!-- process section starts  -->

<section class="process"id="process">

   <h1 class="heading">our services</h1>

   <div class="box-container container">

      <div class="box">
         <img src="process1.png" alt="">
         <h3>intensive care unit (ICU):</h3>
         <p></p>
      </div>

      <div class="box">
         <img src="process2.png" alt="">
         <h3>consultancy services:</h3>
         <p></p>
      </div>

      <div class="box">
         <img src="process4.jpg" alt="">
         <h3>Surgical Services:</h3>
         <p></p>
      </div>

   </div>

</section>

<!-- process section ends -->

<!-- reviews section starts  -->

<section class="reviews" id="reviews">

   <h1 class="heading"> satisfied clients </h1>

   <div class="box-container container">

      <div class="box">
         <img src="pic1.png" alt="">
         <p>Easy to use and does what it supposes to.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>ajay</h3>
         <span>satisfied client</span>
      </div>

      <div class="box">
         <img src="pic2.png" alt="">
         <p>I simply love this app. Now I can book my appointment online</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>nidhi</h3>
         <span>satisfied client</span>
      </div>

      <div class="box">
         <img src="pic3.png" alt="">
         <p>my experience with this app has been outstanding.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>vikram</h3>
         <span>satisfied client</span>
      </div>

   </div>

</section>

<!-- reviews section ends -->

<!-- footer section starts  -->

<section class="footer" id="footer">

   <div class="box-container container">

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>phone number</h3>
         <p>+123-456-7890</p>
         <p>+111-222-3333</p>
      </div>
      
      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>our address</h3>
         <p>Jamshedpur, India - 831001</p>
      </div>

      <div class="box">
         <i class="fas fa-clock"></i>
         <h3>opening hours</h3>
         <p>9:00am to 10:00pm</p>
      </div>

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>email address</h3>
         <p>abc@gmail.com</p>
         <p>xyz@gmail.com</p>
      </div>

   </div>

   <div class="credit"> <span>Appointpluse</span> -BHAWANI</div>

</section>

<!-- footer section ends -->

<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>