<!-- deze bestand is gebruikt voor toevoegen van een nieuwe stageplek naar de databse door data voor het in te vullen op stageplekken
bewerken pagina en dan op Toevoegen knop drukken -->
<?php

require_once("../src/imports/checkIfLoggedIn.php");
$stuffToAdd = [];
$propertiesString = "";
$valuesPlaceholdersStrings = "";
foreach ($_POST as $key => $value) {
    $key = substr($key, 0, -4);
    $stuffToAdd[$key] = $value;
    $propertiesString = $propertiesString . $key . ", ";
    $valuesPlaceholdersStrings = $valuesPlaceholdersStrings . ":" . $key . ", ";
}
$propertiesString = substr($propertiesstring, 0, -2);
$valuesPlaceholdersStrings = substr($valuesPlaceholdersStrings, 0, -2);
try {
    $pdo->prepare("INSERT INTO internships (" . $propertiesString . ") VALUES (" . $valuesPlaceholdersStrings . ")")->execute($stufftoadd);
} catch (PDOException $error) {
    // kan alleen gebeuren als jij ga proberen om de pagina bewust te misbruiken, dus heb geen moeie afhandeling zoals een
    // error text nodig
}
header("Location: edit_internships");