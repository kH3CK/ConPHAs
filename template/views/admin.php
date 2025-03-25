<?php

// require_once("../src/imports/checkIfLoggedIn.php");
require_once("../template/components/head.php");
require_once("../src/imports/getTextFromDatabase.php");

$logo = getTextFromDatabase(2);

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
                    <input name="title" type="text" value="<?=getTextFromDatabase(1)?>" class="border border-primary-color w-xs">
                </div>
                <div class="basis-1/2 flex items-center justify-center">
                    <p>Titel bewerken</p>
                </div>
            </div>
        </div>
        <div class="basis-1/2 border-b border-b-primary-color text-center">
            <div class="m-1">
                <div class="text-end">
                    <button class="bg-primary-color border border-primary-color p-2 text-primary-background">Opslaan</button>
                    <button class="bg-danger border border-primary-color p-2 text-primary-background" id="wijzigingen-annuleren">Wijzigingen annuleren</button>
                </div>
                <div class="text-start">
                    <div class="flex justify-between">
                        <div>
                            <p class="mb-1">Font Link</p>
                            <input name="font-link" type="text" value="<?=getTextFromDatabase(3)?>" class="border border-primary-color w-xs mb-5">
                        </div>
                        <div>
                            <div class="mt-4">
                                <a href="/edit_internships" class="btn bg-primary-color border border-primary-color p-2 text-primary-background">Stageplekken bewerken</a>
                            </div>
                        </div>
                    </div>
                    <p class="mb-1">Font Code</p>
                    <input name="font-code" type="text" value='<?=getTextFromDatabase(4)?>' class="border border-primary-color w-3xs mb-5">
                    <p class="mb-1">Hoe vul jij dat in?</p>
                    <ol class="list-decimal ml-10">
                        <li>Ga naar <a class="text-primary-color" href="https://fonts.google.com">https://fonts.google.com</a></li>
                        <li>Selecteer een font</li>
                        <li>Klik op "Get font"</li>
                        <li>Klik op "Get embed code"</li>
                        <li>Copier de link die begint met<br>
                            <strong>https://fonts.googleapis.com/css2?family</strong> (link)</li>
                        <li>Dan copier het ding tussen <strong>font-family: </strong> en <strong>;</strong> op dezelfde regel (code)</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-row">
        <div class="basis-1/2 border-r border-r-primary-color border-b border-b-primary-color text-center">
            <p>Pagina's bewerken</p>
            <div class="grid grid-cols-3">
            <?php

            foreach ($pdo->query("SELECT * FROM pages") as $page) {
                $filename = $page["filename"];?>
                <div class="border border-black m-4.5 p-2">
                    <p><?=$page["name"]?></p>
                    <p>Path: /<?=$filename?></p>
                    <input type="text" name="page-<?=$page["id"]?>" value="<?=$page["title"]?>" class="border border-primary-color">
                    <a href="/edit_page?path=<?=$filename?>" class="text-primary-color block">Bewerken</a>
                </div>
            <?php }

            ?>
            </div>
            <div class="sticky bottom-2 left-2 text-start m-2">
                <a href="/logout"><img src="images/arrow-left.png" alt="<-" class="inline w-1/12 h-1/12"> uitloggen</a>
            </div>
        </div>
        <div class="basis-1/2 border-b border-b-primary-color text-center">
            <p>Kleur palette</p>
            <?php

            foreach ($pdo->query("SELECT * FROM colors") as $color) {?>
                <div class="border border-black text-start m-4.5">
                    <div class="flex">
                        <input name="color-<?=$color["id"]?>" type="color" value="#<?=$color["hex"]?>" class="border-none m-2" style="width: 100px; height: 100px;">
                        <p class="mt-4.5"><?=$color["name"]?></p>
                    </div>
                </div>
            <?php }

            ?>
        </div>
    </div>
</form>
<script src="js/previewLogo.js"></script>
<script src="js/abandonChanges.js"></script>