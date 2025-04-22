<?php

require_once("../src/imports/checkIfLoggedIn.php");
foreach ($_POST as $key => $value) {
    if (substr($key, 0, 5) == "text-") {
        $pdo->prepare("UPDATE texts SET text = ? WHERE id = ?")->execute([$value, substr($key, 5)]);
    }
}
header("Location: edit_page?path=" . $_POST["path"]);
