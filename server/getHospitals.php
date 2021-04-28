<?php

require 'connect.php';

$type = 'Hospital';

$sel = "SELECT * FROM centers WHERE type='$type' ORDER BY name  ASC";

$selQuery = mysqli_query($con, $sel);

$res = [];

$no = 1;
while ($u = mysqli_fetch_assoc($selQuery)) {

    $location = new stdClass();

    $location->no = $no;

    $id = $u['centerId'];

    $location->name = $u['name'];

    $location->code = $u['code'];

    $location->location = $u['location'];

    $location->county = $u['county'];


    $location->type = $u['type'];

    $location->email = $u['email'];

    $location->phone = $u['phone'];



    if ($u['status'] == 'active') {

        $location->status = "<span style='color:green;'>" . $u['status'] . "</span>";
    } else {

        $location->status = "<span style='color:red;'>" . $u['status'] . "</span>";
    }

    $location->view = "<a href='location?u=" . $id . "'> <i class='eye icon'></i>View </a>";

    array_push($res, $location);

    $no = $no + 1;
}

echo json_encode($res);
