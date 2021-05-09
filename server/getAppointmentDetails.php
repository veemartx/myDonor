<?php

require 'connect.php';

// get sent data 
$appointmentid = $_POST['appId'];

$sel = "SELECT * FROM appointments WHERE appointmentid='$appointmentid'";

$selQuery = mysqli_query($con, $sel);

$app = new stdClass();


if ($r = mysqli_fetch_assoc($selQuery)) {


    $app->center = $r['center'];

    $app->code = $r['code'];

    $app->date = $r['date'];

    $app->created = $r['createdAt'];


    $user = $r['userId'];

    $selu = "SELECT * FROM users WHERE userId='$user'";

    $seluQuery = mysqli_query($con, $selu);

    if ($u = mysqli_fetch_assoc($seluQuery)) {

        $app->user = $u['fullname'];
    }

    $app->status = $r['status'];
}


echo json_encode($app);
