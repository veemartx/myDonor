<?php

require 'connect.php';

// get centers 
$sel = "SELECT * FROM centers ORDER BY name ASC";

$selQuery = mysqli_query($con, $sel);

$res = [];

while ($r = mysqli_fetch_assoc($selQuery)) {

    $resObj = new stdClass();

    $resObj->name=$r['name'];

    $resObj->id=$r['centerId'];

    array_push($res, $r['name']);
}


echo json_encode($res);
