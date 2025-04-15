
<?php

function makeInternship($internship) {?>
<!-- slechte HTML maar niet ik heb het geschreven en wij hebben niet veel tijd meer dus ik ga het niet aanraken behalve
database data inserten en typos corrigeren -->
<div class="flex items-center bg-green-50 p-4 rounded-lg shadow-md relative">
    <img src="<?=$internship["image_link"]?>" alt="Stage" class="w-20 h-20 rounded-md object-cover">
    <div class="ml-4">
        <h3 class="font-bold"><?=$internship["title"]?></h3>
        <div class="flex flex-col text-sm">
            <div class="flex flex-row gap-4">
                <div class="flex flex-col">
                    <span>📅 Start Datum = <?=$internship["start_date_and_time"]?> | </span>
                </div>
                <div class="flex flex-col">
                    <span>Aantal Weken = <?=$internship["weeks"]?> |</span>
                </div>
                <div class="flex flex-col">
                    <span>Aantal Uren = <?=$internship["hours"]?></span>
                </div>
            </div>
        </div>
        <div class="flex flex-col text-sm">
            <div class="flex flex-row gap-4">
                <div class="flex flex-col">
                    <span>📍 Locatie = <?=$internship["location"]?></span>
                </div>
            </div>
        </div>
        <div class="flex flex-col text-sm">
            <div class="flex flex-row gap-4">
                <div class="flex flex-col">
                    <span>✅ Minimum Niveau = <?=$internship["minimum_level"]?></span>
                </div>
            </div>
        </div>
        <div class="flex flex-col text-sm">
            <div class="flex flex-row gap-4">
                <div class="flex flex-col">
                    <span>🎓Type Stage = <?=$internship["type"]?></span>
                </div>
            </div>
        </div>
        <a href="/stage_details?id=<?=$internship["id"]?>" class="absolute right-4 bottom-2">
            <button class="bg-primary-color text-primary-background rounded p-1 m-1 cursor-pointer">Bekijk Stage</button>
        </a>
    </div>
</div>

<?php }

?>