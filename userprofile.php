<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1"> 
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel= "stylesheet" href="dash.css">
        
    <body>
        <input type="checkbox" id="nav-toggle">
        <div class="sidebar">
            <div class="sidebar-brand">
                <h1><span class="las la-h-square"></span> <span>Patient Record</span></h1>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="userdash.php" ><span class="las la-igloo"></span><span>Dashboard</span></a>
                    </li>
                   
                    <li>
                        <a href="userprofile.php" class="active"><span class="las la-user-circle"></span><span>User Profile</span></a>
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

                    Dashboard
                </h2>

               


                <div class="user-wrapper">
                <a href="userprofile.php"><img src="user.jpg" width="30px" height="30px" alt=""></a>

                    <div>
                    <?php
                        $email=$_SESSION['user_name'];
                        $res=mysqli_query($conn,"select * from add_patient where id= $email");
                        while($row=mysqli_fetch_array($res)){
                        
                        echo $row["fname"];  
                        }
                        ?><br>
                        <small>User</small>
                    </div>
                </div>
            </header>

            <main>
               
                
                
                <?php
                                $email=$_SESSION['user_name'];
                                $res=mysqli_query($conn,"select * from add_patient where id= $email");
                                while($row=mysqli_fetch_array($res)){
                                    
                                    echo"<table>";

                                    echo"<tr>";
                                    echo "<td>"; echo "<b>First Name</b>"; echo"</td>"; 
                                    echo "<td>"; echo $row["fname"]; echo"</td>" ;
                                    echo"</tr>"; 

                                    echo"<tr>";
                                    echo "<td>"; echo "<b>Last Name</b>"; echo"</td>"; 
                                    echo "<td>"; echo $row["lname"]; echo"</td>"; 
                                    echo"</tr>";

                                    echo"<tr>";
                                    echo "<td>"; echo "<b>Email</b>"; echo"</td>"; 
                                    echo "<td>"; echo $row["email"]; echo"</td>"; 
                                    echo"</tr>";

                                    echo"<tr>";
                                    echo "<td>"; echo "<b>Address</b>"; echo"</td>"; 
                                    echo "<td>"; echo $row["address"]; echo"</td>"; 
                                    echo"</tr>";

                                    echo"<tr>";
                                    echo "<td>"; echo "<b>Date of Birth</b>"; echo"</td>"; 
                                    echo "<td>"; echo $row["dob"]; echo"</td>"; 
                                    echo"</tr>";

                                    echo"<tr>";
                                    echo "<td>"; echo "<b>Phone Nmuber</b>"; echo"</td>"; 
                                    echo "<td>"; echo $row["phone"]; echo"</td>"; 
                                    echo"</tr>";

                                    echo"<tr>";
                                    echo "<td>"; echo "<b>Gender</b>"; echo"</td>"; 
                                    echo "<td>"; echo $row["gender"]; echo"</td>"; 
                                    echo"</tr>";
                                    
                                    echo"</table>";


                                }

                            ?>
                           
            </main>

        </div>

    </body>
</html>