<?php

// require_once("../src/imports/checkIfLoggedIn.php");
require_once("../src/imports/connectToDatabase.php");
$stufftochange = [];
$stufftoadd = [];
foreach ($_POST as $key => $value) {
    $splitkey = explode("-", $key);
    $property = $splitkey[0];
    $id = $splitkey[1];
    if ($id == "new" && $property) {
        $stufftoadd[$property] = $value;
    } else {
        if (!isset($stufftochange[$id])) {
            $stufftochange[$id] = [];
        }
        $stufftochange[$id][$property] = $value;
    }
}
foreach ($stufftochange as $id => $properties) {
    $setstring = "";
    foreach ($properties as $property => $value) {
        $setstring = $setstring . $property . " = :" . $property . ", ";
    }
    $setstring = substr($setstring, 0, -2);
    $properties["id"] = $id;
    $pdo->prepare("UPDATE internships SET " . $setstring . " WHERE id = :id")->execute($properties);
}
if ($stufftoadd) {
    $propertiesstring = "";
    $valuesplaceholdersstrings = "";
    foreach ($stufftoadd as $property => $value) {
        $propertiesstring = $propertiesstring . $property . ", ";
        $valuesplaceholdersstrings = $valuesplaceholdersstrings . $value . ", ";
    }
    $propertiesstring = substr($propertiesstring, 0, -2);
    $valuesplaceholdersstrings = substr($valuesplaceholdersstrings, 0, -2);
    $pdo->prepare("INSERT INTO internships (" . $propertiesstring . ") VALUES (" . $valuesplaceholdersstrings . ")")->execute($stufftoadd);
}
header("Location: edit_internships");

?>