<?php

include "../../configuration/config.php";
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


//  Feed Related Area

$ip = $_SERVER['REMOTE_ADDR'];
$ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
$ipInfo = json_decode($ipInfo);
$timezone = $ipInfo->timezone;
date_default_timezone_set($timezone);

$curr_date = date("d-m-Y");
$curr_time = date("h:ia");

$postername = $instit_fetched_array['schoolname'];
$_SESSION['schoolusername'] = $instit_fetched_array['schoolusername'];

if (isset($_POST['postsub']) && isset($_POST['postinpdata'])) {
    $post_inp_data = $_POST['postinpdata'];
    $postsub = $_POST['postsub'];
    $post_add_to_db_sql = "INSERT INTO $instit" . "_feeder ( `postby`, `posttime`, `postdate`, `postcontent`, `postername` ) VALUES (\"$instit\",\"$curr_time\",\"$curr_date\",\"$post_inp_data\", \"$postername\")";
    $post_request_init = mysqli_query($conn, $post_add_to_db_sql);
}

if (isset($_POST['deletebtn'])) {
    $value_delete = $_POST['deletebtn'];
    echo "<script>console.log('$value_delete')</script>";
    $post_del_sql = "DELETE FROM `sampleschooltpr_feeder` WHERE `id`='$value_delete'";
    $post_del_req = mysqli_query($conn, $post_del_sql);
}

if (isset($_POST['editbtn'])) {
    $_SESSION['editid'] = $_POST['editbtn'];
    echo '<script>window.location.replace("./editpost/editpost.php");</script>';
}

$GLOBALS['feed_start'] = 1;
$fetch_start = $GLOBALS['feed_start'];
$GLOBALS['feed_fetch_limit'] = 50;
$fetch_end = $GLOBALS['feed_fetch_limit'];
if ($fetch_start == 1) {
    $instit_feed_fetch_sql = "SELECT * FROM $instit" . "_feeder ORDER BY `id` DESC LIMIT $fetch_end;";
}

$instit_feed_result = mysqli_query($conn, $instit_feed_fetch_sql);
$instit_fetched_feed_array = mysqli_fetch_all($instit_feed_result, $mode = MYSQLI_ASSOC);
$encoded_feed_array = json_encode($instit_fetched_feed_array);



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instit-Dev Page</title>
    <link rel="stylesheet" href="../../styles/bootstrap/dist/css/bootstrap.css">
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
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0 w-75 " href="./instit_profile/index.php" target="_blank">
                <img src="../../photostore/institution-profiles/<?php echo $instit_fetched_array['schoolusername']; ?>/<?php echo $instit_fetched_array['schoolprofile'] ?>" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold fs-6 text-dark text-break"><?php echo $instit_fetched_array['schoolusername'] ?></span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-secondary" href="./index.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
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
                    <a class="nav-link text-dark " href="./students/index.php">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
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
                <div><?php echo $instit_fetched_array['schoolname'] ?></div>
            </div>
        </div>
        <div class="row mb-4 mx-auto my-3">
            <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>School Feed</h6>
                                <p class="text-sm mb-0">
                                    <span class="font-weight-bold ">Last 20 Posts will be displayed here.</span>
                                </p>
                            </div>
                            <div class="col-lg-6 col-5 my-auto text-end">
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="responsiveron">
                            <div id="feedspot">
                            </div>
                        </div>
                        <div class=" mx-2 my-2 fs-5" style="font-weight: 500;">
                            <form id="post-form" class="form-inline d-flex " method="POST">
                                <div class="form-group mx-sm-3 mb-2 w-75">
                                    <input type="text" placeholder="Type Something" name="postinpdata" value="" onchange="postchange()" onkeydown="postchange()" onkeypress="postchange()" onkeyup="postchange()" class="form-control w-100 postman-inp bg-gray-200 p-2" id="post-data-input" />
                                </div>
                                <button id='post-btn' class="btn btn-secondary mb-2" type="submit" name="postsub" value="submit">POST</button>
                                <script>
                                    document.getElementById('post-btn').setAttribute('disabled', 'true');

                                    function postchange() {
                                        if (document.getElementById('post-data-input').value !== "") {
                                            document.getElementById('post-btn').removeAttribute('disabled');
                                        } else {
                                            document.getElementById('post-btn').setAttribute('disabled', 'true');
                                        }
                                    }
                                </script>
                                <script>
                                    if (window.history.replaceState) {
                                        window.history.replaceState(null, null, window.location.href);
                                    }
                                </script>
                                <script>
                                    let delbtn = document.getElementById('del-btn-config');
                                    let editbtn = document.getElementById('edit-btn-config');

                                    <?php
                                    if ($_SESSION['instit'] !== $instit_fetched_feed_array[0]['postby']) {
                                        echo "delbtn.setAttribute('disabled', 'true');";
                                        echo "editbtn.setAttribute('disabled', 'true');";
                                    }
                                    ?>
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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
                                <img src="../../photostore/institution-profiles/<?php echo $instit_fetched_array['schoolusername']; ?>/<?php echo $instit_fetched_array['schoolprofile'] ?>" class="navbar-brand-img h-100" alt="main_logo">
                                <span class="ms-1 font-weight-bold fs-6 text-dark text-break"><?php echo $instit_fetched_array['schoolusername'] ?></span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body pb-0 pt-2">

                        <hr class="horizontal light mt-0 mb-2">
                        <div class=" w-auto  max-height-vh-100" id="sidenav-collapse-main">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link text-white active bg-gradient-secondary d-flex rounded-3" href="./students/index.php">
                                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
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
                                    <a class="nav-link text-dark d-flex rounded-3 " href="./students/index.php">
                                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
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
            <!-- Right side area  -->
            <div class="col-lg-4 col-md-6 mb-md-0 mb-4 ">
                <div class="bg-primary data-div-top mx-auto mb-3 m-3 mt-3 d-flex justify-content-center align-items-center">
                    <div class="data-sub-div bg-white d-flex justify-content-center align-items-center">
                        <div class="d-block text-center">
                            <div class="used-accs">
                                <?php echo $instit_meta_info_array['used_stu_count'] ?>
                            </div>
                            <div>
                                of <?php echo $instit_meta_info_array['total_stu_count'] ?>
                            </div>
                            <div class="fs-4 text-dark">Students</div>
                        </div>
                    </div>
                </div>
                <div class="bg-info data-div mx-auto d-flex justify-content-center align-items-center">
                    <div class="data-sub-div bg-white d-flex justify-content-center align-items-center">
                        <div class="d-block text-center">
                            <div class="used-accs">
                                <?php echo $instit_meta_info_array['used_staff_count'] ?>
                            </div>
                            <div>
                                of <?php echo $instit_meta_info_array['total_staff_count'] ?>
                            </div>
                            <div class="fs-4 text-dark">Staffs</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php include "./main-naver.php" ?>

        <script>
            if (screen.width >= 1200) {
                document.getElementById('sidebar-toggler').style.display = "none";
            }
        </script>

    </main>

    <script>
        let feed_array = [...<?php echo $encoded_feed_array ?>];
        let instit = "<?php echo $instit ?>";
        let instit_pic = "<?php echo $instit_fetched_array['schoolprofile'] ?>";
    </script>

    <script src="./post-mapper.js"></script>




    <script src="../../styles/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>

</body>

</html>