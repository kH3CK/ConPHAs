<?php

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
];

function makeBlog(array $blog, $previewText = true) {
    $dateandtime = $blog["publication_date"];
    $splitdateandtime = explode(" ", $dateandtime);
    $splittime = explode(":", $splitdateandtime[1]);
    $splitdate = explode("-", $splitdateandtime[0]);
    $currenttime = time();
    $year = $splitdate[0];
    $datestring = date("y-m-d", $currenttime) == substr($splitdateandtime[0], 2) ?
    "Vandaag, " . $splittime[0] . ":" . $splittime[1] :
    $splitdate[2] . " " . $GLOBALS["months"][(int)$splitdate[1]] .
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
            <?=$blog[($previewText ? "preview_": "") . "text"]?>
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