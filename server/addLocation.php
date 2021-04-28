<?php

require 'connect.php';


// get sent data 
$name = $_POST['name'];

$county = $_POST['county'];

$location = $_POST['location'];

$type = $_POST['type'];


$email = $_POST['email'];

$phone = $_POST['phone'];


$status = 'active';

$id = uniqid();

$code = "MDL-" . substr(str_shuffle('1234567890QTHKPMCD'), 0, 4);


// check if the location exists 
$sel = "SELECT * FROM centers WHERE name='$name' AND location='$location' AND county='$county'";

$selQuery = mysqli_query($con, $sel);

if ($r = mysqli_fetch_assoc($selQuery)) {

    echo "The Location Already Exists";
} else {

    $insert = "INSERT INTO centers (centerId,name,location,county,type,code,phone,email,status) 
    VALUES ('$id','$name','$location','$county','$type','$code','$phone','$email','$status')";

    if (mysqli_query($con, $insert)) {

        echo "Location Added Successfully";
        
    } else {

        echo mysqli_error($con);
    }
}
