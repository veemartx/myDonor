<?php

require 'connect.php';

// get the user id 
$userId = $_POST['tkn'];


$sel = "SELECT * FROM appointments WHERE userId='$userId' ORDER BY id DESC LIMIT 1 ";


$selQuery = mysqli_query($con, $sel);


$res = new stdClass();

if ($r = mysqli_fetch_assoc($selQuery)) {


    $res->center = $r['center'];

    $res->date = $r['date'];

    $res->code = $r['code'];

    $res->created = $r['createdAt'];

    $res->status=$r['status'];
}


echo json_encode($res);
