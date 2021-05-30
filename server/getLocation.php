<?php

require 'connect.php';

$loction = $_POST['location'];

$sel = "SELECT * FROM centers WHERE centerId='$loction'";

$selQuery = mysqli_query($con, $sel);


$res = new stdClass();

if ($r = mysqli_fetch_assoc($selQuery)) {

    $res->name = $r['name'];
    $res->email = $r['email'];
    $res->phone = $r['phone'];
    $res->location = $r['location'];
    $res->county = $r['county'];
}





echo json_encode($res);
