<?php

require_once("../src/imports/checkIfLoggedIn.php");
$pdo->prepare("DELETE FROM blogs WHERE id = ?")->execute([$_GET["id"]]);
header("Location: admin");
