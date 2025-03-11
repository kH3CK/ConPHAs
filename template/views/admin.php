<?php

// require_once("../src/imports/checkIfLoggedIn.php");
require_once("../template/components/head.php");
require_once("../src/imports/getTextFromDatabase.php");

$logo = getTextFromDatabase($pdo, 2);

?>
<form action="admin_apply" method="post">
    <div class="flex flex-row">
        <div class="basis-1/2 border-r border-r-primary-color border-b border-b-primary-color">
            <div class="flex flex-row items-center mt-5">
                <div class="basis-1/2">
                    <div class="flex items-center justify-center mb-5">
                        <img id="logo-img" src="<?=$logo?>" alt="Logo" class="border border-primary-color">
                    </div>
                    <div class="flex items-center justify-center">
                        <input name="logo" id="logo-input" type="text" value="<?=$logo?>" class="border border-primary-color w-xs">
                    </div>
                </div>
                <div class="basis-1/2 flex items-center justify-center">
                    <p>Logo veranderen</p>
                </div>
            </div>
            <div class="flex flex-row items-center my-5">
                <div class="basis-1/2 flex items-center justify-center my-5">
                    <input name="title" type="text" value="<?=getTextFromDatabase($pdo, 1)?>" class="border border-primary-color w-xs">
                </div>
                <div class="basis-1/2 flex items-center justify-center">
                    <p>Titel veranderen</p>
                </div>
            </div>
        </div>
        <div class="basis-1/2 border-b border-b-primary-color text-center">
            <div class="m-1">
                <div class="text-end">
                    <button class="bg-primary-color border border-primary-color p-2 text-primary-background">Save</button>
                    <button class="bg-red-500 border border-primary-color p-2 text-primary-background">Abandon changes</button>
                </div>
                <p class="mb-1">Font Link</p>
                <input name="font-link" type="text" value="<?=getTextFromDatabase($pdo, 3)?>" class="border border-primary-color w-xs mb-5">
                <p class="mb-1">Font Code</p>
                <input name="font-name" type="text" value='<?=getTextFromDatabase($pdo, 4)?>' class="border border-primary-color w-3xs mb-5">
                <p class="mb-1">Hoe vul jij dat in?</p>
                <ol class="list-decimal text-start ml-10">
                    <li>Ga naar <a class="text-primary-color" href="https://fonts.google.com">https://fonts.google.com</a></li>
                    <li>Selecteer een font</li>
                    <li>Klik op "Get font"</li>
                    <li>Klik op "Get embed code"</li>
                    <li>Copier de link die begint met<br>
                        <strong>https://fonts.googleapis.com/css2?family</strong> (link)</li>
                    <li>Dan copier de ding tussen <strong>font-family: </strong> en <strong>;</strong> op dezelfde regel (code)</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="flex flex-row">
        <div class="basis-1/2 border-r border-r-primary-color border-b border-b-primary-color text-center">
            <p>Verander paginas</p>
        </div>
        <div class="basis-1/2 border-b border-b-primary-color text-center">
            <div class="m-1">
                <div class="text-end">
                    <button class="bg-primary-color border border-primary-color p-2 text-primary-background">Save</button>
                    <button class="bg-red-500 border border-primary-color p-2 text-primary-background">Abandon changes</button>
                </div>
                <p class="mb-1">Font Link</p>
                <input name="font-link" type="text" value="<?=getTextFromDatabase($pdo, 3)?>" class="border border-primary-color w-xs mb-5">
                <p class="mb-1">Font Code</p>
                <input name="font-name" type="text" value='<?=getTextFromDatabase($pdo, 4)?>' class="border border-primary-color w-3xs mb-5">
                <p class="mb-1">Hoe vul jij dat in?</p>
                <ol class="list-decimal text-start ml-10">
                    <li>Ga naar <a class="text-primary-color" href="https://fonts.google.com">https://fonts.google.com</a></li>
                    <li>Selecteer een font</li>
                    <li>Klik op "Get font"</li>
                    <li>Klik op "Get embed code"</li>
                    <li>Copier de link die begint met<br>
                        <strong>https://fonts.googleapis.com/css2?family</strong> (link)</li>
                    <li>Dan copier de ding tussen <strong>font-family: </strong> en <strong>;</strong> op dezelfde regel (code)</li>
                </ol>
            </div>
        </div>
    </div>
</form>
<script src="js/previewLogo.js"></script>