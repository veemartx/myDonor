<?php
// Be sure to include the file you've just downloaded
require_once('AfricasTalkingGateway.php');

// Specify your authentication credentials
$username   = "vee";
$apikey     = "a81e226c81b8d9113a9428258449dd11eb38c854fff7c95787703839cb4bb486";

// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
$recipients = ["+254714734315"];

$names=['Vee'];

//loop through that and send the message
for($i=0;$i<sizeof($recipients);$i++){
    $recipient=$recipients[$i];
    $message="hello ".$names[$i];
    
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

try 
{ 
  // Thats it, hit send and we'll take care of the rest. 
  $results = $gateway->sendMessage($recipient, $message);
			
  foreach($results as $result) {
    // status is either "Success" or "error message"
    echo " Number: " .$result->number;
    echo " Status: " .$result->status;
    echo " MessageId: " .$result->messageId;
    echo " Cost: "   .$result->cost."\n";
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}

// DONE!!! 

}
