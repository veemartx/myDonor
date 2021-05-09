<?php

require 'connect.php';


$appId = $_POST['appId'];

$status = 'Declined';

// update 
$update = "UPDATE appointments SET status='$status' WHERE appointmentId='$appId'";

if (mysqli_query($con, $update)) {

    echo "Appointment Declined";
} else {

    echo mysqli_error($con);
    
}
