<?php

require_once("../template/components/head.php");
require_once("../template/components/navbar.php");
require_once("../template/components/internship.php");

?>

<div class="pt-20">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-6 p-6">
        <div class="w-full md:w-3/4">
            <div class="space-y-4">
                <?php

                $searchQuery = "SELECT * FROM internships";
                $conditions = [];
                $params = [];

                // Zoekwoord
                if (isset($_GET['search']) && !empty($_GET['search'])) {
                    $searchParam = "%" . $_GET['search'] . "%";
                    $conditions[] = "(title LIKE :search1 OR description LIKE :search2 OR location LIKE :search3)";
                    $params[':search1'] = $searchParam;
                    $params[':search2'] = $searchParam;
                    $params[':search3'] = $searchParam;
                }

                // MBO niveau(s)
                if (isset($_GET['mbo']) && !empty($_GET['mbo'])) {
                    $mboLevels = is_array($_GET['mbo']) ? $_GET['mbo'] : [$_GET['mbo']];
                    $placeholders = [];
                    foreach ($mboLevels as $index => $level) {
                        $paramName = ":mbo" . $index;
                        $placeholders[] = $paramName;
                        $params[$paramName] = $level;
                    }
                    $conditions[] = "minimum_level IN (" . implode(", ", $placeholders) . ")";
                }

                // Stage soorten
                if (isset($_GET['type']) && !empty($_GET['type'])) {
                    $stageTypes = is_array($_GET['type']) ? $_GET['type'] : [$_GET['type']];
                    $placeholders = [];
                    foreach ($stageTypes as $index => $type) {
                        $paramName = ":type" . $index;
                        $placeholders[] = $paramName;
                        $params[$paramName] = $type;
                    }
                    $conditions[] = "type IN (" . implode(", ", $placeholders) . ")";
                }

                // Startmaand
                if (isset($_GET['month']) && !empty($_GET['month']) && $_GET['month'] !== "start") {
                    $conditions[] = "MONTH(start_date_and_time) = :month";
                    $params[':month'] = $_GET['month'];
                }

                // Stage weken
                if (isset($_GET['weeks-min']) && isset($_GET['weeks-max']) &&
                    is_numeric($_GET['weeks-min']) && is_numeric($_GET['weeks-max'])) {
                    $conditions[] = "weeks BETWEEN :weeksMin AND :weeksMax";
                    $params[':weeksMin'] = $_GET['weeks-min'];
                    $params[':weeksMax'] = $_GET['weeks-max'];
                }

                // Stage uren
                if (isset($_GET['hours-min']) && isset($_GET['hours-max']) &&
                    is_numeric($_GET['hours-min']) && is_numeric($_GET['hours-max'])) {
                    $conditions[] = "hours BETWEEN :hoursMin AND :hoursMax";
                    $params[':hoursMin'] = $_GET['hours-min'];
                    $params[':hoursMax'] = $_GET['hours-max'];
                }

                // Final query
                if (!empty($conditions)) {
                    $searchQuery .= " WHERE " . implode(" AND ", $conditions);
                }

                $stmt = $pdo->prepare($searchQuery);
                foreach ($params as $key => $value) {
                    $stmt->bindValue($key, $value);
                }
                $stmt->execute();

                foreach ($stmt->fetchAll() as $internship) {
                    makeInternship($internship);
                }

                ?>
            </div>
        </div>

        <!-- FILTER FORM -->
        <div class="md:w-1/4 bg-green-100 p-4 rounded-lg md:order-none order-first flex flex-col h-full">
            <form method="GET">
                <h2 class="font-bold">Filters</h2>

                <input type="text" name="search" placeholder="Trefwoord" class="w-full p-2 mt-2 border rounded" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">

                <!-- MBO-niveau -->
                <select name="mbo[]" multiple class="w-full p-2 mt-2 border rounded" size="5">
                    <option disabled>opleidings niveau</option>
                    <option value="MBO 1" <?= in_array('MBO 1', $_GET['mbo'] ?? []) ? 'selected' : '' ?>>mbo 1</option>
                    <option value="MBO 2" <?= in_array('MBO 2', $_GET['mbo'] ?? []) ? 'selected' : '' ?>>mbo 2</option>
                    <option value="MBO 3" <?= in_array('MBO 3', $_GET['mbo'] ?? []) ? 'selected' : '' ?>>mbo 3</option>
                    <option value="MBO 4" <?= in_array('MBO 4', $_GET['mbo'] ?? []) ? 'selected' : '' ?>>mbo 4</option>
                    <option value="HBO" <?= in_array('HBO', $_GET['mbo'] ?? []) ? 'selected' : '' ?>>hbo</option>
                </select>
                <p class="text-sm text-gray-500 mt-1">Houd Ctrl (Windows) of Command (Mac) ingedrukt om meerdere opties te selecteren</p>

                <!-- Stage soorten -->
                <h2 class="mt-4">Stage soort</h2>
                <label class="relative inline-flex items-center cursor-pointer mt-2">
                    <input type="checkbox" name="type[]" value="afstudeerstage" class="sr-only peer" <?= in_array('afstudeerstage', $_GET['type'] ?? []) ? 'checked' : '' ?>>
                    <div class="w-11 h-6 bg-gray-300 peer-focus:ring-4 peer-focus:ring-green-300 
                    rounded-full peer peer-checked:bg-green-500 transition duration-300"></div>
                    <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full shadow 
                    peer-checked:translate-x-5 transition duration-300"></div>
                    <span class="ml-2">afstudeerstage</span>
                </label>

                <label class="relative inline-flex items-center cursor-pointer mt-2">
                    <input type="checkbox" name="type[]" value="meewerkstage" class="sr-only peer" <?= in_array('meewerkstage', $_GET['type'] ?? []) ? 'checked' : '' ?>>
                    <div class="w-11 h-6 bg-gray-300 peer-focus:ring-4 peer-focus:ring-green-300 
                    rounded-full peer peer-checked:bg-green-500 transition duration-300"></div>
                    <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full shadow 
                    peer-checked:translate-x-5 transition duration-300"></div>
                    <span class="ml-2">meewerkstage</span>
                </label>

                <!-- Startmaand -->
                <select name="month" class="w-full border border-black text-green-700 rounded px-4 py-2 mt-4">
                    <option value="start">start maand</option>
                    <option value="1" <?= ($_GET['month'] ?? '') == '1' ? 'selected' : '' ?>>januari</option>
                    <option value="2" <?= ($_GET['month'] ?? '') == '2' ? 'selected' : '' ?>>februari</option>
                    <option value="3" <?= ($_GET['month'] ?? '') == '3' ? 'selected' : '' ?>>maart</option>
                    <option value="4" <?= ($_GET['month'] ?? '') == '4' ? 'selected' : '' ?>>april</option>
                    <option value="5" <?= ($_GET['month'] ?? '') == '5' ? 'selected' : '' ?>>mei</option>
                    <option value="6" <?= ($_GET['month'] ?? '') == '6' ? 'selected' : '' ?>>juni</option>
                    <option value="7" <?= ($_GET['month'] ?? '') == '7' ? 'selected' : '' ?>>juli</option>
                    <option value="8" <?= ($_GET['month'] ?? '') == '8' ? 'selected' : '' ?>>augustus</option>
                    <option value="9" <?= ($_GET['month'] ?? '') == '9' ? 'selected' : '' ?>>september</option>
                    <option value="10" <?= ($_GET['month'] ?? '') == '10' ? 'selected' : '' ?>>oktober</option>
                    <option value="11" <?= ($_GET['month'] ?? '') == '11' ? 'selected' : '' ?>>november</option>
                    <option value="12" <?= ($_GET['month'] ?? '') == '12' ? 'selected' : '' ?>>december</option>
                </select>

                <!-- Stage weken -->
                <strong class="mt-4 block">Stage weken</strong>
                <p class="mb-2">van <input class="border border-primary-color rounded w-18" type="number" name="weeks-min" placeholder="0" value="<?= htmlspecialchars($_GET['weeks-min'] ?? '') ?>"> tot <input class="border border-primary-color rounded w-18" type="number" name="weeks-max" placeholder="54" value="<?= htmlspecialchars($_GET['weeks-max'] ?? '') ?>"></p>

                <!-- Stage uren -->
                <strong>Stage uren</strong>
                <p class="mb-2">van <input class="border border-primary-color rounded w-18" type="number" name="hours-min" placeholder="0" value="<?= htmlspecialchars($_GET['hours-min'] ?? '') ?>"> tot <input class="border border-primary-color rounded w-18" type="number" name="hours-max" placeholder="500" value="<?= htmlspecialchars($_GET['hours-max'] ?? '') ?>"></p>

                <button type="submit" class="btn bg-primary-color text-primary-background p-2 rounded ms-2 mt-2">Zoeken</button>
            </form>
        </div>
    </div>
</div>

<script src="js/maand.js"></script>
<script src="js/mbo.js"></script>
