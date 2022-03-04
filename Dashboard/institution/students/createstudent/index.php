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


//Receiving data
if (isset($_FILES['myprofile']) && isset($_POST['submission_data']) && isset($_POST['submit'])) {


    $data_recv = $_POST['submission_data'];
    $newdata = json_decode($data_recv, true, 1024);
    $roller = $newdata['roll'];

    // School Students table connection establishment and checks for a student is there or not
    $school_students_sql = "SELECT * FROM $instit" . "_students WHERE `rollnumber` = \" $roller \" ;";
    $students_fetch_result = mysqli_query($conn, $school_students_sql);
    $students_fetch = mysqli_num_rows($students_fetch_result);

    if ($students_fetch > 0) {
        echo "<script>alert('Student Already Exists')</script>";
    } else {
        // Registration Backend Starts Here

        //Creating a directory  that particular student's data
        mkdir("/var/www/student_crm/data/students/$instit/$roller", 0777, TRUE);

        $path_to = "/var/www/student_crm/data/students/$instit/$roller/";

        include "./scripts/picture_up.php";

        $picname = $roller . $curr_date . $curr_time . '.' . $imageFileType;
        
        include "./scripts/uploader.php";



        echo "<script>console.log('success point')</script>";
        echo "<script>console.log('sucess point... 2')</script>";

        











        echo "<script>console.log('End point of Top Script')</script>";
    }
}


