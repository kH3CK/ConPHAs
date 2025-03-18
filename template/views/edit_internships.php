<?php

// require_once("../src/imports/checkIfLoggedIn.php");
require_once("../src/imports/connectToDatabase.php");
require_once("../template/components/head.php");

?>
<form action="edit_internships_apply" class="flex flex-row">
    <div class="basis-1/2 border-r border-r-primary-color">
        <?php

        foreach ($pdo->query("SELECT * FROM internships") as $internship) {
            $id = $internship["id"];?>
        <div class="border border-primary-color m-5">
            <h2><?=returnInputIfEditingPage($internship["title"], "title-" . $id)?></h2>
        </div>
        <?php }

        ?>
    </div>
    <div class="basis-1/2">
        <div class="border-b border-b-primary-color">
            <div class="bg-secondary-background m-5 border border-primary-color rounded">
                <h2>Filter</h2>
            </div>
        </div>
        <div>
            <div class="bg-primary-background m-5 border border-primary-color rounded">
                <h2>test</h2>
            </div>
            <button class="border border-primary-color bg-primary-color p-2 text-primary-background ml-5">Opslaan</button>
            <button class="border border-primary-color bg-danger p-2 text-primary-background" id="wijzigingen-annuleren">Wijzigingen annuleren</button>
        </div>
    </div>
</form>
<script src="js/abandonChanges.js"></script>