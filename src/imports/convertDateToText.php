<?php

$months = [
    null, // geen "0" maand
    "januari",
    "februari",
    "maart",
    "april",
    "mei",
    "juni",
    "juli",
    "augustus",
    "september",
    "oktober",
    "november",
    "december"
];

function convertDateToText($dateandtime) {
    $splitdateandtime = explode(" ", $dateandtime);
    $splittime = explode(":", $splitdateandtime[1]);
    $splitdate = explode("-", $splitdateandtime[0]);
    $currenttime = time();
    $year = $splitdate[0];
    return date("y-m-d", $currenttime) == substr($splitdateandtime[0], 2) ?
    "Vandaag, " . $splittime[0] . ":" . $splittime[1] :
    $splitdate[2] . " " . $GLOBALS["months"][(int)$splitdate[1]] .
    (date("y", $currenttime) == substr($year, 2) ?
    "" :
    " $year");
}

?>