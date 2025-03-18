<?php

require_once("../src/imports/connectToDatabase.php");

function getTextFromDatabase(int $id) {
    $statement = $GLOBALS["pdo"]->prepare("SELECT text FROM texts WHERE id = ?");
    $statement->execute([$id]);
    $text = $statement->fetch()["text"];
    return isset($GLOBALS["editingPage"]) ? '<input type="text" name="text-'.$id.'" value=\''.$text.
    '\'class="border border-black bg-primary-background">' : $text;
}

?>