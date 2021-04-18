<?php

## Author Vee

$res = new stdClass();

// check if the cookie is set 

if (isset($_COOKIE['myDonor_Liu'])) {
    // the person is logged in 
    // logged in user 
    $loggedInUser = $_COOKIE['myDonor_Liu'];

    $res->loggedIn = true;

    // echo $loggedInUser;

} else {
    // the person is looged out 
    $res->loggedIn = false;
}


echo json_encode($res);