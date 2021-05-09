<?php

require 'connect.php';

$res = [];

$sel = "SELECT * FROM appeals ORDER BY id DESC";

$selQuery = mysqli_query($con, $sel);

$no = 1;
while ($r = mysqli_fetch_assoc($selQuery)) {

    $appeal = new stdClass();

    $appeal->no = $no;

    $appealId = $r['appealId'];

    $appeal->code = $r['appealCode'];

    // user
    $userId = $r['userId'];

    $selu = "SELECT * FROM users WHERE userId='$userId'";

    $seluQuery = mysqli_query($con, $selu);

    if ($u = mysqli_fetch_assoc($seluQuery)) {

        $appeal->user = $u['fullname'];
    }


    $appeal->center = $r['center'];

    $appeal->date = $r['dueDate'];

    $appeal->bloodType = $r['bloodType'];

    $appeal->status = $r['status'];

    $appeal->view = "<a href='appeal?a=" . $appealId . "'>View</a>";


    $no = $no + 1;

    array_push($res, $appeal);
}


echo json_encode($res);
