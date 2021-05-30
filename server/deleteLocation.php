<?php

require 'connect.php';

$location = $_POST['location'];


$del = "DELETE FROM centers WHERE centerId='$location'";

if (mysqli_query($con, $del)) {

    echo "Location Deleted Successfully";

} else {

    echo mysqli_error($con);
}