//To create a table student[roll]_examinfo with [ examname, subject, score ]
//To create a table student[roll]_class_performance [ present, present_date, absence, absence_date, class_status ]
//To create a table student[roll]_report_card [ examname, report_card_url ]
//To create a table student[roll]_extras [ heading, content ]



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
            <form action="" method="POST" style="padding-bottom: 3em;" oninput="jsonupdater()" onload="jsonupdater()" enctype="multipart/form-data">
                <div class="row mb-4 mt-4 mx-auto my-3 ">
                    <div class="col-xl-9 col-lg-11 col-md-11 mb-md-0 mb-4 text-left fs-5 font-weight-bolder text-dark mx-auto">
                        <div>Student Main Inforamtion</div>
                    </div>
                </div>
                <div class="header-body">
                    <div class="row container mx-auto">
                        <div class="col-xl-5 col-lg-6 col-sm-12 row">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student Roll Number <span style="color: red;">&ast;</span></h5>

                                        </div>
                                        <div class="col-12">
                                            <div class="upload-btn-wrapper">
                                                <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-roll" placeholder="<?php echo $instit_fetched_array['schoolidcode'] ?>012001" name="sturoll" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-stats mb-4 mt-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student Photo <span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <div class="upload-btn-wrapper">
                                                <button class="btn-up">Upload a file</button>
                                                <input type="file" name="myprofile" id="profile-pic" required />
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
                                        let [file] = imgup.files
                                        if (file) {

                                            img.src = URL.createObjectURL(file);

                                        }
                                    }
                                }
                            </script>
                        </div>
                    </div>

                    <!-- Replica Start -->

                    <!-- Layer 1 start -->
                    <div class="row container mx-auto mt-4">
                        <div class="col-xl-5 col-lg-6 col-sm-12 row">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info ">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student Name <span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-name" placeholder="Ashwin Ravi S" name="stuname" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-2 col-lg-0 d-lg-none d-xl-block">
                        </div>
                        <div class="col-xl-5 col-lg-6 col-sm-12 row ms-lg-0">
                            <div class="card card-stats mb-4 mb-xl-0  col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student Father Name <span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-fa-name" placeholder="Sampath Kumar" name="stufathername" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Layer 1 End -->

                    <!-- Replica end -->

                    <div class="row mb-4 mt-4 mx-auto my-3 ">
                        <div class="col-xl-9 col-lg-11 col-md-11 mb-md-0 mb-4 text-left fs-5  font-weight-bolder text-dark mx-auto">
                            <div>Student Biological Inforamtion</div>
                        </div>
                    </div>

                    <!-- Layer 2 start -->
                    <div class="row container mx-auto mt-4">
                        <div class="col-xl-5 col-lg-6 col-sm-12 row ">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student's Mother Name<span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-ma-name" placeholder="Preethi Ravi" name="stumomname" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-2 col-lg-0 d-lg-none d-xl-block">
                        </div>
                        <div class="col-xl-5 col-lg-6 col-sm-12 ms-lg-0 row">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student's Blood Group <span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">

                                            <select style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" class="form-control rounded-25" id="stu-bld-grp" name="stufathername" required>
                                                <option> Select Blood Group</option>
                                                <option value="O +ve">O +ve</option>
                                                <option value="O -ve">O -ve</option>
                                                <option value="A +ve">A +ve</option>
                                                <option value="A -ve">A -ve</option>
                                                <option value="B +ve">B +ve</option>
                                                <option value="B -ve">B -ve</option>
                                                <option value="AB +ve">AB +ve</option>
                                                <option value="AB -ve">AB -ve</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Layer 2 end -->

                    <!-- Layer 3 start -->
                    <div class="row container mx-auto mt-4">
                        <div class="col-xl-5 col-lg-6 col-sm-12 row ">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student Date of Birth <span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="date" value="" id="stu-dob" placeholder="01/01/2001" name="studob" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-2 col-lg-0 d-lg-none d-xl-block">
                        </div>
                        <div class="col-xl-5 col-lg-6 col-sm-12 ms-lg-0 row">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student with Disability</h5>
                                        </div>
                                        <div class="col-12 row">
                                            <div class="col-lg-1 col-sm-2 form-check my-auto" style="width: 30px;">
                                                <input class="form-check-input rounded-25" style="width: 30px; height: 30px;border: 1px solid rgba(50, 50, 50, 1);" type="checkbox" value="" id="stu-pwd" name="stu-pwd" onclick="pwdchecker()" onchange="pwdchecker()" onforminput="pwdchecker()" />
                                                <script>
                                                    pwd = document.getElementById("stu-pwd");
                                                    pwd.value = "no";
                                                    const pwdchecker = () => {
                                                        setInterval(() => {
                                                            if (pwd.checked == true) {
                                                                pwd.value = "yes"
                                                            } else {
                                                                pwd.value = "no"
                                                            }
                                                        }, 1000)
                                                    }
                                                </script>
                                            </div>
                                            <div class="col-lg-10 col-sm-10 ms-3">
                                                <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-pwd-issue" placeholder="Type Your Issue" name="stupwdissue" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Layer 3 End -->

                    <!-- Layer 4 start -->
                    <div class="row container mx-auto mt-4">
                        <div class="col-xl-5 col-lg-6 col-sm-12 row ">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student Identification Mark 1 <span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-id-mark-1" placeholder="Identification 1" name="stuidmark1" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-2 col-lg-0 d-lg-none d-xl-block">
                        </div>
                        <div class="col-xl-5 col-lg-6 col-sm-12 ms-lg-0 row">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student Identification Mark 2 <span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-id-mark-2" placeholder="Identification 2" name="stuidmark2" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Layer 4 End -->

                    <div class="row mb-4 mt-4 mx-auto my-3 ">
                        <div class="col-xl-9 col-lg-11 col-md-11 mb-md-0 mb-4 text-left fs-5 font-weight-bolder text-dark mx-auto">
                            <div>Student Educational Inforamtion</div>
                        </div>
                    </div>

                    <!-- Layer 10 start -->
                    <div class="row container mx-auto mt-4">
                        <div class="col-xl-5 col-lg-6 col-sm-12 row ">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student's Class <span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <select style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" class="form-control rounded-25" id="stu-class" name="stu-class" required>
                                                <option> Student Class</option>
                                                <option value="1">Class 1</option>
                                                <option value="2">Class 2</option>
                                                <option value="3">Class 3</option>
                                                <option value="4">Class 4</option>
                                                <option value="5">Class 5</option>
                                                <option value="6">Class 6</option>
                                                <option value="7">Class 7</option>
                                                <option value="8">Class 8</option>
                                                <option value="9">Class 9</option>
                                                <option value="10">Class 10</option>
                                                <option value="11">Class 11</option>
                                                <option value="12">Class 12</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-2 col-lg-0 d-lg-none d-xl-block">
                        </div>
                        <div class="col-xl-5 col-lg-6 col-sm-12 ms-lg-0 row">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student Educational Group<span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <select style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" class="form-control rounded-25" id="stu-edu-grp" name="stu-edu-grp" required>
                                                <option> Student Edu Group</option>
                                                <option value="primary">Primary</option>
                                                <option value="secondary">Secondary</option>
                                                <option disabled>Higher Secondary</option>
                                                <option value="103 - Phy, Che, Bio, Math">103 - Phy, Che, Bio, Math</option>
                                                <option value="208 - Phy, Che, Bot, Zoo">208 - Phy, Che, Bot, Zoo (Pure-science)</option>
                                                <option value="201 - Phy, Che, CS, Math">201 - Phy, Che, CS, Math</option>
                                                <option value="302 - CS, Acc, Eco, Comm">302 - CS, Acc, Eco, Comm</option>
                                                <option value="308 - Busi.Math, Acc, Eco, Comm">308 - Busi.Math, Acc, Eco, Comm</option>
                                                <option value="304 - His, Acc, Eco, Comm">304 - His, Acc, Eco, Comm</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Layer 10 End -->

                    <!-- Layer 11 start -->
                    <div class="row container mx-auto mt-4">
                        <div class="col-xl-5 col-lg-6 col-sm-12 row ">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student Academic Year<span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-aca-year" placeholder="2022-2023" name="stuacayear" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-2 col-lg-0 d-lg-none d-xl-block">
                        </div>
                        <div class="col-xl-5 col-lg-6 col-sm-12 ms-lg-0 row">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student Password<span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-pass" placeholder="Type the Password" name="stupass" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Layer 11 End -->

                    <div class="row mb-4 mt-4 mx-auto my-3 ">
                        <div class="col-xl-9 col-lg-11 col-md-11 mb-md-0 mb-4 text-left fs-5 font-weight-bolder text-dark mx-auto">
                            <div>Student Contact Inforamtion</div>
                        </div>
                    </div>

                    <!-- Layer 5 start -->
                    <div class="row container mx-auto mt-4">
                        <div class="col-xl-5 col-lg-6 col-sm-12 row ">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student Contact Number 1 <span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="tel" value="" id="stu-cont-1" placeholder="9876543210" name="stucontnum1" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-2 col-lg-0 d-lg-none d-xl-block">
                        </div>
                        <div class="col-xl-5 col-lg-6 col-sm-12 ms-lg-0 row">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student Contact Number 2 <span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="tel" value="" id="stu-cont-2" placeholder="9753186420" name="stucontnum2" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Layer 5 End -->

                    <!-- Layer 6 start -->
                    <div class="row container mx-auto mt-4">
                        <div class="col-xl-5 col-lg-6 col-sm-12 row ">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student Current Address <span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <textarea class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px; resize: none;" type="text" value="" id="stu-addr" placeholder="Type your Address here" name="stuaddress" rows="4" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Layer 6 End -->

                    <div class="row mb-4 mt-4 mx-auto my-3 ">
                        <div class="col-xl-9 col-lg-11 col-md-11 mb-md-0 mb-4 text-left fs-5 font-weight-bolder text-dark mx-auto">
                            <div>Student Parents Inforamtion</div>
                        </div>
                    </div>

                    <!-- Layer 7 start -->
                    <div class="row container mx-auto mt-4">
                        <div class="col-xl-5 col-lg-6 col-sm-12 row ">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Father's Qualification <span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-fa-edu-qual" placeholder="Ex: Teacher, Engineer,..." name="stufaeduqual" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-2 col-lg-0 d-lg-none d-xl-block">
                        </div>
                        <div class="col-xl-5 col-lg-6 col-sm-12 ms-lg-0 row">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Mother's Qualification<span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-ma-edu-qual" placeholder="Ex: Teacher, Engineer,..." name="stumaeduqual2" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Layer 7 End -->


                    <!-- Layer 8 start -->
                    <div class="row container mx-auto mt-4">
                        <div class="col-xl-5 col-lg-6 col-sm-12 row ">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Father's Occupation Type<span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <select style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" class="form-control rounded-25" id="stu-fa-occu-type" name="stufaoccutype" required>
                                                <option> Select occupation Type</option>
                                                <option value="Public Sector">Public Sector</option>
                                                <option value="Private Sector">Private Sector</option>
                                                <option value="Self Employed">Self Employed</option>
                                                <option value="Business">Business</option>
                                                <option value="Service Men">Service Men</option>
                                                <option value="Doctor">Doctor</option>
                                                <option value="Others">Others</option>
                                                <option value="Unemployed">Husewife</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-2 col-lg-0 d-lg-none d-xl-block">
                        </div>
                        <div class="col-xl-5 col-lg-6 col-sm-12 ms-lg-0 row">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Mother's Occupation Type<span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <select style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" class="form-control rounded-25" id="stu-ma-occu-type" name="stumaoccutype" required>
                                                <option> Select Occupation Type</option>
                                                <option value="Public Sector">Public Sector</option>
                                                <option value="Private Sector">Private Sector</option>
                                                <option value="Self Employed">Self Employed</option>
                                                <option value="Business">Business</option>
                                                <option value="Service Men">Service Women</option>
                                                <option value="Doctor">Doctor</option>
                                                <option value="Others">Others</option>
                                                <option value="Unemployed">Unemployed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Layer 8 End -->

                    <!-- Layer 9 start -->
                    <div class="row container mx-auto mt-4">
                        <div class="col-xl-5 col-lg-6 col-sm-12 row ">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Father's Occupation <span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-fa-occu" placeholder="Specify Occupation" name="stufaoccu" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-2 col-lg-0 d-lg-none d-xl-block">
                        </div>
                        <div class="col-xl-5 col-lg-6 col-sm-12 ms-lg-0 row">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Mother's Occupation<span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-ma-occu" placeholder="Specify Occupation" name="stumaoccu" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Layer 9 End -->

                    <!-- Layer 11 start -->
                    <div class="row container mx-auto mt-4">
                        <div class="col-xl-5 col-lg-6 col-sm-12 row ">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Family's Annual Income <span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-ann-inc" placeholder="#,##,###" name="stuanninc" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-2 col-lg-0 d-lg-none d-xl-block">
                        </div>
                        <div class="col-xl-5 col-lg-6 col-sm-12 ms-lg-0 row">
                            <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                <div class="card-body d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title font-weight-bold  mb-0">Student is Cared By<span style="color: red;">&ast;</span></h5>
                                        </div>
                                        <div class="col-12">
                                            <select style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" class="form-control rounded-25" id="stu-parent-less" name="stucaredby" required>
                                                <option> Select Care Taker</option>
                                                <option value="parents">Parents</option>
                                                <option value="guardian">Guardian</option>
                                                <script>
                                                    // let guard = document.getElementById('guardian');
                                                    let pless = document.getElementById('stu-parent-less');

                                                    function guardian() {
                                                        document.getElementById('guardian').style.display = 'block';
                                                    }

                                                    setInterval(() => {
                                                        if (pless.value == "guardian") {
                                                            guardian()
                                                        } else {
                                                            document.getElementById('guardian').style.display = 'none';
                                                        }
                                                    }, 1000);
                                                </script>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Layer 11 End -->


                    <!-- Layer 12 start -->
                    <div id="guardian">
                        <div class="row container mx-auto mt-4">
                            <div class="col-xl-5 col-lg-6 col-sm-12 row ">
                                <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5 class="card-title font-weight-bold  mb-0">Guardian Name <span style="color: red;">&ast;</span></h5>
                                            </div>
                                            <div class="col-12">
                                                <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-gua-name" placeholder="Guardian Name" name="stuguaname" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-xl-2 col-lg-0 d-lg-none d-xl-block">
                            </div>
                            <div class="col-xl-5 col-lg-6 col-sm-12 ms-lg-0 row">
                                <div class="card card-stats mb-4 mb-xl-0 col-12 border-5 border-top-0 border-start-0 border-end-0 border-bottom border-info">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5 class="card-title font-weight-bold  mb-0">Guardian's Contact Number<span style="color: red;">&ast;</span></h5>
                                            </div>
                                            <div class="col-12">
                                                <input class="form-control rounded-25" style="border: 1px solid rgba(50, 50, 50, 1); padding: 10px;" type="text" value="" id="stu-gua-cont" placeholder="8901234567" name="stuguacont" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Layer 12 End -->

                    <div class="row mb-4 mt-4 mx-auto my-3 ">
                        <div class="col-lg-12 col-md-12 mb-md-0 mb-4 text-center fs-5 font-weight-bolder text-dark mx-auto">
                            <div>
                                <input class="btn btn-hover bg-gradient-info " id="subbtn" type="submit" value="submit" name="submit" onclick="jsonsubmitter()" style="padding-left: 30px; padding-right: 30px; padding-top: 10px; padding-bottom: 10px;" />
                            </div>
                        </div>
                    </div>


                </div>

                <textarea class="d-none" id="final-out" value="" name="submission_data"></textarea>
                <script src="./script.js"></script>

            </form>
        </div>
    </main>


    <script src="../../../../styles/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
</body>

</html>