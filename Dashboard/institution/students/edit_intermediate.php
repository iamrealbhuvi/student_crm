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


$editroute = $_POST['editroute'];

if(isset($_POST['editroute']) && isset($_POST['submit'])){
    $_SESSION['editroute'] = $editroute;
    header( "Location: ./editstudent/" );
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit-Student Gateway</title>
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

<body class="bg-gray-200 d-flex justify-content-center align-items-center " style="height: 100vh;">


    <div class="container w-50 bg-white shadow-lg rounded-3">
        <div class="text-center">
            <form action="" method="POST" class="">
                <label for="editroute" class="fs-4 mt-3 mb-3 text-dark">Enter The Student Roll Number</label>
                <div>
                    <input type="text" name="editroute" value="<?php echo $instit_fetched_array['schoolidcode'] ?>" id="editroute" class="form-control w-50 border mx-auto p-2" >
                </div>
                
                <div>
                    <input type="submit" value="submit" id="submit" name="submit" class="btn mt-3 mb-3 px-3 py-1 bg-gradient-info ">
                </div>
            </form>
        </div>

    </div>



    <script src="../../../styles/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>
</body>

</html>