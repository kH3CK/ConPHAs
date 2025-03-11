<?php

require_once("../template/components/head.php");
require_once("../src/imports/getTextFromDatabase.php");

$editingPage = true;

?>
<h1 class="text-primary-color"><?=getTextFromDatabase($pdo, 1)?></h1>