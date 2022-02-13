<?php

include "../../configuration/config.php";
session_start();
error_reporting(0);

$instit = $_SESSION['instit'];

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
</head>

<body>

    

    <script src="../../styles/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>