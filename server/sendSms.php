<?php
// Be sure to include the file you've just downloaded
require_once('africastalking/AfricasTalkingGateway.php');


require 'connect.php';


// Specify your authentication credentials
$username   = "vee";
$apikey     = "a81e226c81b8d9113a9428258449dd11eb38c854fff7c95787703839cb4bb486";


$appealId = $_POST['appealId'];


// get the appeal user details 
$sel = "SELECT * FROM appeals WHERE appealId='$appealId'";

$selQuery = mysqli_query($con, $sel);

if ($u = mysqli_fetch_assoc($selQuery)) {

    $userId = $u['userId'];


    // get the user details
    $selu = "SELECT * FROM users WHERE userId='$userId'";

    $seluQuery = mysqli_query($con, $selu);

    if ($user = mysqli_fetch_assoc($seluQuery)) {

        $name = $user['fullname'];

        $phone = $user['phone'];

        sendSms($username, $apikey, $name, $phone);
    } else {

        echo "The User Is No Longer Available";
    }
}



function sendSms($username, $apikey, $name, $phone)
{


    // Specify the numbers that you want to send to in a comma-separated list
    // Please ensure you include the country code (+254 for Kenya in this case)
    // $recipient = "+254714734315";

    $name = 'Vee';


    $message = "Dear " . $name . "Your Blood Donation Appeal is successfull \nVisit Your Nearest Donation Center For Further Assistance";

    // Create a new instance of our awesome gateway class
    $gateway    = new AfricasTalkingGateway($username, $apikey);

    /*************************************************************************************
NOTE: If connecting to the sandbox:

1. Use "sandbox" as the username
2. Use the apiKey generated from your sandbox application
 https://account.africastalking.com/apps/sandbox/settings/key
3. Add the "sandbox" flag to the constructor

$gateway  = new AfricasTalkingGateway($username, $apiKey, "sandbox");
     **************************************************************************************/

    // Any gateway error will be captured by our custom Exception class below, 
    // so wrap the call in a try-catch block

    try {
        // Thats it, hit send and we'll take care of the rest. 
        $results = $gateway->sendMessage($phone, $message);

        foreach ($results as $result) {
            // status is either "Success" or "error message"
            echo " Number: " . $result->number;
            echo " Status: " . $result->status;
            echo " MessageId: " . $result->messageId;
            echo " Cost: "   . $result->cost . "\n";
        }
    } catch (AfricasTalkingGatewayException $e) {
        echo "Encountered an error while sending: " . $e->getMessage();
    }

    // DONE!!! 

    //loop through that and send the message

}
