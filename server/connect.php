<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="mydonor_db";

$con = mysqli_connect($servername, $username, $password,$db);


if (!$con) {
    die("There was an error: " . mysqli_connect_error());
}
