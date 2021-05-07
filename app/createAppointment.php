<?php

require 'connect.php';

// get the sent data 
$userId = $_POST['userId'];

$center = $_POST['center'];

$date = $_POST['dateTime'];

$status = "Pending Review";


// appoint id 
$appointmentId = uniqid();

$appointmentCode = "AP-" . substr(str_shuffle('1234567890QWTPGLKA'), 0, 4);

// check if their a pendig appointent

$sel = "SELECT * FROM appointments WHERE userId='$userId' AND status='$status'";

$selQuery = mysqli_query($con, $sel);

if ($r = mysqli_fetch_assoc($selQuery)) {

    echo "You Alredy Have A Pending Appointment";
} else {

    $insert = "INSERT INTO appointments (appointmentId,code,date,center,userId,status) 
    
    VALUES ('$appointmentId','$appointmentCode','$date','$center','$userId','$status')";

    if (mysqli_query($con, $insert)) {

        echo "Appointment Createad Successfully";
    } else {

        echo mysqli_error($con);
    }
}
