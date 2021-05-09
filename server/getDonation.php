<?php

require 'connect.php';

$donationId = $_POST['donationId'];

// 
$sel = "SELECT * FROM donations WHERE donationId='$donationId'";

$selQuery = mysqli_query($con, $sel);


$res = new stdClass();

if ($r = mysqli_fetch_assoc($selQuery)) {

    $res->code = $r['donationCode'];

    $res->center = $r['donationCenter'];

    $res->status = $r['status'];

    $res->donor = $r['donorName'];

    $res->date = $r['donatedOn'];

    $donorId = $r['donorId'];


    // get the donor details 
    $selu = "SELECT * FROM users WHERE userId='$donorId'";

    $seluQuery = mysqli_query($con, $selu);

    if ($u = mysqli_fetch_assoc($seluQuery)) {

        // $donorName = $u['fullname'];

        $res->bloodType = $u['bloodType'];
    }


    $res->amount = $r['donationVol'];
}


echo json_encode($res);
