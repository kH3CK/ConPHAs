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

                if (isset($_GET['search']) && !empty($_GET['search'])) {
                    $searchTerm = $_GET['search'];
                    $conditions[] = "(title LIKE :search1 OR description LIKE :search2 OR location LIKE :search3 OR minimum_level LIKE :search4 OR type LIKE :search5)";
                    $searchParam = "%" . $_GET['search'] . "%";
                    $params[':search1'] = $searchParam;
                    $params[':search2'] = $searchParam;
                    $params[':search3'] = $searchParam;
                    $params[':search4'] = $searchParam;
                    $params[':search5'] = $searchParam;
                }

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
        <div class="md:w-1/4 bg-green-100 p-4 rounded-lg md:order-none order-first flex flex-col h-full">
            <h2 class="font-bold">Filters</h2>
            <form method="GET" action="">
                <input type="text" name="search" placeholder="Trefwoord" class="w-full p-2 mt-2 border rounded" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <select name="mbo[]" id="mbo" multiple class="w-full p-2 mt-2 border rounded" size="5">
                    <option value="MBO 1" <?php echo (isset($_GET['mbo']) && in_array('MBO 1', $_GET['mbo'])) ? 'selected' : ''; ?>>MBO 1</option>
                    <option value="MBO 2" <?php echo (isset($_GET['mbo']) && in_array('MBO 2', $_GET['mbo'])) ? 'selected' : ''; ?>>MBO 2</option>
                    <option value="MBO 3" <?php echo (isset($_GET['mbo']) && in_array('MBO 3', $_GET['mbo'])) ? 'selected' : ''; ?>>MBO 3</option>
                    <option value="MBO 4" <?php echo (isset($_GET['mbo']) && in_array('MBO 4', $_GET['mbo'])) ? 'selected' : ''; ?>>MBO 4</option>
                    <option value="HBO" <?php echo (isset($_GET['mbo']) && in_array('HBO', $_GET['mbo'])) ? 'selected' : ''; ?>>HBO</option>
                </select>
                <div id="selectedLevels" class="flex flex-wrap gap-2 mt-2">
                    <?php
                    if (isset($_GET['mbo']) && !empty($_GET['mbo'])) {
                        foreach ($_GET['mbo'] as $selectedLevel) {
                            echo '<span class="bg-green-100 px-2 py-1 rounded">' . htmlspecialchars($selectedLevel) . '</span>';
                        }
                    }
                    ?>
                </div>
                <div id="iets" class="flex flex-wrap"></div>
                
                <h2>stage soort</h2>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-300 peer-focus:ring-4 peer-focus:ring-green-300 
                    rounded-full peer peer-checked:bg-green-500 
                    transition duration-300"></div>
                    <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full shadow 
                    peer-checked:translate-x-5 transition duration-300"></div>
                    <span class="ml-2">afstudeerstage</span>
                </label>
                <div class="div">
                    <label class="relative inline-flex items-center cursor-pointer mt-2">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-11 h-6 mt bg-gray-300 peer-focus:ring-4 peer-focus:ring-green-300 
                    rounded-full peer peer-checked:bg-green-500 
                    transition duration-300"></div>
                        <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full shadow 
                    peer-checked:translate-x-5 transition duration-300"></div>
                        <span class="ml-2">meewerkstage</span>
                    </label>
                    </div>
                <div class="">
                    <div class="max-w-sm mx-auto">
                        <select id="monthSelect" class="w-full border border-black text-green-700 rounded px-4  py-2 mb-" value="abc">
                            <option value="start">start maand</option>
                            <option value="Jan">januari</option>
                            <option value="Feb">februari</option>
                            <option value="Mrt">maart</option>
                            <option value="Apr">april</option>
                            <option value="Mei">mei</option>
                            <option value="Jun">juni</option>
                            <option value="Jul">juli</option>
                            <option value="Aug">augustus</option>
                            <option value="Sep">september</option>
                            <option value="Okt">oktober</option>
                            <option value="Nov">november</option>
                            <option value="Dec">december</option>
                        </select>
                        <div id="selectedMonth" class="flex flex-wrap"></div>
                        <strong>Stage weken</strong>
                        <p class="mb-2">van <input class="border border-primary-color rounded w-18" type="text" name="weeks-min" placeholder="0"> tot <input class="border border-primary-color rounded w-18" type="text" name="weeks-max" placeholder="54"></p>
                        <strong>Stage uren</strong>
                        <p class="mb-2">van <input class="border border-primary-color rounded w-18" type="text" name="hours-min" placeholder="0"> tot <input class="border border-primary-color rounded w-18" type="text" name="hours-max" placeholder="99999"></p>
                    </div>
                    <button type="submit" class="btn bg-primary-color text-primary-background p-2 rounded ms-2 mt-2">Zoeken</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="js/maand.js"></script> 
<script src="js/mbo.js"></script>