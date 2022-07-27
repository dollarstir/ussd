<?php

// Read the variables sent via POST from our API
$sessionId = $_POST['sessionId'];
$serviceCode = $_POST['serviceCode'];
$phoneNumber = $_POST['phoneNumber'];
$text = $_POST['text'];

if ($text == '') {
    // This is the first request. Note how we start the response with CON
    $response = "CON Welcome  to Dollarsoft \n";
    $response .= "Enter Phone number  \n";
// $response .= "2. Join Us \n";
    // $response .= "3. Our Services \n";
    // $response .= '4. Products';
} elseif ($text == '0556676471') {
    // Business logic for first level response
    $accountNumber = 'ACC1001';

    // This is a terminal request. Note how we start the response with END
    $response = "END Welcome  Dollarsoft \n Your phone number is ".$text.' and balance GHS2500';
} elseif ($text == '2') {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = "END Welcome  Dollarsoft \n Your phone number is  GHS2500";
} elseif ($text == '1*1') {
    // This is a second level response where the user selected 1 in the first instance
    $accountNumber = 'ACC1001';

    // This is a terminal request. Note how we start the response with END
    $response = 'END Your account number is '.$accountNumber;
} elseif ($text == '1 *'.$text) {
    // This is a second level response where the user selected 1 in the first instance
    $accountNumber = 'GHS2500';

    // This is a terminal request. Note how we start the response with END
    // $response = "END Welcom Dollarstir \n";
    $response = 'END Your account Balance is '.$accountNumber;
}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
