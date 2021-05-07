<?php

require 'connect.php';

// sel
$res = [];

$sel = "SELECT * FROM appeals ORDER BY id DESC LIMIT 50";

$selQuery = mysqli_query($con, $sel);

while ($r = mysqli_fetch_assoc($selQuery)) {

    $appeal = new stdClass();

    $appeal->id = $r['appealId'];

    $appeal->code = $r['appealCode'];

    // 
    $userId = $r['userId'];

    // get the user details 
    $selu = "SELECT * From users WHERE userId='$userId'";

    $seluQuery = mysqli_query($con, $selu);

    if ($u = mysqli_fetch_assoc($seluQuery)) {

        $appeal->user=$u['fullname'];
    }


    $appeal->bloodType = $r['bloodType'];

    $appeal->center = $r['center'];

    $appeal->dueDate=$r['dueDate'];

    $appeal->created=$r['createdAt'];

    array_push($res, $appeal);
}


echo json_encode($res);
