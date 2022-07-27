<?php

$sessionId = $_POST['sessionId'];
$serviceCode = $_POST['serviceCode'];
$phoneNumber = $_POST['phoneNumber'];
$text = $_POST['text'];

if ($text == '') {
    $response = 'CON What would you like to check';
}
