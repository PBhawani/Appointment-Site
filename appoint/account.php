<?php 
require_once"conne.php"; 
$username=$password=$confirm_password="";
$username_err=$password_err=$confirm_password_err="";
if($_SERVER['REQUEST_METHOD']=="POST")
{
	if (empty(trim($_POST["username"])))
	{
		$username_err="Username cannot be blank";
	}
	else{
		$sql="SELECT user_id FROM user_details WHERE username=?";
		$stmt=mysqli_prepare($conn,$sql);
		if($stmt)
		{
			mysqli_stmt_bind_param($stmt,"s",$param_username);
			$param_username=trim($_POST['username']);
			if(mysqli_stmt_execute($stmt)){
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt)==1)
				{
					$username_err="This username is already taken";
				}
				else{
					$username=trim($_POST['username']);
				}
			}
			else{
				echo "Something went wrong";
			}
		}
	}
	mysqli_stmt_close($stmt);
	
if(empty(trim($_POST['password']))){
	$password_err ="Password cannot be blank";
}
elseif(strlen(trim($_POST['password']))<6){
	$password_err="Password cannot be less then 6 characters";	
}
else{
	$password=trim($_POST['password']);
}
if(trim($_POST['password'])!=trim($_POST['confirm_password'])){
	$password_err = "Password should match";
}

if (empty($username_err)&&empty($password_err)&&empty($confirm_password_err))	
	
	{
		$sql="INSERT INTO user_details(username,password)VALUES(?,?)";
		$stmt=mysqli_prepare($conn,$sql);
		if($stmt)
		{
			mysqli_stmt_bind_param($stmt,"ss",$param_username,$param_password);
			$param_username=$username;
			$param_password=password_hash($password,PASSWORD_DEFAULT);
			if(mysqli_stmt_execute($stmt))
			{
				header("location:login.php");
			}
			else{
				echo"something went wrong..cannot redirect!";
			}
		}
		mysqli_stmt_close($stmt);
	}
mysqli_close($conn);
}
?>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
 <style>
 header .header{
  background-color: #fff;
  height: 45px;
}
header a img{
  width: 134px;
margin-top: 4px;
}
.signup-page {
  width: 500px;
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
  max-width: 500px;
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
	
      <div class="signup-page-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>SIGNUP TO YOUR WEBSITE</h3>
            <p>Please enter your credentials to signup.</p>
          </div>
        </div>
		<form action="" method="post"class="login-form">
          <input type="text" placeholder="username"name = "username" id="username"class = "box"/>
          <input type="password" placeholder="password"name = "password" class="box"/>
		  <input type="password" placeholder="confirm password"name = "confirm_password" class="box"/>
          <button>Sign Up</button>
          <p class="message">Already have a member? <a href="login.php">Login</a></p>
        </form>

</body>
  
</html>