<?php
require_once("../../template/components/head.php");
require_once("../../template/components/navbar.php");

// Haal stage informatie op
if (isset($_GET['id'])) {
    try {
        $statement = $pdo->prepare("SELECT * FROM internships WHERE id = :id");
        $statement->execute(['id' => $_GET['id']]);
        $internship = $statement->fetch();
        
        if (!$internship) {
            header("Location: stageplekken.php");
            exit();
        }
    } catch (PDOException $e) {
        // Log de error en redirect
        error_log("Database error: " . $e->getMessage());
        header("Location: stageplekken.php");
        exit();
    }
} else {
    header("Location: stageplekken.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hier komt later de verwerking van het formulier
    // Voor nu alleen een redirect
    header("Location: stageplekken.php");
    exit();
}
?>

<div class="container mx-auto p-4 mt-32">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6">Aanmelden voor <?= htmlspecialchars($internship["title"]) ?></h1>
        
        <form method="POST" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="firstname" class="block text-sm font-medium text-gray-700">Voornaam</label>
                    <input type="text" name="firstname" id="firstname" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-color focus:ring-primary-color">
                </div>
                
                <div>
                    <label for="lastname" class="block text-sm font-medium text-gray-700">Achternaam</label>
                    <input type="text" name="lastname" id="lastname" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-color focus:ring-primary-color">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">E-mailadres</label>
                <input type="email" name="email" id="email" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-color focus:ring-primary-color">
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Telefoonnummer</label>
                <input type="tel" name="phone" id="phone" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-color focus:ring-primary-color">
            </div>

            <div>
                <label for="birthdate" class="block text-sm font-medium text-gray-700">Geboortedatum</label>
                <input type="date" name="birthdate" id="birthdate" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-color focus:ring-primary-color">
            </div>

          
            <div>
                <label for="motivation" class="block text-sm font-medium text-gray-700">Motivatie</label>
                <textarea name="motivation" id="motivation" rows="4" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-color focus:ring-primary-color"
                    placeholder="Vertel ons waarom je geïnteresseerd bent in deze stage..."></textarea>
            </div>

            <div>
                <label for="cv" class="block text-sm font-medium text-gray-700">CV Upload</label>
                <input type="file" name="cv" id="cv" accept=".pdf,.doc,.docx" required
                    class="mt-1 block w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-md file:border-0
                    file:text-sm file:font-semibold
                    file:bg-primary-color file:text-white
                    hover:file:bg-primary-color-dark">
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                    class="bg-primary-color text-white px-6 py-2 rounded-lg hover:bg-primary-color-dark transition-colors">
                    Aanmelden
                </button>
            </div>
        </form>
    </div>
</div>
