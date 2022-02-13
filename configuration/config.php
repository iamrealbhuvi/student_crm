<?php

$server = "localhost:3306";
// $port = "3500";
$user = "bhuvi";
$pass = "iamrealbhuvi";
$database = "studstat";


$conn = mysqli_connect($server, $user, $pass, $database);
if (!$conn) {
    echo("<script>alert('Database connection failed... please reconfigure...')</script>");
} else {
    echo("<script>alert('Database connection success...')</script>");
}