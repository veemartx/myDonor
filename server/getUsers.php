<?php

require 'connect.php';

$sel = "SELECT * FROM users ORDER BY fullname ASC";

$selQuery = mysqli_query($con, $sel);

$res = [];

$no = 1;
while ($u = mysqli_fetch_assoc($selQuery)) {

    $user = new stdClass();

    $user->no = $no;

    $id = $u['userId'];

    $user->name = $u['fullname'];

    $user->email = $u['email'];

    $user->phone = $u['phone'];

    $user->gender = $u['gender'];

    $user->location = $u['town'];

    $user->bloodType = $u['bloodType'];

    $user->position = $u['designation'];

    $user->added = $u['added'];

    if ($u['status'] == 'active') {

        $user->status = "<span style='color:green;'>" . $u['status'] . "</span>";
    } else {

        $user->status = "<span style='color:red;'>" . $u['status'] . "</span>";
    }

    $user->view = "<a href='user?u=" . $id . "'> <i class='eye icon'></i>View </a>";

    array_push($res, $user);

    $no = $no + 1;
}

echo json_encode($res);
