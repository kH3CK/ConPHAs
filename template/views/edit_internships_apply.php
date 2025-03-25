<?php

// require_once("../src/imports/checkIfLoggedIn.php");
require_once("../src/imports/connectToDatabase.php");
$stufftochange = [];
foreach ($_POST as $key => $value) {
    $splitkey = explode("-", $key);
    $property = $splitkey[0];
    $id = $splitkey[1];
    if (!isset($stufftochange[$id])) {
        $stufftochange[$id] = [];
    }
    $stufftochange[$id][$property] = $value;
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
header("Location: edit_internships");

?>