<?php

include "../../../configuration/config.php";
session_start();
error_reporting(0);

$instit = $_SESSION['instit'];

// Fetch institute Data
$instit_fetch_sql = "SELECT * FROM `schools_list` WHERE `schoolusername` = '$instit'";
$instit_result = mysqli_query($conn, $instit_fetch_sql);
$instit_fetched_array = mysqli_fetch_assoc($instit_result);


// Fetch meta info of institute
$instit_meta_info_sql = "SELECT * FROM `school_account_info` WHERE `schoolusername` = '$instit'";
$instit_meta_info_result = mysqli_query($conn, $instit_meta_info_sql);
$instit_meta_info_array = mysqli_fetch_assoc($instit_meta_info_result);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instit-Dev Page</title>
    <link rel="stylesheet" href="../../../styles/bootstrap/dist/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles.css">

    <!--  Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />

</head>

<body class="g-sidenav-show bg-gray-200">

    <!-- Side Bar - Left  -->

    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0 w-75 " href="./instit_profile/index.php" target="_blank">
                <img src="../../../photostore/institution-profiles/<?php echo $instit_fetched_array['schoolusername']; ?>/<?php echo $instit_fetched_array['schoolprofile'] ?>" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold fs-6 text-dark text-break"><?php echo $instit_fetched_array['schoolusername'] ?></span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-dark " href="../index.php">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark " href="../pages/tables.html">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Exams</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark " href="../pages/billing.html">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">calendar_today</i>
                        </div>
                        <span class="nav-link-text ms-1">Schedule</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark " href="../pages/virtual-reality.html">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">class</i>
                        </div>
                        <span class="nav-link-text ms-1">Classrooms</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-secondary" href="./index.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">people</i>
                        </div>
                        <span class="nav-link-text ms-1">Students</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark " href="../pages/rtl.html">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">emoji_events</i>
                        </div>
                        <span class="nav-link-text ms-1">Events</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark " href="../pages/notifications.html">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">currency_rupee</i>
                        </div>
                        <span class="nav-link-text ms-1">Fee Center</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <a class="btn bg-gradient-secondary mt-4 w-100" href="#to_profile" type="button">Profile</a>
            </div>
            <div class="mx-3">
                <a class="btn bg-gradient-secondary mt-2 w-100" href="to Signout" type="button">Sign Out</a>
            </div>
        </div>
    </aside>




    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="row mb-4 mt-4 mx-auto my-3 ">
            <div class="col-lg-11 col-md-11 mb-md-0 mb-4 text-center fs-3 text-dark">
                <div><?php echo $instit_fetched_array['schoolname'] ?> - Students</div>
            </div>
        </div>

        <div class="container-fluid mb-3">
            <div class="header-body">
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <a class="text-decoration-none" href="./createstudent/">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title font-weight-bold  mb-0">Create</h5>
                                            <span class="h5 font-weight-bold mb-0">Student</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow text-center">
                                                <i class="fas fa-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <a class="text-decoration-none" href="./edit_intermediate.php">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title font-weight-bold  mb-0">Edit</h5>
                                            <span class="h5 font-weight-bold mb-0">Student</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-primary text-white rounded-circle shadow text-center">
                                                <i class="fas fa-edit"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>






        <!-- Toggle Menu for smaller Devices -->

        <div class="fixed-plugin " id="sidebar-toggler">
            <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" onclick="document.getElementById('sidebar-toggler').classList.add('show');">
                <i class="material-icons py-2">widgets</i>
            </a>
            <div class="card shadow-lg">
                <div class="card-header pb-0 pt-3">
                    <div class="float-start">
                        <h5 class="mt-3 mb-0"><?php echo $instit_fetched_array['schoolname'] ?></h5>
                        <p></p>
                    </div>
                    <div class="float-end mt-4">
                        <button class="btn btn-link text-dark p-0 fixed-plugin-close-button" onclick="document.getElementById('sidebar-toggler').classList.remove('show');">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>
                    <!-- End Toggle Button -->
                    <div class="sidenav-header">
                        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                        <a class="navbar-brand m-0 w-75 " href="./instit_profile/index.php" target="_blank">
                            <img src="../../../photostore/institution-profiles/<?php echo $instit_fetched_array['schoolusername']; ?>/<?php echo $instit_fetched_array['schoolprofile'] ?>" class="navbar-brand-img h-100" alt="main_logo">
                            <span class="ms-1 font-weight-bold fs-6 text-dark text-break"><?php echo $instit_fetched_array['schoolusername'] ?></span>
                        </a>
                    </div>
                </div>
                <div class="card-body pb-0 pt-2">

                    <hr class="horizontal light mt-0 mb-2">
                    <div class=" w-auto  max-height-vh-100" id="sidenav-collapse-main">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-dark d-flex rounded-3 " href="../index.php">
                                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10 ms-3">dashboard</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Dashboard</span>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link text-dark d-flex rounded-3" href="../pages/tables.html">
                                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10 ms-3">table_view</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Exams</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark d-flex rounded-3" href="../pages/billing.html">
                                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10 ms-3">calendar_today</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Schedule</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark d-flex rounded-3 " href="../pages/virtual-reality.html">
                                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10 ms-3">class</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Classrooms</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white active bg-gradient-secondary d-flex rounded-3" href="../students/index.php">
                                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10 ms-3">people</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Students</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark d-flex rounded-3" href="../pages/rtl.html">
                                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10 ms-3">emoji_events</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Events</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark d-flex rounded-3" href="../pages/notifications.html">
                                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10 ms-3">currency_rupee</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Fee Center</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
                        <div class="mx-auto">
                            <a class="btn bg-gradient-secondary mt-4 w-75" href="#to_profile" type="button">Profile</a>
                        </div>
                        <div class="mx-auto">
                            <a class="btn bg-gradient-secondary mt-2 w-75" href="to Signout" type="button">Sign Out</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </main>




    <!-- Scripts Area -->
    <script>
        if (screen.width >= 1200) {
            document.getElementById('sidebar-toggler').style.display = "none";
        }
    </script>
    <script src="../../../styles/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>
</body>

</html>