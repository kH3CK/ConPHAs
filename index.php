<?php

session_start();

$uri = strtok($_SERVER["REQUEST_URI"], "?"); // strtok for removing the query string (thing starting with ?, e.g. ?id=4)
$path = "resources/views";
$fileext = ".php";
if ($uri == "" || $uri == "/") {
    require_once $path."/index".$fileext;
} else {
    $pagepath = $path.$uri.$fileext;
    require_once file_exists($pagepath) ? $pagepath : $path."/404".$fileext;
}
    
?>