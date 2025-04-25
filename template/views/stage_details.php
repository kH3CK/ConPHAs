<?php

require_once("../template/components/head.php");
require_once("../template/components/navbar.php");
$statement = $pdo->prepare("SELECT * FROM internships WHERE id = :id");
$statement->execute($_GET);
$internship = $statement->fetch();

?>
<div class="container mx-auto p-4 mt-32">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
        <div class="flex justify-center md:justify-end">
            <img src="images/onderzoek.png" alt="" class="md:w-[550px] h-auto">
        </div>
        <div class="p-4">
            <h1 class="text-xl font-bold"><?= $internship["title"] ?></h1>
            <p class="text-sm mb-[-10px]">

            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary-color">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <div class="flex flex-col mt-6">
                    <span>Start Datum |</span>
                    <span><?= str_replace(" ", "<br>", $internship["start_date_and_time"]) ?></span>
                </div>
                <div class="flex flex-col">
                    <span>Aantal Weken |</span>
                    <span><?= $internship["weeks"] ?></span>
                </div>
                <div class="flex flex-col">
                    <span>Aantal Uren</span>
                    <span><?= $internship["hours"] ?></span>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary-color">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
                <div class="flex flex-col">
                    <span>Locatie</span>
                    <span><?= $internship["location"] ?></span>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary-color">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                </svg>
                <div class="flex flex-col">
                    <span>Minium Niveau</span>
                    <span><?= $internship["minimum_level"] ?></span>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary-color">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                </svg>
                <div class="flex flex-col">
                    <span>Type Stage</span>
                    <span><?= $internship["type"] ?></span>
                </div>
            </div>
            <div class="mt-4 p-4 bg-green-100 rounded-lg max-w-sm">
                <div class="text-sm text-green-900">
                    <?= $internship["description"] ?>
                </div>
                <div class="mt-4">
                    <h2 class="font-bold">Contact gegevens stage bedrijf</h2>
                    <p>&#x1F4DE; 06 12345678</p>
                    <p>&#x2709; info@aanPHA.nl</p>
                    <p>&#x1F3E0; [plaatsnaam], [postcode]</p>
                    <p>&#x1F4CD; [straatnaam] [nummer]</p>
                </div>
                <button class="mt-4 p-4 bg-green-500 text-black rounded">
                    Aanmelden
                </button>
            </div>
    </div>
</div>  
</div>