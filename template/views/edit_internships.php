<?php

require_once("../src/imports/checkIfLoggedIn.php");
require_once("../template/components/head.php");
require_once("../template/components/editableInternship.php");

?>
<div class="flex flex-row">
    <div class="basis-1/2 border-r border-r-primary-color">
        <form action="edit_internships_apply" method="post">
            <div class="sticky text-end">
                <button class="border border-primary-color bg-primary-color p-2 text-primary-background">Opslaan</button>
                <button class="border border-primary-color bg-danger p-2 text-primary-background mr-2 mt-2" id="wijzigingen-annuleren">Wijzigingen annuleren</button>
            </div>
            <?php

            $monthstring = "";
            $levelstring = "";
            for ($i = 1; $i < 12; $i++) {
                if (isset($_GET["month-" . $i])) {
                    $monthstring = $monthstring . "MONTH(start_date_and_time) = " . $i . " OR ";
                }
                if ($i <= 4 && isset($_GET["mbo-" . $i])) {
                    $levelstring = $levelstring . "minimum_level = 'MBO " . $i . "' OR ";
                }
            }
            if (isset($_GET["hbo"])) {
                $levelstring = $levelstring . "minimum_level = 'HBO'";
            } else {
                $levelstring = substr($levelstring, 0, -4);
            }
            $weeksmin = @$_GET["weeks-min"];
            $weeksminnotempty = !empty($weeksmin);
            $weeksmax = @$_GET["weeks-max"];
            $weeksmaxnotempty = !empty($weeksmax);
            $hoursmin = @$_GET["hours-min"];
            $hoursminnotempty = !empty($hoursmin);
            $hoursmax = @$_GET["hours-max"];
            $hoursmaxnotempty = !empty($hoursmax);
            $compensationmin = @$_GET["compensation-min"];
            $compensationminnotempty = !empty($compensationmin);
            $checkminormax = $weeksminnotempty || $weeksmaxnotempty || $hoursminnotempty || $hoursmaxnotempty || $compensationminnotempty;
            $monthstring = substr($monthstring, 0, -4);
            $checktitle = !empty($_GET["search-term"]);
            $checkstagetype = isset($_GET["afstudeerstage"]) != isset($_GET["meewerkstage"]);
            if ($monthstring || $levelstring || $checktitle || $checkstagetype || $checkminormax) {
                $checks = [];
                $executearray = [];
                if ($checktitle) {
                    $checks[] = "title LIKE CONCAT(CONCAT('%', :search_term), '%')";
                    $executearray["search_term"] = $_GET["search-term"];
                }
                if ($monthstring) {
                    $checks[] = $monthstring;
                }
                if ($levelstring) {
                    $checks[] = $levelstring;
                }
                if ($checkstagetype) {
                    $checks[] = "type = " . isset($_GET["afstudeerstage"]) ? "afstudeerstage" : "meewerkstage";
                }
                if ($weeksminnotempty) {
                    $checks[] = "weeks >= :weeks_min";
                    $executearray["weeks_min"] = $weeksmin;
                }
                if ($weeksmaxnotempty) {
                    $checks[] = "weeks <= :weeks_max";
                    $executearray["weeks_max"] = $weeksmax;
                }
                if ($hoursminnotempty) {
                    $checks[] = "hours >= :hours_min";
                    $executearray["hours_min"] = $hoursmin;
                }
                if ($hoursmaxnotempty) {
                    $checks[] = "hours <= :hours_max";
                    $executearray["hours_max"] = $hoursmax;
                }
                if ($compensationminnotempty) {
                    $checks[] = "compensation >= :compensation_min";
                    $executearray["compensation_min"] = $compensationmin;
                }
                $searchstring = " WHERE " . implode(" AND ", $checks);
            }
            if ($checktitle || $checkminormax) {
                $statement = $pdo->prepare("SELECT * FROM internships" . $searchstring);
                $statement->execute($executearray);
            } else {
                $statement = $pdo->query("SELECT * FROM internships" . ($searchstring ?? ""));
            }
            foreach ($statement->fetchAll() as $internship) {
                $id = $internship["id"];?>
                <div class="border border-primary-color m-6 relative">
                    <a href="/remove_internship?id=<?=$id?>" class="absolute w-10 h-10 bg-danger border border-primary-color -top-5 -right-5 flex justify-center items-center text-center">
                        <p class="text-primary-background text-xl">X</p>
                    </a>
                    <?= makeEditableInternship($internship) ?>
                </div>
            <?php }

            ?>
        </form>
    </div>
    <div class="basis-1/2">
        <div class="border-b border-b-primary-color">
            <div class="bg-secondary-background m-5 border border-primary-color rounded">
                <strong class="m-2">Filters</strong>
                <form>
                    <div class="m-5">
                        <input type="text" name="search-term" placeholder="Trefwoord" class="border border-primary-color block mb-2 rounded">
                        <strong>Minimum Nodig Niveau</strong>
                        <div class="mb-2">
                            <input type="checkbox" class="me-2" name="mbo-1" id="mbo-1"><label for="mbo-1">MBO 1</label>
                            <input type="checkbox" class="me-2" name="mbo-2" id="mbo-2"><label for="mbo-2">MBO 2</label>
                            <input type="checkbox" class="me-2" name="mbo-3" id="mbo-3"><label for="mbo-3">MBO 3</label>
                            <input type="checkbox" class="me-2" name="mbo-4" id="mbo-4"><label for="mbo-4">MBO 4</label>
                            <input type="checkbox" class="me-2" name="hbo" id="hbo"><label for="hbo">HBO</label>
                        </div>
                        <strong>Type Stage</strong>
                        <div class="mb-2">
                            <input type="checkbox" class="me-2" name="afstudeerstage" id="afstudeerstage"><label for="afstudeerstage">Afstudeerstage</label>
                            <input type="checkbox" class="me-2" name="meewerkstage" id="meewerkstage"><label for="meewerkstage">Meewerkstage</label>
                        </div>
                        <strong>Start Maand</strong>
                        <div class="mb-2">
                            <input type="checkbox" class="me-2" name="month-1" id="month-1"><label for="month-1">Januari</label>
                            <input type="checkbox" class="me-2" name="month-2" id="month-2"><label for="month-2">Februari</label>
                            <input type="checkbox" class="me-2" name="month-3" id="month-3"><label for="month-3">Mart</label>
                            <input type="checkbox" class="me-2" name="month-4" id="month-4"><label for="month-4">April</label>
                            <input type="checkbox" class="me-2" name="month-5" id="month-5"><label for="month-5">Mei</label>
                            <input type="checkbox" class="me-2" name="month-6" id="month-6"><label for="month-6">Juni</label>
                            <input type="checkbox" class="me-2" name="month-7" id="month-7"><label for="month-7">Juli</label>
                            <input type="checkbox" class="me-2" name="month-8" id="month-8"><label for="month-8">Augustus</label>
                            <input type="checkbox" class="me-2" name="month-9" id="month-9"><label for="month-9">September</label>
                            <input type="checkbox" class="me-2" name="month-10" id="month-10"><label for="month-10">Oktober</label>
                            <input type="checkbox" class="me-2" name="month-11" id="month-11"><label for="month-11">November</label>
                            <input type="checkbox" class="me-2" name="month-12" id="month-12"><label for="month-12">December</label>
                        </div>
                        <strong>Stage weken</strong>
                        <p class="mb-2">van <input class="border border-primary-color rounded" type="text" name="weeks-min" placeholder="0"> tot <input class="border border-primary-color rounded" type="text" name="weeks-max" placeholder="99999"></p>
                        <strong>Stage uren</strong>
                        <p class="mb-2">van <input class="border border-primary-color rounded" type="text" name="hours-min" placeholder="0"> tot <input class="border border-primary-color rounded" type="text" name="hours-max" placeholder="99999"></p>
                        <strong>Stagevergoeding</strong>
                        <p class="mb-2">van <input class="border border-primary-color rounded" type="text" name="compensation-min" placeholder="0"> per maand</p>
                    </div>
                    <button class="btn bg-primary-color text-primary-background p-2 rounded ms-5 mb-5">Zoeken</button>
                </form>
            </div>
        </div>
        <form action="/add_internship" method="post">
            <div class="border border-primary-color m-6 relative">
                <?= makeEditableInternship() ?>
            </div>
            <div class="text-center">
                <button class="bg-primary-color border border-primary-color p-2 text-primary-background m-2">Toevoegen</button>
            </div>
        </form>
    </div>
</div>
<?php require_once("../template/components/backButton.php"); ?>
<script src="js/abandonChanges.js"></script>