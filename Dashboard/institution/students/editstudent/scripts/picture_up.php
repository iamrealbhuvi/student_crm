<?php


// Used to generate date & time according to user ip
$ip = $_SERVER['REMOTE_ADDR'];
$ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
$ipInfo = json_decode($ipInfo);
$timezone = $ipInfo->timezone;
date_default_timezone_set($timezone);
$curr_date = date("d-m-Y");
$curr_time = date("h-ia");


// Target's Directory
$target_dir = $path_to;

// Target File Received from upload
$target_file = $target_dir . basename($roller . $_FILES['myprofile']['name']);

// Truth tester
$uploadOk = 1;

// ImageFileType to get its extension
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {

    // renaming the uploaded file into a unique handlable file
    $target_file = $target_dir . basename($roller . $curr_date . $curr_time . '.' . $imageFileType);

    // Checks whether its a image or any other
    $check = getimagesize($_FILES['myprofile']['tmp_name']);


    if ($check !== false) {
        echo "<script>console.log('File is an image - " . $check["mime"] . ".')</script>";
        $uploadOk = 1;
    } else {
        echo "<script>console.log('File is not an image.')</script>";
        $uploadOk = 0;
    }
}

// Is there a file already exists or not
if (file_exists($target_file)) {
    echo "<script>alert('Sorry, file already exists.')</script>";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["myprofile"]["size"] > 500000) {
    echo "<script>alert('Sorry, your file is too large.')</script>";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["myprofile"]["tmp_name"], $target_file)) {
        echo "<script>alert('The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.')</script>";
    } else {
        echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
    }
}
