<?php

include "../../../configuration/config.php";
session_start();
error_reporting(0);


$instituser = $_SESSION['schoolusername'];
$postid = $_SESSION['editid'];


$instit_feed_edit_sql = "SELECT * FROM $instituser" . "_feeder WHERE `id` = \"$postid\"; ";
$instit_feed_edit_query = mysqli_query($conn, $instit_feed_edit_sql);
$instit_feed_edit_array = mysqli_fetch_assoc($instit_feed_edit_query);

$instit_feed_edit_enc = json_encode($instit_feed_edit_array);


if(isset($_POST['submit'])){
    $upcont = $_POST['postcontent'];
    $update_sql = "UPDATE $instituser"."_feeder SET `postcontent` = \"$upcont\" WHERE `id` = \"$postid\"; ";
    
    $update_req = mysqli_query($conn, $update_sql);
    
    if($update_req){
        echo '<script>window.location.replace("../index.php");</script>';
    }
    else {
        echo "<script>alert('Something Went Wrong')</script>";
    }
}


?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="../../../styles/bootstrap/dist/css/bootstrap.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<body style="width: 100%; height: 100%" class="bg-light d-flex justify-content-center align-items-center">
    <form action="" method="POST" class="d-block w-50">
    <h3 class="w-100 text-center">Edit Post</h3>    
    <label class="text-large text-dark" for="uppostdata">Post Content</label><br>
        <textarea class="w-100" type="text" name="postcontent" id="uppostdata" rows="5" style="resize: none;"></textarea>
        <br>
        <input class="btn btn-primary btn-medium mx-auto mt-2 float-end" type="submit" name="submit" value="updatepost">
    </form>
    <script>
        let editarray = <?php echo $instit_feed_edit_enc ?>

        document.getElementById('uppostdata').innerHTML = editarray['postcontent'];
    </script>
    
</body>

</html>