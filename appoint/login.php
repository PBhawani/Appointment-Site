<?php
   include("conne.php");
   session_start();
   
   if(isset($_SESSION['username']))
   {
	   header("location:index.php");
	   exit;
   }
	   require_once"conne.php";
   $username=$password="";
   $err="";
   
   if($_SERVER['REQUEST_METHOD']=="POST"){
   if(empty(trim($_POST['username']))||(empty(trim($_POST['password']))))
	   {
		   $err="Plese enter username + password";
	   }
	   else{
		   $username=trim($_POST['username']);
		   $password=trim($_POST['password']);
	   }
	   
	   if(empty($err))
	   {
		   $sql="SELECT user_id, username,password FROM user_details WHERE username=?";
		   $stmt=mysqli_prepare($conn,$sql);
	   	   mysqli_stmt_bind_param($stmt,"s",$param_username);
		   $param_username=$username;
		   
		   if(mysqli_stmt_execute($stmt)){
			   mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt)==1)
				{
					mysqli_stmt_bind_result($stmt,$user_id,$username,$hashed_password);
					if(mysqli_stmt_fetch($stmt))
					{
						if(password_verify($password,$hashed_password))
						{
							session_start();
							$_SESSION["username"]=$username;
							$_SESSION["user_id"]=$user_id;
							$_SESSION["loggedin"]=true;
							
							header("location:index.php");
						}
					}
				}
		   }
	   }
   }
   
?>
<html>
   
   <head>
      <title>Login Page</title>
      <style>
      header .header{
  background-color: #fff;
  height: 45px;
}
header a img{
  width: 134px;
margin-top: 4px;
}
.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.login-page .form .login{
  margin-top: -31px;
margin-bottom: 26px;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background-color: #008B8B;
  background-image: linear-gradient(45deg,#008B8B,#00CED1);
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}

body {
  background-color:#00CED1;
  background-image: linear-gradient(45deg,#00CED1,#008B8B);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

      </style>
      
   </head>
   
   <body bgcolor = "#00CED1">
	
      <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>LOGIN</h3>
            <p>Please enter your credentials to login.</p>
          </div>
        </div>
		<form action=""method="post"class="login-form">
          <input type="text" placeholder="username"name = "username" id="username" class = "box"/>
          <input type="password" placeholder="password"name = "password"id="password" class = "box"/>
          <button>login</button>
          <p class="message">Not registered? <a href="account.php">Sign Up</a></p>
        </form>
				
         
				
         </div>
			
      </div>

   </body>
</html>