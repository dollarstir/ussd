<?php

include_once 'menu.php';
    //set isUserRegistered flag to true
    $isUserRegistered = true;
    //Read the data sent via POST from our AT API
    $sessionId = $_POST['sessionId'];
    $serviceCode = $_POST['serviceCode'];
    $phoneNumber = $_POST['phoneNumber'];
    $text = $_POST['text'];
    $menu = new Menu();
    if ($text == '' && $isUserRegistered == true) {
        //user is registered and string is is empty
        echo 'CON '.$menu->mainMenuRegistered('Dollarstir');
    } elseif ($text == '' && $isUserRegistered == false) {
        //user is unregistered and string is is empty
        $menu->mainMenuUnRegistered();
    } elseif ($isUserRegistered == false) {
        //user is unregistered and string is not empty
        $textArray = explode('*', $text);
        switch ($textArray[0]) {
            case 1:
                $menu->registerMenu($textArray, $phoneNumber);
            break;
            default:
                echo 'END Invalid choice. Please try again';
        }
    } else {
        //user is registered and string is not empty
        $textArray = explode('*', $text);
        switch ($textArray[0]) {
            case 1:
                $menu->sendMoneyMenu($textArray, $sessionId);
            break;
            case 2:
                $menu->withdrawMoneyMenu($textArray);
            break;
            case 3:
                $menu->checkBalanceMenu($textArray);
                break;
            default:
                echo "END Inavalid menu\n";
        }
    }
