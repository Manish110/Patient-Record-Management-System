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
                <h2><span class="las la-h-square"></span> <span>Patient Record</span></h2>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="" class="active"><span class="las la-igloo"></span><span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="addpatient.php"><span class="las la-users"></span><span>Add Patients</span></a>
                    </li>
                    <!-- <li>
                        <a href=""><span class="las la-clipboard-list"></span><span>Projects</span></a>
                    </li> -->
                    <!-- <li>
                        <a href=""><span class="las la-shopping-bag"></span><span>Orders</span></a>
                    </li> -->
                    <!-- <li>
                        <a href=""><span class="las la-receipt"></span><span>Inventory</span></a>
                    </li> -->
                    <li>
                        <a href="adminprofile.php"><span class="las la-user-circle"></span><span>Admin Profile</span></a>
                    </li>
                    <li>
                        <a href="login.php"><span class="las la-sign-out-alt"></span><span>Logout</span></a>
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

                <!-- <div class="search-wrapper">
                    <span class="las la-search"></span>
                    <input type="search" placeholder="Search Here">
                </div> -->


                <div class="user-wrapper">
                    <img src="user.jpg" width="30px" height="30ox" alt="">
                    <div>
                        <h4>Jane Doe</h4>
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

                    <!-- <div class="card-single">
                        <div>
                            <h1>79</h1>
                            <span>Projects</span>
                        </div>
                        <div>
                           <span class="las la-clipboard-list"></span>
                        </div>
                    </div> -->

                    <!-- <div class="card-single">
                        <div>
                            <h1>124</h1>
                            <span>Orders</span>
                        </div>
                        <div>
                           <span class="las la-shopping-bag"></span>
                        </div>
                    </div> -->

                    <!-- <div class="card-single">
                        <div>
                            <h1>$6k</h1>
                            <span>Income</span>
                        </div>
                        <div>
                           <span class="las la-wallet"></span>
                        </div>
                    </div> -->

                </div>

                <div class="recent-grid">
                    <div class="projects">
                        <div class="card">
                            <div class="card-header">
                                <h3>Patients</h3>
                                <button> <a href=""> See all </a> <span class="las la-arrow-right"></span></button>
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
                                    <tbody>
                                        <tr>
                                            <td>Jane Watson</td>
                                            <td>COVID-19</td>
                                            <td>
                                                <span class="status"></span>
                                                Checked
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Peter Parker</td>
                                            <td>Not Checked</td>
                                            <td>
                                                <span class="status"></span>
                                               Not Checked
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sherlock Holmes</td>
                                            <td>Diabetes</td>
                                            <td>
                                                <span class="status"></span>
                                                Checked
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <td></td>
                                            <td>UI Team</td>
                                            <td>
                                                <span class="status"></span>
                                                Review
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Web Development</td>
                                            <td>Frontend</td>
                                            <td>
                                                <span class="status"></span>
                                               In Progress
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ushop app</td>
                                            <td>Mobile Team</td>
                                            <td>
                                                <span class="status"></span>
                                                Pending
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="customers">
                        <div class="card">
                            <div class="card-header">
                                <h3>New Patients</h3>
                                <button> <a href=""> See all </a> <span class="las la-arrow-right"></span></button>
                            </div>
                            <div class="card-body">
                                <div class="customer">
                                    <div class="info">
                                    <img src="user.jpg" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Luis Kerwin</h4>
                                        <small>Patient</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>

                            <div class="customer">
                                <div class="info">
                                <img src="user.jpg" width="40px" height="40px" alt="">
                                <div>
                                    <h4>James Bond</h4>
                                    <small>Patient</small>
                                </div>
                            </div>
                            <div class="contact">
                                <span class="las la-user-circle"></span>
                                <span class="las la-comment"></span>
                                <span class="las la-phone"></span>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>

            </main>

        </div>

    </body>
</html>