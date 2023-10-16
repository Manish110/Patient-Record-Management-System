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
        <title>Add Patient</title>
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel= "stylesheet" href="dash.css">
    <style type="text/css">
        .pro{
            position: relative;
				left: 300px;
				top: -27px;
        }
        .but{
            position: relative;
				left: -60px;
				top: 1px;
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
                        <a href="addpat.php" class="active"><span class="las la-users" ></span><span>Add Patients</span></a>
                    </li>
                   
                    <li>
                        <a href="adminprofile.php" ><span class="las la-user-circle"></span><span>Admin Profile</span></a>
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
    <body>
        <main>

<h1>To Add Patient</h1>
<button name="submit" type="submit" class="pro"> <a href="addpatient.php"><span class="las la-plus"></span><span>Add Patient</span></a></button>
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
                                <td>Prescription</td>
                                <td>Address</td>
                                <td>Phone Number</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                $res=mysqli_query($conn,"select * from add_patient");
                                while($row=mysqli_fetch_array($res)){
                                    echo "<tr>";

                                    echo "<td>"; echo $row["id"]; echo"</td>";
                                    echo "<td>"; echo $row["fname"]; echo"</td>";
                                    echo "<td>"; echo $row["lname"]; echo"</td>";
                                    echo "<td>"; echo $row["diagnosis"]; echo"</td>";
                                    echo "<td>"; echo $row["pres"]; echo"</td>";
                                    echo "<td>"; echo $row["address"]; echo"</td>";
                                    echo "<td>"; echo $row["phone"]; echo"</td>";
                                    echo "<td>"; ?><a href="edit.php?id=<?php  echo $row["id"]; ?>"><button type="button" class=""><span class="las la-edit"></span><span>Edit</span></button></a> <?php echo"</td>";
                                    echo "<td>"; ?><a href="delete.php?id=<?php  echo $row["id"]; ?>"> <button type="button" class=""><span class="las la-trash-alt"></span><span>Delete</span></button></a> <?php echo"</td>";
                                    echo "</tr>"; 


                                }

                            ?>
                    </tbody>

                </div>
                </div>
        </main>
    </body>

    <?php

if(isset($_POST["submit"])){

    mysqli_query($conn, "insert into add_patient values(NULL, '$_POST[fname]', '$_POST[lname]', '$_POST[diagnosis]', '$_POST[pres]', '$_POST[address]', '$_POST[phone]', ");

}





?>

</html>