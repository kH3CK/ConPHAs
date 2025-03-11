<?php

// require_once("../src/imports/checkIfLoggedIn.php");
require_once("../template/components/head.php");
require_once("../src/imports/getTextFromDatabase.php");

?>
<form class="flex flex-row">
    <div class="basis-1/2 border-r border-r-primary-color border-b border-b-primary-color">
        <div class="flex flex-row items-center mt-5">
            <div class="basis-1/2">
                <div class="flex items-center justify-center mb-5">
                    <img src="https://placehold.co/200" alt="Logo" class="border border-primary-color">
                </div>
                <div class="flex items-center justify-center">
                    <input name="logo" type="text" value="<?=getTextFromDatabase($pdo, 2)?>" class="text-center border border-primary-color px-5">
                </div>
            </div>
            <div class="basis-1/2 flex items-center justify-center">
                <p>Logo veranderen</p>
            </div>
        </div>
        <div class="flex flex-row items-center my-5">
            <div class="basis-1/2 flex items-center justify-center my-5">
                <input name="title" type="text" value="<?=getTextFromDatabase($pdo, 1)?>" class="text-center border border-primary-color px-5">
            </div>
            <div class="basis-1/2 flex items-center justify-center">
                <p>Titel veranderen</p>
            </div>
        </div>
    </div>
    <div class="basis-1/2 relative border-b border-b-primary-color text-center flex justify-center items-center">
        <div class="absolute top-0 right-0 m-5">
            <button class="bg-primary-color border border-primary-color p-2 text-primary-background">Save</button>
            <button class="bg-red-500 border border-primary-color p-2 text-primary-background">Abandon changes</button>
        </div>
        <div>
            <p class="mb-5">Font</p>
            <input name="font-link" type="text" value="<?=getTextFromDatabase($pdo, 3)?>" class="text-center border border-primary-color px-5">
            <input name="font-name" type="text" value="<?=getTextFromDatabase($pdo, 3)?>" class="text-center border border-primary-color px-5">
        </div>
    </div>
</form>