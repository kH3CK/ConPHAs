<?php

// require_once("../src/imports/checkIfLoggedIn.php");
require_once("../src/imports/connectToDatabase.php");
$stufftoadd = [];
$propertiesstring = "";
$valuesplaceholdersstrings = "";
foreach ($_POST as $key => $value) {
    $key = substr($key, 0, -4);
    $stufftoadd[$key] = $value;
    $propertiesstring = $propertiesstring . $key . ", ";
    $valuesplaceholdersstrings = $valuesplaceholdersstrings . ":" . $key . ", ";
}
$propertiesstring = substr($propertiesstring, 0, -2);
$valuesplaceholdersstrings = substr($valuesplaceholdersstrings, 0, -2);
echo "INSERT INTO internships (" . $propertiesstring . ") VALUES (" . $valuesplaceholdersstrings . ")";
$pdo->prepare("INSERT INTO internships (" . $propertiesstring . ") VALUES (" . $valuesplaceholdersstrings . ")")->execute($stufftoadd);
header("Location: edit_internships");

?>