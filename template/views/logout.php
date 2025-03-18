<?php

if (isset($_SESSION["username"])) {
    unset($_SESSION["username"]);
    unset($_SESSION["password"]);
}
header("Location: login");

?>