<?php

require_once("../template/components/navbar.php");
require_once("../template/components/head.php");
require_once("../src/imports/connectToDatabase.php");

$months = [
    null, // geen "0" maand
    "januari",
    "februari",
    "maart",
    "april",
    "mei",
    "juni",
    "juli",
    "augustus",
    "september",
    "oktober",
    "november",
    "december"
]

?>
<div class="bg-gray-50 min-h-screen flex flex-col">
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/ConPHAs-zenBc0eVBbFXSyYT7CoHnoI9PT9rK5.png" alt="ConPHAs Logo" class="h-12">
                </div>

                <?= getTextFromDatabase(1) ?>

    </header>

    <main class="flex-grow">
        <div class="bg-conphas-light py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-4xl font-bold text-gray-900 text-center">ConPHAs Blog</h1>
                <p class="mt-4 text-xl text-gray-600 text-center max-w-3xl mx-auto">
                    Ontdek de nieuwste ontwikkelingen en inzichten op het gebied van duurzaamheid en innovatie.
                </p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                <div class="lg:col-span-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8">Recente artikelen</h2>
                    <?php
                    
                    foreach ($pdo->query("SELECT * FROM blogs") as $blog) {
                        $dateandtime = $blog["publication_date"];
                        $splitdateandtime = explode(" ", $dateandtime);
                        $splittime = explode(":", $splitdateandtime[1]);
                        $splitdate = explode("-", $splitdateandtime[0]);
                        $currenttime = time();
                        $year = $splitdate[0];
                        $datestring = date("y-m-d", $currenttime) == substr($splitdateandtime[0], 2) ?
                        "Vandaag, " . $splittime[0] . ":" . $splittime[1] :
                        $splitdate[2] . " " . $months[(int)$splitdate[1]] .
                        (date("y", $currenttime) == substr($year, 2) ?
                        "" :
                        " $year");?>
                    <article class="bg-white shadow-md rounded-lg overflow-hidden mb-10">
                        <img src="<?=$blog["image_link"]?>" alt="Afbeelding" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <div class="flex items-center text-sm text-gray-500 mb-2">
                                <span><?=$datestring?></span>
                                <span class="mx-2">•</span>
                                <span>Door: <?=$blog["author"]?></span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2"><?=$blog["title"]?></h3>
                            <p class="text-gray-600 mb-4">
                                <?=$blog["preview_text"]?>
                            </p>
                            <a href="/blog_details?id=<?=$blog["id"]?>" class="inline-flex items-center text-conphas-green hover:text-green-700">
                                Lees meer
                                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                    <?php }

                    ?>

                    <div class="flex justify-center mt-12">
                        <nav class="inline-flex rounded-md shadow">
                            <a href="#" class="py-2 px-4 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 rounded-l-md border border-gray-300">
                                Vorige
                            </a>
                            <a href="#" class="py-2 px-4 bg-conphas-green text-sm font-medium text-white hover:bg-green-700 border border-conphas-green">
                                1
                            </a>
                            <a href="#" class="py-2 px-4 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 border border-gray-300">
                                2
                            </a>
                            <a href="#" class="py-2 px-4 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 border border-gray-300">
                                3
                            </a>
                            <a href="#" class="py-2 px-4 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 rounded-r-md border border-gray-300">
                                Volgende
                            </a>
                        </nav>
                    </div>
                </div>

                <div class="mt-12 lg:mt-0 lg:col-span-4">
                    <div class="bg-white shadow-md rounded-lg p-6 mb-8">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Categorieën</h3>
                        <ul class="space-y-3">
                            <li>
                                <a href="#" class="text-conphas-green hover:text-green-700">Duurzaamheid (8)</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-600 hover:text-conphas-green">Innovatie (12)</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-600 hover:text-conphas-green">Groene chemie (5)</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-600 hover:text-conphas-green">Circulaire economie (7)</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-600 hover:text-conphas-green">Onderzoek (4)</a>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white shadow-md rounded-lg p-6 mb-8">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Nieuwsbrief</h3>
                        <p class="text-gray-600 mb-4">
                            Blijf op de hoogte van onze nieuwste blogs en ontwikkelingen.
                        </p>
                        <form>
                            <div class="mb-3">
                                <input
                                    type="email"
                                    placeholder="E-mailadres"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-conphas-green focus:border-transparent"
                                    required>
                            </div>
                            <button
                                type="submit"
                                class="w-full bg-conphas-green text-white py-2 px-4 rounded-md bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors">
                                Inschrijven
                            </button>
                        </form>
                    </div>

                    <div class="bg-conphas-light rounded-lg p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Over ConPHAs</h3>
                        <p class="text-gray-600 mb-4">
                            ConPHAs is toegewijd aan het ontwikkelen van duurzame oplossingen voor een groenere toekomst. Samen bouwen we aan een duurzamere toekomst!
                        </p>
                        <a href="over_ons" class="inline-flex items-center text-conphas-green hover:text-green-700">
                            Meer over ons
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>