<?php

require 'connect.php';

// get sent data 
$firstName = $_POST['fname'];

$lastName = $_POST['lname'];

$fullname = $firstName . ' ' . $lastName;

$username = substr(strtolower($firstName), 0, 1) . strtolower($lastName);

$password = password_hash('0000', PASSWORD_DEFAULT);


$email = $_POST['email'];

$phone = $_POST['phone'];

$county = $_POST['county'];

$town = $_POST['town'];

$weight = $_POST['weight'];

$heigt = $_POST['height'];

$gender = $_POST['gender'];

$dob = $_POST['dob'];

$designation = $_POST['position'];

$bloodType = $_POST['bloodType'];

// check if the user exists 
$sel = "SELECT * FROM users WHERE email='$email'";

$selQuery = mysqli_query($con, $sel);

if ($u = mysqli_fetch_assoc($selQuery)) {

    echo "This user  email is already registered";
} else {

    $status = 'active';

    $userId = uniqid();

    $insert = "INSERT INTO users (userId,fullname,username,email,phone,town,county,gender,weight,height,bloodType,designation,password,status) 
    
    VALUES ('$userId','$fullname','$username','$email','$phone','$town','$county','$gender','$weight','$heigt','$bloodType','$designation','$password','$status')";

    if (mysqli_query($con, $insert)) {

        echo "User Added Successfully";

    } else {

        echo mysqli_error($con);
    }
}
