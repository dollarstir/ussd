<?php

$sessionId = $_POST['sessionId'];
$serviceCode = $_POST['serviceCode'];
$phoneNumber = $_POST['phoneNumber'];
$text = $_POST['text'];

if ($text == '') {
    $response = 'CON What would you like to check \n';
    $response .= '1. My Account \n';
    $response .= '2. Phone Number';
} elseif ($text == '1') {
    $response = 'CON Choose account information you like to view \n';
    $response .= '1. Account Number\n';
    $response .= '2. Account Balance';
} elseif ($text == '2') {
    $response = 'END Your Phone number is '.$phoneNumber;
}
