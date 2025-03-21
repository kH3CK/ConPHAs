<?php

require_once("../template/components/head.php");
require_once("../template/components/navbar.php");

?>

<div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-6 p-6">
        <div class="w-full md:w-1/4 bg-green-100 p-4 rounded-lg">
            <h2 class="font-bold">Filters</h2>
            <input type="text" placeholder="Trefwoord" class="w-full p-2 mt-2 border rounded">
            <select class="w-full p-2 mt-2 border rounded">
                <option>beroepsgroep</option>
            </select>
            <select class="w-full p-2 mt-2 border rounded">
                <option>opleidings niveau</option>
            </select>
            <select class="w-full p-2 mt-2 border rounded">
                <option>locatie</option>
            </select>
            <h2>stage soort</h2>



            <select class="w-full p-2 mt-2 border rounded">
                <option>Start maand</option>
            </select>
        </div>
        <div class="w-full md:w-3/4">
            <div class="space-y-4">
                <div class="flex items-center bg-green-50 p-4 rounded-lg shadow-md" repeat="10">
                    <img src="images/onderzoek.png" alt="Stage" class="w-20 h-20 rounded-md object-cover">
                    <div class="ml-4">
                        <h3 class="font-bold">[stagePlekNaam]</h3>
                        <p class="text-sm">📅 [startDatum] [aantalWeken] | [urenT/Week]</p>
                        <p class="text-sm">📍 [provincie] | [stad]</p>
                        <p class="text-sm">✅ [minimumNodigNiveau]</p>
                        <p class="text-sm">🎓 [typeStage]</p>
                    </div>
                </div>
            </div>
        </div>
    </div>







