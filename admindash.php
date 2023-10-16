<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
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
    </head>
    <body>
        <input type="checkbox" id="nav-toggle">
        <div class="sidebar">
            <div class="sidebar-brand">
                <h1><span class="las la-h-square"></span> <span>Patient Record</span></h1>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="admindash.php" class="active"><span class="las la-igloo"></span><span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="addpat.php"><span class="las la-users"></span><span>Add Patients</span></a>
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

                    Dashboard
                </h2>

               


                <div class="user-wrapper">
                   <a href="adminprofile.php"><img src="user.jpg" width="30px" height="30px" alt=""></a> 
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

            <main>

                <div class="cards">
                    <div class="card-single">
                        <div>
                            <h1>54</h1>
                            <span>Patients</span>
                        </div>
                        <div>
                           <span class="las la-users"></span>
                        </div>
                    </div>

                   

                </div>

                <div class="recent-grid">
                    <div class="projects">
                        <div class="card">
                            <div class="card-header">
                                <h3>Patients</h3>
                                <button> <a href="addpat.php"> See all </a> <span class="las la-arrow-right"></span></button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Patient Name</td>
                                            <td>Diagnosis</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <?php
                                $email=$_SESSION['admin_name'];
                                $res=mysqli_query($conn,"select * from add_patient where id= $email");
                                while($row=mysqli_fetch_array($res)){
                                    echo "<tr>";

                                    echo "<td>"; echo $row["id"]; echo"</td>";
                                    echo "<td>"; echo $row["fname"]; echo"</td>";
                                    echo "<td>"; echo $row["lname"]; echo"</td>";
                                    echo "<td>"; echo $row["diagnosis"]; echo"</td>";
                                    echo "<td>"; echo $row["address"]; echo"</td>";
                                    echo "<td>"; echo $row["phone"]; echo"</td>";
                                    echo "<td>"; echo $row["pres"]; echo"</td>";
                                    echo "</tr>"; 


                                }

                            ?>
                            
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="customers">
                        <div class="card">
                            <div class="card-header">
                                <h3>New Patients</h3>
                                <button> <a href="addpat.php"> See all </a> <span class="las la-arrow-right"></span></button>
                            </div>
                            <!-- <div class="card-body">
                                <div class="customer">
                                    <div class="info">
                                    <img src="user.jpg" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Ashim Mainali</h4>
                                        <small>Patient</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div> -->
                            <!-- </div> -->

                            <!-- <div class="customer">
                                <div class="info">
                                <img src="user.jpg" width="40px" height="40px" alt="">
                                <div>
                                    <h4>Samip Khanal</h4>
                                    <small>Patient</small>
                                </div>
                            </div> -->
                            <!-- <div class="contact">
                                <span class="las la-user-circle"></span>
                                <span class="las la-comment"></span>
                                <span class="las la-phone"></span>
                            </div> -->
                        </div>

                        </div> 
                    </div>
                </div>

            </main>

        </div>

    </body>
</html>