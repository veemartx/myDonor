<?php

require 'connect.php';

$res = [];

// 
$sel = "SELECT * FROM appointments";

$selQuery = mysqli_query($con, $sel);

$no = 1;

while ($r = mysqli_fetch_assoc($selQuery)) {

    $app = new stdClass();

    $app->no = $no;

    $id = $r['appointmentId'];

    $app->code = $r['code'];


    $user = $r['userId'];

    $selu = "SELECT * FROM users WHERE userId='$user'";

    $seluQuery = mysqli_query($con, $selu);

    if ($u = mysqli_fetch_assoc($seluQuery)) {

        $app->user = $u['fullname'];
    }

    $app->center = $r['center'];


    $app->date = $r['date'];


    $app->created = $r['createdAt'];

    $app->status = $r['status'];

    $app->view = "<a href='appointment?a=" . $id . "'> View <a>";



    $no = $no + 1;

    array_push($res, $app);
}

echo json_encode($res);
