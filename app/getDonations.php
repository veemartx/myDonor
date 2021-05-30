<?php

require 'connect.php';

// sel
$res = [];

$sel = "SELECT * FROM donations ORDER BY id DESC LIMIT 50";

$selQuery = mysqli_query($con, $sel);

while ($r = mysqli_fetch_assoc($selQuery)) {

    $appeal = new stdClass();

    $appeal->id = $r['donationId'];

    $appeal->code = $r['donationCode'];


    $appeal->user = $r['donorName'];

    // // get the user details 
    $selu = "SELECT * From users WHERE fullname='$appeal->user'";

    $seluQuery = mysqli_query($con, $selu);

    if ($u = mysqli_fetch_assoc($seluQuery)) {

        $appeal->bloodType = $u['bloodType'];

    }




    $appeal->center = $r['donationCenter'];

    $appeal->dueDate = $r['donatedOn'];

    $appeal->created = $r['donatedOn'];

    array_push($res, $appeal);
}


echo json_encode($res);
