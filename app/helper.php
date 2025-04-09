<?php 

CONST BASEURL = "http://localhost/wish";

$wYear = date("Y");

function wDay()
{
    date_default_timezone_set("Asia/Jakarta");
    $time = date("H");

    if($time >= 4 && $time < 12) {
        $day = "Pagi";
    } elseif($time >= 12 && $time < 16) {
        $day = "Siang";
    } elseif($time >= 16 && $time < 19) {
        $day = "Sore";
    } else {
        $day = "Malam";
    }

    return $day;
}