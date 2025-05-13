<?php

if (!isset($_GET["id"])) {
    header("Location: 404");
    exit;
}
require_once("../src/imports/connectToDatabase.php");
$statement = $pdo->prepare("SELECT * FROM blogs WHERE id = :id");
$statement->execute($_GET);
$blog = $statement->fetch();
if (!$blog) {
    header("Location: 404");
    exit;
}
require_once("../template/components/navbar.php");
require_once("../template/components/head.php");
require_once("../template/components/blog.php");

?>

<body class="bg-gray-50 min-h-screen flex flex-col">
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center py-4">
                <div class="flex items-center">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/ConPHAs-zenBc0eVBbFXSyYT7CoHnoI9PT9rK5.png" alt="ConPHAs Logo" class="h-12">
                </div>

                <?= getTextFromDatabase(1) ?>

    </header>

    <main class="d-flex">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <?php

            makeBlog($blog, false);

            ?>
        </div>

    </main>
</body>