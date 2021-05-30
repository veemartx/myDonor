<?php

require 'connect.php';

// sel 
$appealId = $_POST['appealId'];

$res = new stdClass();

$sel = "SELECT * FROM appeals WHERE appealId='$appealId'";

$selQuery = mysqli_query($con, $sel);

if ($r = mysqli_fetch_assoc($selQuery)) {

    $res->code = $r['appealCode'];

    $res->center = $r['center'];

    $res->date = $r['dueDate'];

    $res->created = $r['createdAt'];

    $res->status = $r['status'];

    $res->bloodType = $r['bloodType'];

    $user = $r['userId'];

    $selu = "SELECT * FROM users WHERE userId='$user'";

    $seluQuery = mysqli_query($con, $selu);

    if ($u = mysqli_fetch_assoc($seluQuery)) {

        $res->user = $u['fullname'];

    }
}




echo json_encode($res);
