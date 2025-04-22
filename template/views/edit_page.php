<?php

require_once("../src/imports/checkIfLoggedIn.php");
require_once("../template/components/head.php");

?>
<div class="w-full p-5 text-center bg-secondary-background">
    <h1>Editing page</h1>
</div>
<form action="/edit_page_apply" method="post">
    <?php

    $editingPage = true;
    require_once("../template/views/" . ($_GET["path"] == "" ? "index" : $_GET["path"]) . ".php");

    ?>
    <div class="w-full p-5 text-center bg-secondary-background">
        <input type="text" name="path" class="hidden" value="<?= $_GET["path"] ?>">
        <button class="border border-primary-color bg-primary-color p-2 text-primary-background">Opslaan</button>
        <button class="border border-primary-color bg-danger p-2 text-primary-background" id="wijzigingen-annuleren">Wijzigingen annuleren</button>
        <p>Hoe bekijk jij hoe dit op mobiel er uit ziet?</p>
        <div class="flex justify-center">
            <ul class="text-start">
                <li>1. Druk op Ctrl + Shift + I</li>
                <li>2. Klik op <img src="images/mobile-preview-button.png" class="inline"></li>
            </ul>
        </div>
        <?php require_once("../template/components/backButton.php"); ?>
    </div>
</form>
<script src="js/abandonChanges.js"></script>