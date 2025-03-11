<?php

function getTextFromDatabase($pdo, $id) {
    $statement = $pdo->prepare("SELECT text FROM texts WHERE id = ?");
    $statement->execute([$id]);
    $text = $statement->fetch()["text"];
    return isset($GLOBALS["editingPage"]) ? '<input type="text" name="'.$id.'" value=\''.$text.
    '\'class="border border-black bg-primary-background">' : $text;
}

?>