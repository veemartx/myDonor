<?php

require 'connect.php';

// isset 
if (isset($_POST['tkn'])) {

    $userId = $_POST['tkn'];


    $res = new stdClass();

    $sel = "SELECT * FROM users WHERE userId='$userId'";

    $selQuery = mysqli_query($con, $sel);

    if ($u = mysqli_fetch_assoc($selQuery)) {

        $res->name = $u['fullname'];

        $res->gender = $u['gender'];

        $res->county = $u['county'];

        $res->town = $u['town'];

        $res->email = $u['email'];

        $res->phone = $u['phone'];

        $res->height = $u['height'];

        $res->weight = $u['weight'];




        // get user stats 

        $res->totalDonations = 33;

        $res->totalRequests = 10;

        $res->donationsToday = 2;

        $res->requestsToday = 1;


        $res->myDonations = 1;

        $res->myRequests = 0;

        $res->myDonationsToday = 0;

        $res->myRequestsToday = 0;
    }


    echo json_encode($res);
}
