<?php

require 'connect.php';


$appId = $_POST['appId'];

$donationAmount = $_POST['donationAmount'];

$status = 'Complete';

$code = "DN-" . substr(str_shuffle('1234567890QWTPGLKA'), 0, 4);



// get the appointment details
$sel = "SELECT * FROM appointments WHERE appointmentId='$appId'";

$selQuery = mysqli_query($con, $sel);

if ($a = mysqli_fetch_assoc($selQuery)) {

    $userId = $a['userId'];

    $date = $a['date'];

    $center = $a['center'];

    $selu = "SELECT * FROM users WHERE userId='$userId'";

    $seluQuery = mysqli_query($con, $selu);

    if ($u = mysqli_fetch_assoc($seluQuery)) {

        $donorName = $u['fullname'];
    } else {

        $donorName = "Deafault";
    }

    $donationId = uniqid();


    //  add the donation
    $insert = "INSERT INTO donations (donationId,donorId,donationCode,donorName,donationCenter,donationVol,status) 
    
    VALUES ('$donationId','$userId','$code','$donorName','$center','$donationAmount','$status')";

    if (mysqli_query($con, $insert)) {

        // update 
        $update = "UPDATE appointments SET status='$status' WHERE appointmentId='$appId'";

        if (mysqli_query($con, $update)) {

            echo "Donation Completed Successfully";
        } else {

            echo mysqli_error($con);
        }
    } else {

        echo mysqli_error($con);
    }
}
