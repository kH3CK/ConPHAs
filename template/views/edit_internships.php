<?php

// require_once("../src/imports/checkIfLoggedIn.php");
require_once("../src/imports/connectToDatabase.php");
require_once("../template/components/head.php");

?>
<form action="edit_internships_apply" method="post" class="flex flex-row">
    <div class="basis-1/2 border-r border-r-primary-color">
        <?php

        foreach ($pdo->query("SELECT * FROM internships") as $internship) {
            $id = $internship["id"];?>
        <div class="border border-primary-color m-6 relative">
            <a href="/remove_internship?id=<?=$id?>" class="absolute w-10 h-10 bg-danger border border-primary-color -top-5 -right-5 flex justify-center items-center text-center">
                <p class="text-primary-background text-xl">X</p>
            </a>
            <div class="inline-block">
                <img src="<?=$internship["image_link"]?>" alt="Afbeelding">
                <div class="m-2">
                    <label for="image_link-<?=$id?>" class="block mb-1">Start Datum</label>
                    <input id="image_link-<?=$id?>" type="text" name="image_link-<?=$id?>" value="<?=$internship["image_link"]?>" class="border border-primary-color" placeholder="https://picsum.photos/200/200">
                </div>
            </div>
            <div class="inline-block align-top">
                <input name="title-<?=$id?>" value="<?=$internship["title"]?>" class="border border-primary-color mb-5 mt-2" placeholder="Stageplek Naam">
                <div>
                    <img src="images/stopwatch.svg" alt="🕑" class="inline">
                    <div class="inline-block">
                        <label for="start_date_and_time-<?=$id?>" class="block border-r mb-1 pr-1">Start Datum</label>
                        <input id="start_date_and_time-<?=$id?>" type="text" name="start_date_and_time-<?=$id?>" value="<?=$internship["start_date_and_time"]?>" class="border border-primary-color" placeholder="YY-MM-DD HH:MM:SS">
                    </div>
                    <div class="inline-block">
                        <label for="weeks-<?=$id?>" class="block border-r mb-1 pr-1">Aantal Weken</label>
                        <input id="weeks-<?=$id?>" type="text" name="weeks-<?=$id?>" value="<?=$internship["weeks"]?>" class="border border-primary-color w-10" placeholder="15">
                    </div>
                    <div class="inline-block">
                        <label for="hours-<?=$id?>" class="block mb-1">Aantal Uren</label>
                        <input id="hours-<?=$id?>" type="text" name="hours-<?=$id?>" value="<?=$internship["hours"]?>" class="border border-primary-color w-14" placeholder="100">
                    </div>
                </div>
                <div>
                    <img src="images/stopwatch.svg" alt="🕑" class="inline">
                    <div class="inline-block">
                        <label for="location-<?=$id?>" class="block mb-1">Locatie</label>
                        <input id="location-<?=$id?>" type="text" name="location-<?=$id?>" value="<?=$internship["location"]?>" class="border border-primary-color w-116" placeholder="2345AB, Groningen, Muntinglaan 1">
                    </div>
                </div>
                <div>
                    <img src="images/stopwatch.svg" alt="🕑" class="inline">
                    <div class="inline-block">
                        <label for="minimum_level-<?=$id?>" class="block mb-1">Minimum Nodig Niveau</label>
                        <input id="minimum_level-<?=$id?>" type="text" name="minimum_level-<?=$id?>" value="<?=$internship["minimum_level"]?>" class="border border-primary-color w-16" placeholder="MBO 1">
                    </div>
                </div>
                <div>
                    <img src="images/stopwatch.svg" alt="🕑" class="inline">
                    <div class="inline-block">
                        <label for="type-<?=$id?>" class="block mb-1">Type Stage</label>
                        <input id="type-<?=$id?>" type="text" name="type-<?=$id?>" value="<?=$internship["type"]?>" class="border border-primary-color w-36" placeholder="Afstudeerstage">
                    </div>
                </div>
                <div class="mb-2">
                    <img src="images/stopwatch.svg" alt="🕑" class="inline">
                    <div class="inline-block">
                        <label for="compensation-<?=$id?>" class="block mb-1">Stagevergoeding</label>
                        <input id="compensation-<?=$id?>" type="text" name="compensation-<?=$id?>" value="<?=$internship["compensation"]?>" class="border border-primary-color w-16" placeholder="0">
                        <select id="compensation_frequency-<?=$id?>" name="compensation_frequency-<?=$id?>" value="<?=$internship["compensation_frequency"]?>" class="border border-primary-color w-40">
                            <option value="">not applicable</option>
                            <option value="hourly">hourly</option>
                            <option value="daily">daily</option>
                            <option value="weekly">weekly</option>
                            <option value="monthly">monthly</option>
                            <option value="yearly">yearly</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <?php }

        ?>
    </div>
    <div class="basis-1/2">
        <div class="border-b border-b-primary-color">
            <div class="bg-secondary-background m-5 border border-primary-color rounded">
                <h2 class="m-2">Filters</h2>
            </div>
        </div>
        <div class="border border-primary-color m-6 relative">
            <div class="inline-block">
                <img src="https://picsum.photos/200/200" alt="Afbeelding">
                <div class="m-2">
                    <label for="image_link-new" class="block mb-1">Start Datum</label>
                    <input id="image_link-new" type="text" name="image_link-new" class="border border-primary-color" placeholder="https://picsum.photos/200/200">
                </div>
            </div>
            <div class="inline-block align-top">
                <input name="title-new" value="<?=$internship["title"]?>" class="border border-primary-color mb-5 mt-2" placeholder="Stageplek Naam">
                <div>
                    <img src="images/stopwatch.svg" alt="🕑" class="inline">
                    <div class="inline-block">
                        <label for="start_date_and_time-new" class="block border-r mb-1 pr-1">Start Datum</label>
                        <input id="start_date_and_time-new" type="text" name="start_date_and_time-new" class="border border-primary-color" placeholder="YY-MM-DD HH:MM:SS">
                    </div>
                    <div class="inline-block">
                        <label for="weeks-new" class="block border-r mb-1 pr-1">Aantal Weken</label>
                        <input id="weeks-new" type="text" name="weeks-new" class="border border-primary-color w-10" placeholder="15">
                    </div>
                    <div class="inline-block">
                        <label for="hours-new" class="block mb-1">Aantal Uren</label>
                        <input id="hours-new" type="text" name="hours-new" class="border border-primary-color w-14" placeholder="100">
                    </div>
                </div>
                <div>
                    <img src="images/stopwatch.svg" alt="🕑" class="inline">
                    <div class="inline-block">
                        <label for="location-new" class="block mb-1">Locatie</label>
                        <input id="location-new" type="text" name="location-new" class="border border-primary-color w-116" placeholder="2345AB, Groningen, Muntinglaan 1">
                    </div>
                </div>
                <div>
                    <img src="images/stopwatch.svg" alt="🕑" class="inline">
                    <div class="inline-block">
                        <label for="minimum_level-new" class="block mb-1">Minimum Nodig Niveau</label>
                        <input id="minimum_level-new" type="text" name="minimum_level-new" class="border border-primary-color w-16" placeholder="MBO 1">
                    </div>
                </div>
                <div>
                    <img src="images/stopwatch.svg" alt="🕑" class="inline">
                    <div class="inline-block">
                        <label for="type-new" class="block mb-1">Type Stage</label>
                        <input id="type-new" type="text" name="type-new" class="border border-primary-color w-36" placeholder="Afstudeerstage">
                    </div>
                </div>
                <div class="mb-2">
                    <img src="images/stopwatch.svg" alt="🕑" class="inline">
                    <div class="inline-block">
                        <label for="compensation-new" class="block mb-1">Stagevergoeding</label>
                        <input id="compensation-new" type="text" name="compensation-new" class="border border-primary-color w-16" placeholder="0">
                        <select id="compensation_frequency-new" name="compensation_frequency-new" class="border border-primary-color w-40">
                            <option value="">not applicable</option>
                            <option value="hourly">hourly</option>
                            <option value="daily">daily</option>
                            <option value="weekly">weekly</option>
                            <option value="monthly">monthly</option>
                            <option value="yearly">yearly</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button class="border border-primary-color bg-primary-color p-2 text-primary-background ml-5">Opslaan</button>
            <button class="border border-primary-color bg-danger p-2 text-primary-background" id="wijzigingen-annuleren">Wijzigingen annuleren</button>
        </div>
    </div>
</form>
<div class="sticky bottom-2 left-2 text-start m-2">
    <a href="/admin"><img src="images/arrow-left.png" alt="<-" class="inline w-1/12 h-1/12"> terug</a>
</div>
<script src="js/abandonChanges.js"></script>