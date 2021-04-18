<?php

require 'connect.php';

$res = new stdClass();

$branch = "branch";

$res->latestRequests = latestRequests($con, $branch);


$res->latestDonations = latestDonations($con, $branch);

$res->topCenters = topCenters($con, $branch);

$res->salesByCategory = getSalesByCategory($con, $branch);




echo json_encode($res);




function latestRequests($con, $branch)
{

    $receipts = ["CR909738733", "CR900898378", "CR900909377"];

    $times = ["2020-02-10 07:09:38", "2021-03-04 11:09:38", "2021-02-10 07:09:38"];

    $names = ['John Kirianki', 'Nahur Kiptoo', 'Emily Mukaria'];

    $bloodType = ['A+', 'O+', 'AB'];

    $resArray = [];

    for ($x = 0; $x < sizeof($receipts); $x++) {

        $resObject = new stdClass();

        $resObject->no = $x + 1;

        $resObject->receiptNo = $receipts[$x];

        $resObject->names = $names[$x];

        $resObject->time = $times[$x];

        $resObject->type = $bloodType[$x];

        $resObject->view = "<a>View</a>";

        array_push($resArray, $resObject);
    }





    return $resArray;
}


function latestDonations($con, $branch)
{

    $receipts = ["CR909738733", "CR900898378", "CR900909377"];

    $times = ["2020-02-10 07:09:38", "2021-03-04 11:09:38", "2021-02-10 07:09:38"];

    $names = ['John Kirianki', 'Nahur Kiptoo', 'Emily Mukaria'];

    $location = ['Nakuru Valley Hospital', 'Karen Hostpita', 'Kabarak Univ'];


    $resArray = [];

    for ($x = 0; $x < sizeof($receipts); $x++) {

        $resObj = new stdClass();

        $resObj->no = $x + 1;


        $resObj->donationId = $receipts[$x];

        $resObj->name = $names[$x];

        $resObj->location = $location[$x];

        $resObj->times = $times[$x];


        $resObj->view = "<a>View</a>";

        array_push($resArray, $resObj);
    }


    return $resArray;
}

function topCenters($con, $branch)
{

    $topCenters = ["Mediheal Hospital", "Nakuru Pgh", "Nairobi Womens Hospital"];

    $location = ['Nakuru', 'Nakuru', 'Nairobi'];

    $codes = ["20011", "A0793", "T0201"];


    $resArray = [];

    for ($x = 0; $x < sizeof($topCenters); $x++) {

        $resObj = new stdClass();

        $resObj->no = $x + 1;

        $resObj->name = $topCenters[$x];

        $resObj->location = $location[$x];

        $resObj->view = "<a>View</a>";

        array_push($resArray, $resObj);
    }


    return $resArray;
}


function getSalesByCategory($con, $branch)
{

    return [];
}
