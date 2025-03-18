<?php

require_once("../src/imports/connectToDatabase.php");
require_once("../src/imports/returnInputIfEditingPage.php");

function getTextFromDatabase(int $id) {
    $statement = $GLOBALS["pdo"]->prepare("SELECT text FROM texts WHERE id = ?");
    $statement->execute([$id]);
    $text = $statement->fetch()["text"];
    return returnInputIfEditingPage($text, "text-" . $id);
}

?>