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
} elseif ($text == '') {
    // Business logic for first level response
    $response = "CON Choose account information you want to view \n";
    $response .= " Account number \n";
} elseif ($text == '2') {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = 'END Your phone number is '.$phoneNumber;
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
