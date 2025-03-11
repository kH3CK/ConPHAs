<?php

function getTextFromDatabase($pdo, $id) {
    $statement = $pdo->prepare("SELECT text FROM texts WHERE id = ?");
    $statement->execute([$id]);
    return $statement->fetch()["text"];
}

?>