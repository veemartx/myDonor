<?php

require 'connect.php';

$userId = $_POST['userId'];


$del = "DELETE FROM users WHERE userId='$userId'";

if (mysqli_query($con, $del)) {

    echo "User Deleted Successfully";

} else {

    echo mysqli_error($con);
}
