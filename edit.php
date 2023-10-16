<?php
@include 'config.php';
$id=$_GET["id"];

$fname="";
$lname="";
$diagnosis="";
$pres="";
$address="";
$phone="";
// $birthday="";

$res=mysqli_query($conn,"select * from add_patient where id=$id");
while($row=mysqli_fetch_array($res)){

    $fname=$row["fname"];
    $lname=$row["lname"];
    $diagnosis=$row["diagnosis"];
	$pres=$row["pres"];
    $address=$row["address"];
    $phone=$row["phone"];
    // $birthday=$row["birthday"];
}









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
	

	$select="SELECT * FROM user_form WHERE email='$email' && password='$pass'";

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
		   $insert = "INSERT INTO add_patient(fname, lname, diagnosis, pres, address, birthday, phone ) VALUES('$fname', '$lname', '$diagnosis', '$pres', '$address', '$birthday','$phone' )";
		   mysqli_query($conn, $insert);
		   header('location:addpat.php');
		}
	 
  
  };

?>







<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1"> 
		<title>	Edit Patient</title>
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
                <h2><span class="las la-h-square"></span> <span>Patient Record</span></h2>
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

                    Edit Patient
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
			<div id="name">
				<h2 class="name">Name</h2>
				<input class="firstname" type="text" required="required" name="fname" value="<?php  echo $fname; ?>"   >
				<label class="firstlabel">first name</label>
				<input class="lastname" type="text" required="required" name="lname" value="<?php  echo $lname; ?>">
				<label class="lastlabel">last name</label>
			</div>
		
			<h2 class="name">Diagnosis</h2>
			<input class="email" type="text" name="diagnosis" value="<?php  echo $diagnosis; ?>">

			<h2 class="name">Prescription</h2>
			<input class="email" type="text" name="pres" value="<?php  echo $pres; ?>">

			<h2 class="name">Phone</h2>
			<input class="code" type="text"  name="phone"  pattern="[1-9]{1}[0-9]{9}"  value="<?php  echo $phone; ?>">
		
			

			<h2 class="name">Address</h2>
			<input class="company" type="text" required="required" name="address" value="<?php  echo $address; ?>">

			<h2 class="name">Date of Birth</h2>
			<input class="option" type="date" required="required" id="birthday" name="birthday" value="<?php  echo $birthday; ?>">

			

			
			<br>
			<input type="submit" name="update" value="Update" class="button">
			<!-- <button class="log" name="submit" type="submit">Add Patient</button> -->
			

		</form>
	</div>
</body>

<?php

if(isset($_POST["submit"])){

    mysqli_query($conn, "insert into add_patient values(NULL, '$_POST[fname]', '$_POST[lname]', '$_POST[diagnosis]', '$_POST[pres]', '$_POST[address]', '$_POST[phone]', ");

}


if(isset($_POST["update"])){
	mysqli_query($conn,"update add_patient set fname='$_POST[fname]', lname='$_POST[lname]', diagnosis='$_POST[diagnosis]', pres='$_POST[pres]', address='$_POST[address]' where id=$id");

?>
<script type=text/javascript>

window.location="addpat.php"; 

</script>
<?php

}


?>



</html>