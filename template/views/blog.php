<?php

require_once("../template/components/navbar.php");
require_once("../template/components/head.php");

?>

<body class="bg-gray-50 min-h-screen flex flex-col">
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

                    <article class="bg-white shadow-md rounded-lg overflow-hidden mb-10">
                        <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Duurzame innovaties" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <div class="flex items-center text-sm text-gray-500 mb-2">
                                <span>15 maart 2023</span>
                                <span class="mx-2">•</span>
                                <span>Door: Emma Jansen</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Innovatieve oplossingen voor een duurzamere toekomst</h3>
                            <p class="text-gray-600 mb-4">
                                In deze blog bespreken we de nieuwste innovaties op het gebied van duurzaamheid en hoe deze bijdragen aan een groenere toekomst. We onderzoeken verschillende technologieën die een positieve impact hebben op het milieu.
                            </p>
                            <a href="#" class="inline-flex items-center text-conphas-green hover:text-green-700">
                                Lees meer
                                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </article>

                    <article class="bg-white shadow-md rounded-lg overflow-hidden mb-10">
                        <img src="https://images.unsplash.com/photo-1507668077129-56e32842fceb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Groene chemie" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <div class="flex items-center text-sm text-gray-500 mb-2">
                                <span>28 februari 2023</span>
                                <span class="mx-2">•</span>
                                <span>Door: Thomas de Vries</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">De rol van groene chemie in een circulaire economie</h3>
                            <p class="text-gray-600 mb-4">
                                Groene chemie speelt een cruciale rol in de transitie naar een circulaire economie. In dit artikel bespreken we hoe duurzame chemische processen bijdragen aan het verminderen van afval en het hergebruik van grondstoffen.
                            </p>
                            <a href="#" class="inline-flex items-center text-conphas-green hover:text-green-700">
                                Lees meer
                                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </article>

                    <article class="bg-white shadow-md rounded-lg overflow-hidden mb-10">
                        <img src="https://media1.thrillophilia.com/filestore/uwpz857lua13qmvub6um2v93dlrm_IMG%20Worlds%20%20of%20Adventure.jpg" alt="Duurzame landbouw" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <div class="flex items-center text-sm text-gray-500 mb-2">
                                <span>10 februari 2023</span>
                                <span class="mx-2">•</span>
                                <span>Door: Sophie Bakker</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Duurzame landbouwmethoden voor een gezondere planeet</h3>
                            <p class="text-gray-600 mb-4">
                                Duurzame landbouw is essentieel voor het behoud van onze ecosystemen. In deze blog verkennen we innovatieve landbouwmethoden die de impact op het milieu verminderen en tegelijkertijd de voedselproductie verbeteren.
                            </p>
                            <a href="#" class="inline-flex items-center text-conphas-green hover:text-green-700">
                                Lees meer
                                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </article>

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
</body>