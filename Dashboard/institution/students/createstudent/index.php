<?php

include "../../../../configuration/config.php";
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
    <link rel="stylesheet" href="../../../../styles/bootstrap/dist/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">

    <!--  Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />

</head>

<body class="bg-gray-200">

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="row mb-4 mt-4 mx-auto my-3 ">
            <div class="col-lg-11 col-md-11 mb-md-0 mb-4 text-center fs-3 text-dark mx-auto">
                <div><?php echo $instit_fetched_array['schoolname'] ?> - Create Students</div>
            </div>
        </div>
        <div class="mb-3">
            <form action="" method="POST">
                <div class="row mb-4 mt-4 mx-auto my-3 ">
                    <div class="col-lg-11 col-md-11 mb-md-0 mb-4 text-left fs-5 font-weight-bolder text-dark mx-auto">
                        <div>Student Main Inforamtion</div>
                    </div>
                </div>
                <div class="header-body">
                    <div class="row container mx-auto">
                        <div class="col-xl-5 col-lg-6 col-sm-12 row">
                            <div class="card card-stats mb-4 mb-xl-0 col-12">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student Roll Number</h5>

                                        </div>
                                        <div class="col-12">
                                            <div class="upload-btn-wrapper">
                                                <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-roll" placeholder="<?php echo $instit_fetched_array['schoolidcode'] ?>012001" name="sturoll" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-stats mb-4 mt-4 mb-xl-0 col-12">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student Photo</h5>
                                        </div>
                                        <div class="col-12">
                                            <div class="upload-btn-wrapper">
                                                <button class="btn-up">Upload a file</button>
                                                <input type="file" name="myprofile" id="profile-pic" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-2 col-lg-0 d-lg-none d-xl-block row">
                        </div>
                        <div class="mx-lg-auto  col-xl-5 col-lg-6 col-sm-12 row">
                            <div class="card card-stats mb-4 mb-xl-0 col-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <img width="100%" id="preview-pic" style="object-fit: contain;" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="profile picture" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                let img = document.getElementById('preview-pic');
                                let imgup = document.getElementById('profile-pic');

                                if (imgup) {
                                    imgup.onchange = evt => {
                                        const [file] = imgup.files
                                        if (file) {
                                            img.src = URL.createObjectURL(file)
                                        }
                                    }
                                }
                            </script>
                        </div>
                    </div>

                    <!-- Replica Start -->

                    <div class="row container mx-auto mt-4">
                        <div class="card card-stats mb-4 mb-xl-0 col-xl-5 col-lg-6 col-sm-12">
                            <div class="card-body d-flex align-items-center">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="card-title font-weight-bold  mb-0">Student Name</h5>
                                    </div>
                                    <div class="col-12">
                                        <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-roll" placeholder="Ashwin Ravi S" name="stuname" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-2 col-lg-0 d-lg-none d-xl-block row">
                        </div>
                        <div class="card card-stats mb-4 mb-xl-0 col-xl-5 col-lg-6 col-sm-12">
                            <div class="card-body d-flex align-items-center">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="card-title font-weight-bold  mb-0">Student Father Name</h5>
                                    </div>
                                    <div class="col-12">
                                        <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-roll" placeholder="Sampath Kumar" name="stufathername" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Replica end -->

                </div>
            </form>
        </div>
    </main>


    <script src="../../../../styles/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
</body>

</html>