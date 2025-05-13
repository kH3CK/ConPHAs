<!-- deze bestand is gebruikt voor uitvoeren van alle aanpassingen die jij doe op stageplekken bewerken pagina. Alle stageplekken
staan in een grote form element die dan stuurt alle data over ze hier naartoe -->
<?php

require_once("../src/imports/checkIfLoggedIn.php");
define("ALLOWED_INTERNSHIP_ROWS", [
    "image_link" => true,
    "title" => true,
    "start_date_and_time" => true,
    "weeks" => true,
    "hours" => true,
    "location" => true,
    "minimum_level" => true,
    "type" => true,
    "compensation" => true,
    "description" => true
]);
$stuffToChange = [];
foreach ($_POST as $key => $value) {
    $splitKey = explode("-", $key);
    $property = $splitKey[0];
    $id = $splitKey[1];
    if (!isset($stuffToChange[$id])) {
        $stuffToChange[$id] = [];
    }
    $stuffToChange[$id][$property] = $value;
}
foreach ($stuffToChange as $id => $properties) {
    $setString = "";
    foreach ($properties as $property => $value) {
        if (isset(ALLOWED_INTERNSHIP_ROWS[$property])) {
            $setString = $setString . $property . " = :" . $property . ", ";
        }
    }
    $setString = substr($setString, 0, -2);
    $properties["id"] = $id;
    if ($setString) {
        $pdo->prepare("UPDATE internships SET " . $setString . " WHERE id = :id")->execute($properties);
    }
}
header("Location: edit_internships");
