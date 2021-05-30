<?php

require 'connect.php';

// get sent data 
$firstname = $_POST['firstName'];

$lastName = $_POST['lastName'];

$fullname = $firstname . " " . $lastName;


$email = $_POST['email'];

$phone = $_POST['phone'];

$weight = $_POST['weight'];

$height = $_POST['height'];

$bloodType = $_POST['bloodType'];

$town = $_POST['town'];

$county = $_POST['county'];

$password = $_POST['password'];

$password = password_hash($password, PASSWORD_DEFAULT);

$gender = $_POST['gender'];



$res = new stdClass();

// check if the user exists 
$sel = "SELECT * FROM users WHERE email='$email'";

$selQuery = mysqli_query($con, $sel);

if ($mr = mysqli_fetch_assoc($selQuery)) {

    // 

    $res->success = false;

    $res->message = "The user is already registered";
} else {

    $userId = uniqid();

    $position = "user";

    $status = "active";

    $username = substr(strtolower($firstname), 0, 1) . strtolower($lastName);

    // insert 
    $insert = "INSERT INTO users (userId,fullname,username,email,phone,town,county,gender,weight,height,bloodType,designation,password,status) 
    
    VALUES ('$userId','$fullname','$username','$email','$phone','$town','$county','$gender','$weight','$height','$bloodType','$position','$password','$status')";



    if (mysqli_query($con, $insert)) {

        $res->success = true;

        $res->tkn = $userId;

        $res->message = "Registration Successfull";
    } else {

        $res->success = false;

        $res->message = mysqli_error($con);
    }
}


echo json_encode($res);
