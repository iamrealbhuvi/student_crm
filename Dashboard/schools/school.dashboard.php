<?php

include "../../configuration/config.php";
session_start();
error_reporting(0);

$instit = $_SESSION['instit'];

// Fetch institute Data
$instit_fetch_sql = "SELECT * FROM `schools_list` WHERE `schoolusername` = '$instit'";
$instit_result = mysqli_query($conn, $instit_fetch_sql);
$instit_fetched_array = mysqli_fetch_assoc($instit_result);



?>


<html>

<head>
    <title><?php echo $instit; ?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="og-title" content="<?php echo $instit; ?> Management">
    <link rel="stylesheet" href="../../styles/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./school.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<body class="d-flex ">
    <!-- This one is for main side bar -->
    <div class="side-bar d-flex justify-content-center  bg-dark">
        <div class="w-100 barlit">
            <!-- profile photo column -->
            <div class="profiler-tab d-flex justify-content-center align-items-center w-75 mx-auto">
                <img class="profile-photo mx-3" src="../../photostore/institution-profiles/<?php echo $instit_fetched_array['schoolusername']; ?>/<?php echo $instit_fetched_array['schoolprofile'] ?>" />
                <div class="p-2 text-align-left w-auto">
                    <p class="school-name my-auto text-light mx-2"><?php echo $instit_fetched_array['schoolname'] ?></p>
                </div>
            </div>

            <hr width="85%" class="mx-auto  " style="height: 3px;background-color: rgba(83, 83, 83, 0.6); margin-top: 25px; margin-bottom: 25px;">

            <!-- Navigator tab -->
            <div class=" w-75 mx-auto martop nav-fonter">
                <!-- Home -->
                <a href="/Dashboard/schools/school.dashboard.php" class="text-decoration-none text-light">
                    <div class="profiler-tab nav-tab d-flex align-items-center px-3 my-3 w-100">
                        <div class="iconer mx-1 homer" id="homer"></div>
                        <div class="p-2" style="text-align: left;">
                            <p class="school-name my-auto mx-2">Home</p>
                        </div>

                    </div>
                </a>

                <!-- Classrooms -->
                <a href="#" class="text-decoration-none text-secondary">
                    <div class="profiler-tab nav-tab d-flex align-items-center px-3 my-3">
                        <div class="iconer mx-1 classroomer"></div>
                        <div class="p-2 " style="text-align: left;">
                            <p class="school-name my-auto mx-2">Classrooms</p>
                        </div>
                    </div>
                </a>
                <!-- Exams -->
                <a href="#" class="text-decoration-none text-secondary ">
                    <div class="profiler-tab nav-tab d-flex align-items-center px-3 my-3">
                        <div class="iconer mx-1 examer"></div>
                        <div class="p-2 " style="text-align: left;">
                            <p class="school-name my-auto mx-2">Exams</p>
                        </div>
                    </div>
                </a>
                <!-- Events -->
                <a href="#" class="text-decoration-none text-secondary">
                    <div class="profiler-tab nav-tab d-flex align-items-center px-3 my-3">
                        <div class="iconer mx-1 eventer"></div>
                        <div class="p-2 " style="text-align: left;">
                            <p class="school-name my-auto mx-2">Events</p>
                        </div>
                    </div>
                </a>
                <!-- Financial -->
                <a href="#" class="text-decoration-none text-secondary">
                    <div class="profiler-tab nav-tab d-flex align-items-center px-3 my-3">
                        <div class="iconer mx-1 financialer"> </div>
                        <div class="p-2 " style="text-align: left;">
                            <p class="school-name my-auto mx-2">Financial</p>
                        </div>
                    </div>
                </a>
            </div>
            <hr width="85%" class="mx-auto " style="height: 3px;background-color: rgba(83, 83, 83, 0.6); margin-top: 25px; margin-bottom: 25px;">
            <div class=" width-90 mx-auto martop">
                <!-- Sign-out -->
                <a href="#" class="text-decoration-none text-dark">
                    <div class="profiler-tab nav-tab d-flex align-items-center px-3  w-50 mx-auto">

                        <div class="p-2 w-100" style="text-align: center; font-size: 0.7rem;">
                            <p class="school-name my-auto mx-auto text-light">Sign-Out</p>
                        </div>

                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- This is for main control area -->
    <div class="main-bar d-flex justify-content-evenly align-items-center">
        <?php include "./feeder.php" ?>


        <!-- Right Bar -->
        <div class="mx-3 bg-warning w-25 sider">

            <div class=""></div>

        </div>
    </div>



    <script src="../../styles/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>