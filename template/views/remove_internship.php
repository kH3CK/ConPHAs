<?php

// require_once("../src/imports/checkIfLoggedIn.php");
require_once("../src/imports/connectToDatabase.php");
$pdo->prepare("DELETE FROM internships WHERE id = ?")->execute([$_GET["id"]]);
header("Location: edit_internships");

?>