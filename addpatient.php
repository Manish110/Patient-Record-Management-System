<?php

$emailErr ="";
$email="";

@include 'config.php';

session_start();
if(!isset($_SESSION['admin_name'])){
	header('location:login.php');
 }

if(isset($_POST['submit'])){
	$fname=mysqli_real_escape_string($conn, $_POST['fname']);
	$lname=mysqli_real_escape_string($conn, $_POST['lname']);
	$diagnosis=mysqli_real_escape_string($conn, $_POST['diagnosis']);
	$pres=mysqli_real_escape_string($conn, $_POST['pres']);
	$address=mysqli_real_escape_string($conn, $_POST['address']);
	$gender= $_POST['gender'];
	$dob=date('y-m-d', strtotime($_POST['birthday']));
	$phone=$_POST['phone'];
	$email=mysqli_real_escape_string($conn, $_POST['email']);
	$pass=md5($_POST['pwd']);
	

	$select="SELECT * FROM add_patient WHERE email='$email' && password='$pass'";

	$result= mysqli_query($conn, $select);

	if(empty($_POST['phone'])){
		$error1="Please Enter Phone Number";
	}else if(strlen($_POST['phone'])<10){
		$error1="Phone Number should be of 10 digits";
	}else if(!preg_match("/^[6-9]\d{9}$/",$_POST['phone'])){
		$error1="Invalid";
	}

	if(mysqli_num_rows($result) > 0){

		$error[] = 'user already exist!';
  
	 }else{
  
		// if($pass != $cpass){
		//    $error[] = 'password not matched!';
		// }else{
		   $insert = "INSERT INTO add_patient(fname, lname, diagnosis, pres, address, gender, dob, phone, email, password ) VALUES('$fname', '$lname', '$diagnosis', '$pres', '$address', '$gender', '$dob', '$phone', '$email', '$pass')";
		   mysqli_query($conn, $insert);
		   header('location:addpat.php');
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
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1"> 
		<title>	Add Patient</title>
		<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel= "stylesheet" href="dash.css">
		<style type="text/css">
			*{
				margin: 0;
				padding: 0;
			}
			body{
				/* background-image:url("doctor.jpg"); */
				background-position: bottom;
				background-size: cover;
				/* font-family: Ubuntu Mono; */
				margin-top: 60px;
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
				/* background-color: rgb(0,0,0,0.5); */
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
				color: black;
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
				color:  black;
				text-transform: capitalize;
				font-size: 14px;
				left: -46px;
				top: -5px;
			}
			.lastlabel{
				position: relative;
				color:  black;
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
				width: 300px;
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
				width: 300px;
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
				width: 300px;
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
				width: 300px;
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
				color: black;
				font-size: 18px;
			}
			.radio{
				display: inline-block;
				padding-right: 70px;
				font-size: 25px;
				margin-left: 25px;
				margin-top: 15px;
				color: black;
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
				color: black;
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
				color: black;
				font-size: large;
			}
			.logi{
				color: rgb(243, 60, 60);
			}
			.logi:hover{
				color: purple;
			}
		</style>


	</head>
    <input type="checkbox" id="nav-toggle">
        <div class="sidebar">
            <div class="sidebar-brand">
                <h1><span class="las la-h-square"></span> <span>Patient Record</span></h1>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="admindash.php" ><span class="las la-igloo"></span><span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="addpat.php" class="active"><span class="las la-users"></span><span>Add Patients</span></a>
                    </li>
                   
                    <li>
                        <a href="adminprofile.php"><span class="las la-user-circle"></span><span>Admin Profile</span></a>
                    </li>
                    <li>
                        <a href="logout.php"><span class="las la-sign-out-alt"></span><span>Logout</span></a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="main-content">
            <header>
               <h2>
                    <label for="nav-toggle">
                        <span class="las la-bars"></span>
                    </label>

                    Add Patient
                </h2>

             


                <div class="user-wrapper">
				<a href="adminprofile.php"><img src="user.jpg" width="30px" height="30ox" alt=""></a>
                    <div>
					<?php
                        $email=$_SESSION['admin_name'];
                        $res=mysqli_query($conn,"select * from user_form where id= $email");
                        while($row=mysqli_fetch_array($res)){
                        
                        echo $row["fname"];  
                        }
                        ?><br>
                        <small>Admin</small>
                    </div>
                </div>
            </header>
<body>
	
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
				<input class="firstname" type="text" required="required" name="fname">
				<label class="firstlabel">first name</label>
				<input class="lastname" type="text" required="required" name="lname">
				<label class="lastlabel">last name</label>
			</div>

			<h2 class="name">Email</h2>
			<input class="email" type="email" name="email"> <span> <?php echo $emailErr;?></span>

			<h2 class="name">Password</h2>
			<input class="company" type="password" name="pwd" pattern=".{8,}" title="Must contain at least 8 or more characters" required="required">
		
			<h2 class="name">Diagnosis</h2>
			<input class="email" type="text" name="diagnosis">

			<h2 class="name">Prescription</h2>
			<input class="email" type="text" name="pres">

			<h2 class="name">Phone</h2>
			<input class="code" type="text"  name="phone" title="Please enter exactly 10 digits" pattern="[1-9]{1}[0-9]{9}"  required>
		
			

			<h2 class="name">Address</h2>
			<input class="company" type="text" required="required" name="address">

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

			
			<br>
			<input type="submit" name="submit" value="Add Patient" class="button">
			<!-- <button class="log" name="submit" type="submit">Add Patient</button> -->
			

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

<?php

if(isset($_POST["submit"])){

    mysqli_query($conn, "insert into add_patient values(NULL, '$_POST[fname]', '$_POST[lname]', '$_POST[diagnosis]', '$_POST[pres]' , '$_POST[address]', '$_POST[phone]' '$_POST[email]', '$_POST[pwd]'");

}





?>

</html>