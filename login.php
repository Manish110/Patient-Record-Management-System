<?php
@include 'config.php';

session_start();

if(isset($_POST['submit'])){
	// $fname=mysqli_real_escape_string($conn, $_POST['fname']);
	// $lname=mysqli_real_escape_string($conn, $_POST['lname']);
	// $address=mysqli_real_escape_string($conn, $_POST['address']);
	// $gender= $_POST['gender'];
	$email=mysqli_real_escape_string($conn, $_POST['email']);
	$pass=md5($_POST['pwd']);
	// $user_type=$_POST['subject'];

	$rowcount = 0;
	$select="SELECT * FROM user_form  WHERE user_form.email='$email' && user_form.password='$pass'";

   
	$result= mysqli_query($conn, $select);

	$rowcount = mysqli_num_rows($result);

	if ($rowcount == 0) {
		$select="SELECT * FROM add_patient WHERE add_patient.email='$email' && add_patient.password='$pass'";

		$result= mysqli_query($conn, $select);
		$rowcount = mysqli_num_rows($result);
	}
	if($rowcount > 0){

		$row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['id'];
         header('location:admindash.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['id'];
         header('location:userdash.php');

      }
	
	  
     
   }else{
      $error[] = 'incorrect email or password!';
	}
	 
  
  };

?>





<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<style type="text/css">
			*{
				margin: 0;
				padding: 0;
			}
			body{
				background-image:url("login.jpg");
				background-position: top;
				background-size: cover;
				font-family: Ubuntu Mono;
				margin-top: 40px;
			}
			.regform{
				width: 800px;
				background-color: rgb(0,0,6);
				margin: auto;
				color: #FFFFFF;
				padding: 10px 0px 10px 0px;
				text-align: center;
				border-radius: 15px 15px 0px 0px;
			}
			.main{
				background-color: rgb(0,0,0,0.5);
				width: 800px;
				margin: auto;
			}

			form{
				padding: 10px;
			}
			#name{
				width: 100%;
				height: 100px;
			}

			.name{
				margin-left: 25px;
				margin-top: 30px;
				width: 125px;
				color: white;
				font-size: 18px;
				font-weight: 700;
			}
			.email{
				position: relative;
				left: 200px;
				top: -37px;
				line-height: 40px;
				width: 520px;
				border-radius: 6px;
				padding: 0 22px;
				font-size: 16px;
				color: #555;
			}
			.password{
				position: relative;
				left: 200px;
				top: -37px;
				line-height: 40px;
				width: 520px;
				border-radius: 6px;
				padding: 0 22px;
				font-size: 16px;
				color: #555;
			}
			.for{
				font-size: large;
				color: whitesmoke;
			}
			.for:hover{
				color: purple;
			}
			.button{
				background-color: transparent;
				display: block;
				margin: 20px 0px 0px 20px;
				text-align: center;
				border-radius: 12px;
				padding: 14px 110px;
				outline: none;
				color: white;
				cursor: pointer;
				transition: 0.25px;
				width: 95%;
				font-size: larger;
				font-weight: bold;
			}
			.button:hover{
				background-color: #5390F5;
			}
			.log{
				color: whitesmoke;
				font-size: large;
			}
			.logi{
				color: rgb(255, 0, 0);
			}
			.logi:hover{
				color: purple;
			}
			.pat{
				color: whitesmoke;
				font-size: x-large;
				text-align: center;
			}
			.pro{
            position: relative;
				left: 205px;
				top: -15px;
				font-family: Ubuntu Mono;
				font-size: large;
				line-height: 40px;
				border-radius: 6px;
        }
			</style>
	</head>
	<body>
		<div class="pat">
			<h1>Patient Record Keeping System</h1>

		</div>
		<div class="regform"><h1>Login</h1></div>
	<div class="main">
		<form action="" method="POST">
			
	<?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
    ?>


			<h2 class="name">Email</h2>
			<input class="email" type="email" name="email">

			<h2 class="name">Password</h2>
			<input class="password" type="password" required="required" name="pwd">

			<!-- <h2 class="name">User Type</h2>
			<select class="pro" name="subject">
				<option disabled="disabled" selected="selected" >Choose user type</option>
				<option value="user">Patient</option>
				<option value="admin">Admin</option>
			</select> -->

			<!-- <p><a href="some.php" class="for">Forgotten Password?</a></p> -->


			<input type="submit" name="submit" value="Login" class="button">
			<!-- <button type="submit" >Login</button> -->
			<p class="log">don't have an account?<a href="signup.php" class="logi" >Sign Up</a></a></p>

		</form>
	</div>
	</body>
</html>