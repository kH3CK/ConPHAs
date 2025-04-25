<?php

require_once("../src/imports/checkIfLoggedIn.php");
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
                        <img src="<?=$logo?>" alt="Logo" class="border border-primary-color preview-img" previewId="logo">
                    </div>
                    <div class="flex items-center justify-center">
                        <input name="logo" type="text" value="<?=$logo?>" class="border border-primary-color w-xs preview-input" previewId="logo">
                    </div>
                </div>
                <div class="basis-1/2 flex items-center justify-center">
                    <p>Logo veranderen</p>
                </div>
            </div>
            <div class="flex flex-row items-center my-5">
                <div class="basis-1/2 flex items-center justify-center my-5">
                    <input name="title" type="text" value="<?= getTextFromDatabase(1) ?>" class="border border-primary-color w-xs">
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
                            <input name="font-link" type="text" value="<?= getTextFromDatabase(3) ?>" class="border border-primary-color w-xs mb-5">
                        </div>
                        <div>
                            <div class="mt-4">
                                <a href="/edit_internships" class="btn bg-primary-color border border-primary-color p-2 text-primary-background">Stageplekken bewerken</a>
                            </div>
                        </div>
                    </div>
                    <p class="mb-1">Font Code</p>
                    <input name="font-code" type="text" value='<?= getTextFromDatabase(4) ?>' class="border border-primary-color w-3xs mb-5">
                    <p class="mb-1">Hoe vul jij dat in?</p>
                    <ol class="list-decimal ml-10">
                        <li>Ga naar <a class="text-primary-color" href="https://fonts.google.com">https://fonts.google.com</a></li>
                        <li>Selecteer een font</li>
                        <li>Klik op "Get font"</li>
                        <li>Klik op "Get embed code"</li>
                        <li>Kopieer de link die begint met<br>
                            <strong>https://fonts.googleapis.com/css2?family</strong> (link)</li>
                        <li>Dan copier het ding tussen <strong>font-family: </strong> en <strong>;</strong> op dezelfde regel (code)</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-row">
        <div class="basis-1/2 border-r border-r-primary-color text-center">
            <p>Blogs bewerken</p>
            <div class="flex justify-center">
                <div class="border border-black m-4.5 p-2 relative">
                    <img alt="Afbeelding" previewId="new-blog" class="w-full h-64 object-cover">
                    <input class="border border-primary-color block mt-2 w-full" type="text" placeholder="Titel" name="blog-title-new">
                    <input class="border border-primary-color block mt-2 w-full" type="text" placeholder="Auteur" name="blog-author-new">
                    <input class="border border-primary-color block mt-2 w-full" type="text" placeholder="Afbeelding URL" name="blog-image_link-new" previewId="new-blog">
                    <p>Gebruik ",,, " om meerdere categories te scheiden</p>
                    <input class="border border-primary-color block mt-2 w-full" type="text" placeholder="Categorie,,, Categorie" name="blog-categories-new">
                    <input class="border border-primary-color block mt-2 w-full" type="text" placeholder="2025-12-25 14:44:59" name="blog-publication_date-new">
                    <textarea class="border border-primary-color block mt-2 w-full" name="blog-preview_text-new" id="blog-preview_text-new" placeholder="Preview Tekst"></textarea>
                    <textarea class="border border-primary-color block mt-2 w-full" name="blog-text-new" id="blog-text-new" placeholder="Tekst"></textarea>
                    <button class="bg-primary-color border border-primary-color p-2 text-primary-background mt-2 ">Toevoegen</button>
                </div>
            </div>
            <div class="grid grid-cols-2">
                <?php

                foreach ($pdo->query("SELECT * FROM blogs") as $blog) {
                    $id = $blog["id"];
                    $image_link = $blog["image_link"];
                    $categories = "";
                    foreach ($pdo->query("SELECT name FROM categories WHERE blog_id = " . $id) as $category) {
                        $categories .= $category["name"] . ",,, ";
                    }
                    $categories = substr($categories, 0, -4);?>
                <div class="border border-black m-4.5 p-2 relative">
                    <a href="/remove_blog?id=<?=$id?>" class="absolute w-10 h-10 bg-danger border border-primary-color -top-5 -right-5 flex justify-center items-center text-center">
                        <p class="text-primary-background text-xl">X</p>
                    </a>
                    <div class="flex justify-center">
                        <img alt="Afbeelding" previewId="<?=$id?>" src="<?=$image_link?>" class="w-full h-64 object-cover">
                    </div>
                    <input class="border border-primary-color mt-2 w-full" type="text" placeholder="Titel" name="blog-title-<?=$id?>" value="<?=$blog["title"]?>">
                    <input class="border border-primary-color mt-2 w-full" type="text" placeholder="Auteur" name="blog-author-<?=$id?>" value="<?=$blog["author"]?>">
                    <input class="border border-primary-color mt-2 w-full" type="text" placeholder="Afbeelding URL" name="blog-image_link-<?=$id?>" previewId="<?=$id?>" value="<?=$image_link?>">
                    <p>Gebruik ",,, " om meerdere categories te scheiden</p>
                    <input class="border border-primary-color mt-2 w-full" type="text" placeholder="Categorie,,, Categorie" name="blog-categories-<?=$id?>" value="<?=$categories?>">
                    <input class="border border-primary-color mt-2 w-full" type="text" placeholder="2025-12-25 14:44:59" name="blog-publication_date-<?=$id?>" value="<?=$blog["publication_date"]?>">
                    <textarea class="border border-primary-color mt-2 w-full" name="preview_text" id="blog-preview_text-<?=$id?>" placeholder="Preview Tekst"><?=$blog["preview_text"]?></textarea>
                    <textarea class="border border-primary-color mt-2 w-full" name="text" id="blog-text-<?=$id?>" placeholder="Tekst"><?=$blog["text"]?></textarea>
                </div>
                <?php }

                ?>
            </div>
        </div>
        <div class="basis-1/2 text-center">
            <p>Kleur palette</p>
            <?php

            foreach ($pdo->query("SELECT * FROM colors") as $color) { ?>
                <div class="border border-black text-start m-4.5">
                    <div class="flex">
                        <input name="color-<?= $color["id"] ?>" type="color" value="#<?= $color["hex"] ?>" class="border-none m-2" style="width: 100px; height: 100px;">
                        <p class="mt-4.5"><?= $color["name"] ?></p>
                    </div>
                </div>
            <?php }

            ?>
        </div>
    </div>
</form>
<div class="absolute w-1/2 border-r border-r-primary-color h-19"></div>
<div class="sticky bottom-2 left-2 text-start m-2 max-w-60">
    <a href="/logout"><img src="images/arrow-left.png" alt="<-" class="inline w-1/4 h-1/4"> uitloggen</a>
</div>
<script src="js/previewImage.js"></script>
<script src="js/abandonChanges.js"></script>