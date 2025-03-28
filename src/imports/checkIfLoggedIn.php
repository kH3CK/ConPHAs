<?php

$isloginpage = $_SERVER["REQUEST_URI"] == "/login";

$usepost = $isloginpage && array_key_exists("username", $_POST);

if ($isloginpage) {
    $error = false;
}

$stop = false;

if (array_key_exists("username", $_SESSION) || $usepost) {
    require_once("connectToDatabase.php");
    
    $query = $pdo->prepare("SELECT password FROM admins WHERE username = ?");
    $username = $usepost ? $_POST["username"] : $_SESSION["username"];
    $password = $usepost ? $_POST["password"] : $_SESSION["password"];
    $query->execute([$username]);
    $accountfromdb = $query->fetch();
    $stop = true;
    if ($accountfromdb && password_verify($password, $accountfromdb["password"])) {
        if ($usepost) {
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
        }
        if ($isloginpage) {
            header("Location: admin");
        }
    } elseif ($isloginpage) {
        $error = true;
    } else {
        $stop = false;
    }
}

if (!($isloginpage || $stop)) {
    header("Location: login");
    exit;
}

?>