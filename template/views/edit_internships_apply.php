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
        if (isset(ALLOWED_INTERNSHIP_ROWS[$property])) {
            $setstring = $setstring . $property . " = :" . $property . ", ";
        }
    }
    $setstring = substr($setstring, 0, -2);
    $properties["id"] = $id;
    if ($setstring) {
        $pdo->prepare("UPDATE internships SET " . $setstring . " WHERE id = :id")->execute($properties);
    }
}
header("Location: edit_internships");
