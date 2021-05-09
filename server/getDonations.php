<?php

require 'connect.php';

$res = [];

$sel = "SELECT * FROM donations ORDER BY id DESC";

$selQuery = mysqli_query($con, $sel);

$no = 1;
while ($r = mysqli_fetch_assoc($selQuery)) {

    $donation = new stdClass();

    $donation->no = $no;

    $donationId = $r['donationId'];

    $donation->code = $r['donationCode'];

    $donation->donor = $r['donorName'];

    $donation->center = $r['donationCenter'];

    $donation->status = $r['status'];

    $donation->view = "<a href='donation?dn=" . $donationId . "'>View</a>";


    $no = $no + 1;

    array_push($res, $donation);
}


echo json_encode($res);
