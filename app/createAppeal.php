<?php

require 'connect.php';

// get sent data 

$bloodType = $_POST['bloodType'];

$userId = $_POST['userId'];

$center = $_POST['center'];

$date = $_POST['dateTime'];


$appealCode = "REQ-" . substr(str_shuffle('1234567890QWTPGLKA'), 0, 4);

$status = 'Pending';

// check if an appea l exists 

$sel = "SELECT * FROM appeals WHERE userId='$userId' AND status='$status'";

$selQuery = mysqli_query($con, $sel);

if ($r = mysqli_fetch_assoc($selQuery)) {

    echo "You Have A Pending Appeal. Check Back After Some Time";
} else {

    $appealId = uniqid();
    // insert
    $insert = "INSERT INTO appeals (appealId,appealCode,center,userId,bloodType,dueDate,status) 
    
    VALUES ('$appealId','$appealCode','$center','$userId','$bloodType','$date','$status')";


    if (mysqli_query($con, $insert)) {
        echo "Appeal Registered Successfully";
    } else {

        echo mysqli_error($con);
    }
}
