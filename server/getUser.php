<?php

require 'connect.php';

// get sent data 
$userId = $_POST['userId'];

$res = new stdClass();


// get details 
$sel = "SELECT * FROM users WHERE userId='$userId'";

$selQuery = mysqli_query($con, $sel);

if ($u = mysqli_fetch_assoc($selQuery)) {

    $res->exists = true;

    $res->name = $u['fullname'];

    $res->phone = $u['phone'];

    $res->email = $u['email'];

    $res->town = $u['town'];

    $res->county = $u['county'];

    $res->weight = $u['weight'];

    $res->height = $u['height'];

    $res->gender = $u['gender'];

    $res->designation = $u['designation'];

    $res->donations = [];
} else {

    $res->exists = false;
}


echo json_encode($res);
