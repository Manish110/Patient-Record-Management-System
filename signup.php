<?php
$emailErr ="";
$email="";
@include 'config.php';
if(isset($_POST['submit'])){
	$fname=mysqli_real_escape_string($conn, $_POST['fname']);
	$lname=mysqli_real_escape_string($conn, $_POST['lname']);
	$address=mysqli_real_escape_string($conn, $_POST['address']);
	$gender= $_POST['gender'];
	$dob=date('y-m-d', strtotime($_POST['birthday']));
	$email=mysqli_real_escape_string($conn, $_POST['email']);
	$pass=md5($_POST['pwd']);
	// $user_type=$_POST['subject'];

	$select="SELECT * FROM user_form WHERE email='$email' && password='$pass'";

	$result= mysqli_query($conn, $select);

	if(mysqli_num_rows($result) > 0){

		$error[] = 'user already exist!';
  
	 }else{
  
		// if($pass != $cpass){
		//    $error[] = 'password not matched!';
		// }else{
		   $insert = "INSERT INTO user_form(fname, lname, address, gender, dob, email, password) VALUES('$fname', '$lname', '$address', '$gender', '$dob', '$email', '$pass')";
		   mysqli_query($conn, $insert);
		   header('location:login.php');
		}
	 
		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
		  } else {
			$email = ($_POST["email"]);
			
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  $emailErr = "Invalid email format";
			}
		  }

  };

?>






<!DOCTYPE html>
<html>
	<head>
		<title>	Sign Up</title>
		<style type="text/css">
			*{
				margin: 0;
				padding: 0;
			}
			body{
				background-image:url("doctor.jpg");
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

			.main form .error-msg{
				margin:10px 0;
   				display: block;
   				background: crimson;
   				color:#fff;
   				border-radius: 5px;
   				font-size: 20px;
   				padding:10px;
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
			.firstname{
				position: relative;
				left: 200px;
				top: -37px;
				line-height: 40px;
				border-radius: 6px;
				padding: 0 22px;
				font-size: 16px;
			}
			.lastname{
				position: relative;
				left: 200px;
				top: -37px;
				line-height: 40px;
				border-radius: 6px;
				padding: 0 22px;
				font-size: 16px;
				color: #555;
			}
			.firstlabel{
				position: relative;
				color:  #E5E5E5;
				text-transform: capitalize;
				font-size: 14px;
				left: -46px;
				top: -5px;
			}
			.lastlabel{
				position: relative;
				color:  #E5E5E5;
				text-transform: capitalize;
				font-size: 14px;
				left: -46px;
				top: -5px;
			}
			.company{
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
			.code{
				position: relative;
				left: 200px;
				top: -37px;
				line-height: 40px;
				width: 95px;
				border-radius: 6px;
				padding: 0 22px;
				font-size: 16px;
				color: #555;
			}
			.number{
				position: relative;
				left: 200px;
				top: -37px;
				line-height: 40px;
				width: 285px;
				border-radius: 6px;
				padding: 0 22px;
				font-size: 16px;
				color: #555;
			}
			.area-code{
				position: relative;
				color: whitesmoke;
				text-transform: capitalize;
				font-size: 16px;
				left: 52px;
				top: -4px;
			}
			.phone-number{
				position: relative;
				color: whitesmoke;
				text-transform: capitalize;
				font-size: 16px;
				left: -140px;
				top: -4px;
			}
			.option{
				position: relative;
				left: 200px;
				top: -37px;
				line-height: 40px;
				width: 515px;
				height: 40px;
				border-radius: 6px;
				padding: 0 22px;
				font-size: 16px;
				color: #555;
				outline: none;
				overflow: hidden;
			}
			.option option{
				font-size: 20px;
			}
			#patient{
				margin-left: 25px;
				color: white;
				font-size: 18px;
			}
			.radio{
				display: inline-block;
				padding-right: 70px;
				font-size: 25px;
				margin-left: 25px;
				margin-top: 15px;
				color: white;
			}
			.radio input{
				width: 20px;
				height: 20px;
				border-radius: 50%;
				cursor: pointer;
				outline: none;
			}
			.user-type{
				position: relative;
				left: 200px;
				top: -37px;
				line-height: 40px;
				width: 550px;
				height: 40px;
				border-radius: 6px;
				padding: 0 22px;
				font-size: 16px;
				color: #555;
				outline: none;
				overflow: hidden;
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
				color: rgb(243, 60, 60);
			}
			.logi:hover{
				color: purple;
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
	<div class="regform"><h1>Sign Up</h1></div>
	<div class="main">
		<form method="POST">

		<?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

			<div id="name">
				<h2 class="name">Name</h2>
				<input class="firstname" type="text" required="required" name="fname" placeholder="Enter Your First Name">
				<label class="firstlabel">first name</label>
				<input class="lastname" type="text" required="required" name="lname" placeholder="Enter Your Last Name">
				<label class="lastlabel">last name</label>
			</div>
		
			<h2 class="name">Email</h2>
			<input class="email" type="email" name="email" placeholder="Enter your email"> <span> <?php echo $emailErr;?></span>

			<h2 class="name">Password</h2>
			<input class="company" type="password" name="pwd" pattern=".{8,}"  title="Must contain at least 8 or more characters" required="required" placeholder="Enter Password">

		

			<h2 class="name">Address</h2>
			<input class="company" type="text" required="required" name="address" placeholder="Enter your Address">

			<h2 class="name">Date of Birth</h2>
			<input class="option" type="date" required="required" id="birthday" name="birthday">

			<h2 id="patient">Gender</h2>

			<label class="radio">
				<input class="radio-one" type="radio" checked="checked" name="gender" value="m">
				<span class="checkmark"></span>
				Male
			</label>

			<label class="radio">
				<input class="radio-two" type="radio"  name="gender" value="f">
				<span class="checkmark"></span>
				Female
			</label>

			<label class="radio">
				<input class="radio-three" type="radio"  name="gender" value="o">
				<span class="checkmark"></span>
				Others
			</label>

			<!-- <h2 class="name">User Type</h2>
			<select class="pro" name="subject">
				<option disabled="disabled" selected="selected" >Choose user type</option>
				<option value="user">Patient</option>
				<option value="admin">Admin</option>
			</select> -->

			<input type="submit" name="submit" value="Signup" class="button" >

			<!-- <button name="submit" type="submit">Sign Up</button> -->
			<p class="log">already have an account?<a href="login.php" class="logi" >Login</a></a></p>

		</form>
	</div>


	<script>
		var length = document.getElementById("length");

		myInput.onkeyup = function() {
		

  		if(myInput.value.length >= 8) {
    		length.classList.remove("invalid");
    		length.classList.add("valid");
  		} else {
    		length.classList.remove("valid");
    		length.classList.add("invalid");
	}
}





</script>





</body>
</html>