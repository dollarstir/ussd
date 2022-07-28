<?php

// // Read the variables sent via POST from our API
// $sessionId = $_POST['sessionId'];
// $serviceCode = $_POST['serviceCode'];
// $phoneNumber = $_POST['phoneNumber'];
// $text = $_POST['text'];

// if ($text == '') {
//     // This is the first request. Note how we start the response with CON
//     $response = "CON Welcome  to Dollarsoft \n";
//     $response .= "Enter Phone number  \n";
// // $response .= "2. Join Us \n";
//     // $response .= "3. Our Services \n";
//     // $response .= '4. Products';
// } elseif ($text == '0556676471') {
//     // Business logic for first level response
//     $accountNumber = 'ACC1001';

//     // This is a terminal request. Note how we start the response with END
//     $response = "END Welcome  Dollarsoft \n Your phone number is ".$text.' and balance GHS2500';
// } elseif ($text == '2') {
//     // Business logic for first level response
//     // This is a terminal request. Note how we start the response with END
//     $response = "END Welcome  Dollarsoft \n Your phone number is  GHS2500";
// } elseif ($text == '1*1') {
//     // This is a second level response where the user selected 1 in the first instance
//     $accountNumber = 'ACC1001';

//     // This is a terminal request. Note how we start the response with END
//     $response = 'END Your account number is '.$accountNumber;
// } elseif ($text == '1 *'.$text) {
//     // This is a second level response where the user selected 1 in the first instance
//     $accountNumber = 'GHS2500';

//     // This is a terminal request. Note how we start the response with END
//     // $response = "END Welcom Dollarstir \n";
//     $response = 'END Your account Balance is '.$accountNumber;
// }

// // Echo the response back to the API
// header('Content-type: text/plain');
// echo $response;

$sessionId = $_POST['sessionId'];
       $serviceCode = $_POST['serviceCode'];
       $phoneNumber = $_GPOST['phoneNumber'];
       $text = $_POST['text'];
        // use explode to split the string text response from Africa's talking gateway into an array.
        $ussd_string_exploded = explode('*', $text);
        // Get ussd menu level number from the gateway
        $level = count($ussd_string_exploded);
        if ($text == '') {
            // first response when a user dials our ussd code
            $response = "CON Welcome to Online Classes at HLAB \n";
            $response .= "1. Register \n";
            $response .= '2. About HLAB';
        } elseif ($text == '1') {
            // when user respond with option one to register
            $response = "CON Choose which framework to learn \n";
            $response .= "1. Django Web Framework \n";
            $response .= '2. Laravel Web Framework';
        } elseif ($text == '1*1') {
            // when use response with option django
            $response = 'CON Please enter your first name';
        } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 1 && $level == 3) {
            $response = 'CON Please enter your last name';
        } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 1 && $level == 4) {
            $response = 'CON Please enter your email';
        } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 1 && $level == 5) {
            // save data in the database
            $response = 'END Your data has been captured successfully! Thank you for registering for Django online classes at HLAB.';
        } elseif ($text == '1*2') {
            // when use response with option Laravel
            $response = 'CON Please enter your first name. ';
        } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 2 && $level == 3) {
            $response = 'CON Please enter your last name';
        } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 2 && $level == 4) {
            $response = 'CON Please enter your email';
        } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 2 && $level == 5) {
            // save data in the database
            $response = 'END Your data has been captured successfully! Thank you for registering for Laravel online classes at HLAB.';
        } elseif ($text == '2') {
            // Our response a user respond with input 2 from our first level
            $response = 'END At HLAB we try to find a good balance between theory and practical!.';
        }
        // send your response back to the API
        header('Content-type: text/plain');
        echo $response;
