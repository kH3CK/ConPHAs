<?php

// require_once("../src/imports/checkIfLoggedIn.php");
require_once("../src/imports/connectToDatabase.php");
foreach ([$_POST["title"], $_POST["logo"], $_POST["font-link"], $_POST["font-code"]] as $key => $value) {
    $pdo->prepare("UPDATE texts SET text = ? WHERE id = ?")->execute([$value, ++$key]);
}
foreach ($_POST as $key => $value) {
    $first5letters = substr($key, 0, 5);
    if ($first5letters == "page-") {
        $pdo->prepare("UPDATE pages SET title = ? WHERE id = ?")->execute([$value, substr($key, 5)]);
    } else if ($first5letters == "color") {
        $pdo->prepare("UPDATE colors SET hex = ? WHERE id = ?")->execute([substr($value, 1), substr($key, 6)]);
    }
}
header("Location: admin");

?>