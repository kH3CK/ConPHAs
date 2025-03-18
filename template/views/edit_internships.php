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
            <img src="<?=$internship["image_link"]?>" alt="Afbeelding" class="inline">
            <div class="inline-block align-top">
                <input name="title" value="<?=$internship["title"]?>" class="border border-primary-color mb-5 inline-block">
                <img src="images/stopwatch.svg" alt="🕑" class="inline">
                <div class="inline-block">
                    <label for="start-date-and-time-<?=$id?>">Start Datum</label>
                    <input id="start-date-and-time-<?=$id?>" type="text" name="start-date-and-time-<?=$id?>" value="<?=$internship["start_date_and_time"]?>">
                </div>
            </div>
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
<div class="sticky bottom-2 left-2 text-start m-2">
    <a href="/admin"><img src="images/arrow-left.png" alt="<-" class="inline w-1/12 h-1/12"> terug</a>
</div>
<script src="js/abandonChanges.js"></script>