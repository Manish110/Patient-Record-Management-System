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
                        <a href="userdash.php" class="active"><span class="las la-igloo"></span><span>Dashboard</span></a>
                    </li>
                   
                    <li>
                        <a href="userprofile.php"><span class="las la-user-circle"></span><span>User Profile</span></a>
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
                <a href="userprofile.php"><img src="user.jpg" width="30px" height="30ox" alt=""></a>
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

            <h1>Information</h1>
            <hr>
            <div class="card-body">
                 <div class="table-responsive">
                    <table width="100%">
                         <thead>
                             <tr>
                                <td>ID</td>
                                <td>First Name</td>
                                <td>Last Name</td>
                                <td>Diagnosis</td>
                                <td>Address</td>
                                <td>Phone Number</td>
                                <td>Prescription</td>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                                $email=$_SESSION['user_name'];
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

            </main>

        </div>

    </body>
</html>