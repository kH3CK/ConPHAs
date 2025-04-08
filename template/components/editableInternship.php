<?php

function makeEditableInternship($internship = []) {
    $id = $internship["id"] ?? "new";?>
<div class="inline-block">
    <img src="<?=$internship["image_link"] ?? "https://picsum.photos/200/200"?>" alt="Afbeelding">
    <div class="m-2">
        <label for="image_link-<?=$id?>" class="block mb-1">Afbeelding URL</label>
        <input id="image_link-<?=$id?>" type="text" name="image_link-<?=$id?>" value="<?=@$internship["image_link"]?>" class="border border-primary-color w-48" placeholder="https://picsum.photos/200/200">
    </div>
</div>
 <div class="inline-block align-top">
    <input name="title-<?=$id?>" value="<?=@$internship["title"]?>" class="border border-primary-color mb-5 mt-2<?=$id == "new" ? " w-52" : ""?>" placeholder="<?=$id == "new" ? "Nieuwe " : ""?>Stageplek Naam">
    <div>
        <img src="images/stopwatch.svg" alt="🕑" class="inline">
        <div class="inline-block">
            <label for="start_date_and_time-<?=$id?>" class="block border-r mb-1 pr-1">Start Datum</label>
            <input id="start_date_and_time-<?=$id?>" type="text" name="start_date_and_time-<?=$id?>" value="<?=@$internship["start_date_and_time"]?>" class="border border-primary-color" placeholder="YYYY-MM-DD HH:MM:SS">
        </div>
        <div class="inline-block">
            <label for="weeks-<?=$id?>" class="block border-r mb-1 pr-1">Aantal Weken</label>
            <input id="weeks-<?=$id?>" type="text" name="weeks-<?=$id?>" value="<?=@$internship["weeks"]?>" class="border border-primary-color w-10" placeholder="15">
        </div>
        <div class="inline-block">
            <label for="hours-<?=$id?>" class="block mb-1">Aantal Uren</label>
            <input id="hours-<?=$id?>" type="text" name="hours-<?=$id?>" value="<?=@$internship["hours"]?>" class="border border-primary-color w-14" placeholder="100">
        </div>
    </div>
    <div>
        <img src="images/stopwatch.svg" alt="🕑" class="inline">
        <div class="inline-block">
            <label for="location-<?=$id?>" class="block mb-1">Locatie</label>
            <input id="location-<?=$id?>" type="text" name="location-<?=$id?>" value="<?=@$internship["location"]?>" class="border border-primary-color w-114" placeholder="2345AB, Groningen, Muntinglaan 1">
        </div>
    </div>
    <div>
        <img src="images/stopwatch.svg" alt="🕑" class="inline">
        <div class="inline-block">
            <label for="minimum_level-<?=$id?>" class="block mb-1">Minimum Nodig Niveau</label>
            <input id="minimum_level-<?=$id?>" type="text" name="minimum_level-<?=$id?>" value="<?=@$internship["minimum_level"]?>" class="border border-primary-color w-16" placeholder="MBO 1">
        </div>
    </div>
    <div>
        <img src="images/stopwatch.svg" alt="🕑" class="inline">
        <div class="inline-block">
            <label for="type-<?=$id?>" class="block mb-1">Type Stage</label>
            <input id="type-<?=$id?>" type="text" name="type-<?=$id?>" value="<?=@$internship["type"]?>" class="border border-primary-color w-36" placeholder="Afstudeerstage">
        </div>
    </div>
    <div class="mb-2">
        <img src="images/stopwatch.svg" alt="🕑" class="inline">
        <div class="inline-block">
            <label for="compensation-<?=$id?>" class="block mb-1">Stagevergoeding</label>
            <input id="compensation-<?=$id?>" type="text" name="compensation-<?=$id?>" value="<?=@$internship["compensation"]?>" class="border border-primary-color w-16" placeholder="0"> per maand
        </div>
    </div>
    <div class="mb-2">
        <img src="images/stopwatch.svg" alt="🕑" class="inline">
        <div class="inline-block">
            <label for="description-<?=$id?>" class="block mb-1">Beschrijving</label>
            <textarea id="description-<?=$id?>" type="text" name="description-<?=$id?>" value="<?=@$internship["description"]?>" class="border border-primary-color w-114" placeholder="Lorem ipsum"></textarea>
        </div>
    </div>
</div>
<?php }

?>