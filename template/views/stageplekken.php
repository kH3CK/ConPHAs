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
                if (isset($_GET['month']) && !empty($_GET['month'])) {
                    $months = is_array($_GET['month']) ? $_GET['month'] : [$_GET['month']];
                    $placeholders = [];
                    foreach ($months as $index => $month) {
                        $paramName = ":month" . $index;
                        $placeholders[] = $paramName;
                        $params[$paramName] = $month;
                    }
                    $conditions[] = "MONTH(start_date_and_time) IN (" . implode(", ", $placeholders) . ")";
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

                <input type="text" name="search" placeholder="Trefwoord" class="w-full p-2 mt-2 border border-primary-color rounded" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">

                <!-- MBO-niveau -->
                <div class="relative">
                    <button type="button" id="mboDropdownButton" class="w-full p-2 mt-2 border border-primary-color rounded text-left flex justify-between items-center bg-green-100">
                        <span>Selecteer opleidingsniveau</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="mboDropdown" class="hidden absolute z-10 w-full bg-green-100 border border-primary-color rounded shadow-lg">
                        <div class="p-2">
                            <label class="flex items-center p-2 hover:bg-green-200 rounded cursor-pointer">
                                <input type="checkbox" name="mbo[]" value="MBO 1" class="mr-2" <?php echo (isset($_GET['mbo']) && in_array('MBO 1', $_GET['mbo'])) ? 'checked' : ''; ?>>
                                MBO 1
                            </label>
                            <label class="flex items-center p-2 hover:bg-green-200 rounded cursor-pointer">
                                <input type="checkbox" name="mbo[]" value="MBO 2" class="mr-2" <?php echo (isset($_GET['mbo']) && in_array('MBO 2', $_GET['mbo'])) ? 'checked' : ''; ?>>
                                MBO 2
                            </label>
                            <label class="flex items-center p-2 hover:bg-green-200 rounded cursor-pointer">
                                <input type="checkbox" name="mbo[]" value="MBO 3" class="mr-2" <?php echo (isset($_GET['mbo']) && in_array('MBO 3', $_GET['mbo'])) ? 'checked' : ''; ?>>
                                MBO 3
                            </label>
                            <label class="flex items-center p-2 hover:bg-green-200 rounded cursor-pointer">
                                <input type="checkbox" name="mbo[]" value="MBO 4" class="mr-2" <?php echo (isset($_GET['mbo']) && in_array('MBO 4', $_GET['mbo'])) ? 'checked' : ''; ?>>
                                MBO 4
                            </label>
                            <label class="flex items-center p-2 hover:bg-green-200 rounded cursor-pointer">
                            <label class="flex items-center p-2 hover:bg-gray-100 rounded cursor-pointer">
                                <input type="checkbox" name="mbo[]" value="HBO" class="mr-2" <?php echo (isset($_GET['mbo']) && in_array('HBO', $_GET['mbo'])) ? 'checked' : ''; ?>>
                                HBO
                            </label>
                        </div>
                    </div>
                </div>

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
                <div class="relative">
                    <button type="button" id="monthDropdownButton" class="w-full p-2 mt-2 border border-primary-color rounded text-left flex justify-between items-center bg-green-100">
                        <span>Selecteer startmaand</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="monthDropdown" class="hidden absolute z-10 w-full bg-green-100 border border-primary-color rounded shadow-lg">
                        <div class="p-2">
                            <label class="flex items-center p-2 hover:bg-green-200 rounded cursor-pointer">
                                <input type="checkbox" name="month[]" value="1" class="mr-2" <?php echo (isset($_GET['month']) && in_array('1', $_GET['month'])) ? 'checked' : ''; ?>>
                                Januari
                            </label>
                            <label class="flex items-center p-2 hover:bg-green-200 rounded cursor-pointer">
                                <input type="checkbox" name="month[]" value="2" class="mr-2" <?php echo (isset($_GET['month']) && in_array('2', $_GET['month'])) ? 'checked' : ''; ?>>
                                Februari
                            </label>
                            <label class="flex items-center p-2 hover:bg-green-200 rounded cursor-pointer">
                                <input type="checkbox" name="month[]" value="3" class="mr-2" <?php echo (isset($_GET['month']) && in_array('3', $_GET['month'])) ? 'checked' : ''; ?>>
                                Maart
                            </label>
                            <label class="flex items-center p-2 hover:bg-green-200 rounded cursor-pointer">
                                <input type="checkbox" name="month[]" value="4" class="mr-2" <?php echo (isset($_GET['month']) && in_array('4', $_GET['month'])) ? 'checked' : ''; ?>>
                                April
                            </label>
                            <label class="flex items-center p-2 hover:bg-green-200 rounded cursor-pointer">
                                <input type="checkbox" name="month[]" value="5" class="mr-2" <?php echo (isset($_GET['month']) && in_array('5', $_GET['month'])) ? 'checked' : ''; ?>>
                                Mei
                            </label>
                            <label class="flex items-center p-2 hover:bg-green-200 rounded cursor-pointer">
                                <input type="checkbox" name="month[]" value="6" class="mr-2" <?php echo (isset($_GET['month']) && in_array('6', $_GET['month'])) ? 'checked' : ''; ?>>
                                Juni
                            </label>
                            <label class="flex items-center p-2 hover:bg-green-200 rounded cursor-pointer">
                                <input type="checkbox" name="month[]" value="7" class="mr-2" <?php echo (isset($_GET['month']) && in_array('7', $_GET['month'])) ? 'checked' : ''; ?>>
                                Juli
                            </label>
                            <label class="flex items-center p-2 hover:bg-green-200 rounded cursor-pointer">
                                <input type="checkbox" name="month[]" value="8" class="mr-2" <?php echo (isset($_GET['month']) && in_array('8', $_GET['month'])) ? 'checked' : ''; ?>>
                                Augustus
                            </label>
                            <label class="flex items-center p-2 hover:bg-green-200 rounded cursor-pointer">
                                <input type="checkbox" name="month[]" value="9" class="mr-2" <?php echo (isset($_GET['month']) && in_array('9', $_GET['month'])) ? 'checked' : ''; ?>>
                                September
                            </label>
                            <label class="flex items-center p-2 hover:bg-green-200 rounded cursor-pointer">
                                <input type="checkbox" name="month[]" value="10" class="mr-2" <?php echo (isset($_GET['month']) && in_array('10', $_GET['month'])) ? 'checked' : ''; ?>>
                                Oktober
                            </label>
                            <label class="flex items-center p-2 hover:bg-green-200 rounded cursor-pointer">
                                <input type="checkbox" name="month[]" value="11" class="mr-2" <?php echo (isset($_GET['month']) && in_array('11', $_GET['month'])) ? 'checked' : ''; ?>>
                                November
                            </label>
                            <label class="flex items-center p-2 hover:bg-green-200 rounded cursor-pointer">
                                <input type="checkbox" name="month[]" value="12" class="mr-2" <?php echo (isset($_GET['month']) && in_array('12', $_GET['month'])) ? 'checked' : ''; ?>>
                                December
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Stage weken -->
                <strong class="mt-4 block">Stage weken</strong>
                <div class="mb-2 flex flex-col gap-2">
                    <div class="flex items-center gap-2">
                        <label class="w-12">Van:</label>
                        <input class="border border-primary-color rounded w-full p-1" type="number" min="0" max="54" name="weeks-min" placeholder="0" value="<?= isset($_GET['weeks-min']) ? htmlspecialchars($_GET['weeks-min']) : '' ?>">
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="w-12">Tot:</label>
                        <input class="border border-primary-color rounded w-full p-1" type="number" min="0" max="54" name="weeks-max" placeholder="54" value="<?= isset($_GET['weeks-max']) ? htmlspecialchars($_GET['weeks-max']) : '' ?>">
                    </div>
                </div>

                <!-- Stage uren -->
                <strong class="mt-4 block">Stage uren</strong>
                <div class="mb-2 flex flex-col gap-2">
                    <div class="flex items-center gap-2">
                        <label class="w-12">Van:</label>
                        <input 
                            class="border border-primary-color rounded w-full p-1" 
                            type="number" 
                            min="0" 
                            max="500" 
                            name="hours-min" 
                            placeholder="0" 
                            value="<?= isset($_GET['hours-min']) ? htmlspecialchars($_GET['hours-min']) : '' ?>"
                        >
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="w-12">Tot:</label>
                        <input 
                            class="border border-primary-color rounded w-full p-1" 
                            type="number" 
                            min="0" 
                            max="500" 
                            name="hours-max" 
                            placeholder="500" 
                            value="<?= isset($_GET['hours-max']) ? htmlspecialchars($_GET['hours-max']) : '' ?>"
                        >
                    </div>
                </div>

                <button type="submit" class="btn bg-primary-color text-primary-background p-2 rounded ms-2 mt-2">Zoeken</button>
            </form>
        </div>
    </div>
</div>

<script src="js/maand.js"></script>
<script src="js/maand.js"></script>
<script src="js/mbo.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropdownButton = document.getElementById('mboDropdownButton');
    const dropdown = document.getElementById('mboDropdown');

    // Toggle dropdown
    dropdownButton.addEventListener('click', function() {
        dropdown.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!dropdownButton.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });

    // Update button text when selections change
    const checkboxes = dropdown.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const selectedOptions = Array.from(checkboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.nextElementSibling.textContent.trim());
            
            if (selectedOptions.length > 0) {
                dropdownButton.querySelector('span').textContent = selectedOptions.join(', ');
            } else {
                dropdownButton.querySelector('span').textContent = 'Selecteer opleidingsniveau';
            }
        });
    });

    // Set initial button text
    const selectedOptions = Array.from(checkboxes)
        .filter(cb => cb.checked)
        .map(cb => cb.nextElementSibling.textContent.trim());
    
    if (selectedOptions.length > 0) {
        dropdownButton.querySelector('span').textContent = selectedOptions.join(', ');
    }
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const monthDropdownButton = document.getElementById('monthDropdownButton');
    const monthDropdown = document.getElementById('monthDropdown');

    // Toggle dropdown
    monthDropdownButton.addEventListener('click', function() {
        monthDropdown.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!monthDropdownButton.contains(event.target) && !monthDropdown.contains(event.target)) {
            monthDropdown.classList.add('hidden');
        }
    });

    // Update button text when selections change
    const monthCheckboxes = monthDropdown.querySelectorAll('input[type="checkbox"]');
    monthCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const selectedMonths = Array.from(monthCheckboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.nextElementSibling.textContent.trim());
            
            if (selectedMonths.length > 0) {
                monthDropdownButton.querySelector('span').textContent = selectedMonths.join(', ');
            } else {
                monthDropdownButton.querySelector('span').textContent = 'Selecteer startmaand';
            }
        });
    });

    // Set initial button text
    const selectedMonths = Array.from(monthCheckboxes)
        .filter(cb => cb.checked)
        .map(cb => cb.nextElementSibling.textContent.trim());
    
    if (selectedMonths.length > 0) {
        monthDropdownButton.querySelector('span').textContent = selectedMonths.join(', ');
    }
});
</script>
