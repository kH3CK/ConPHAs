<!-- deze bestand is gebruikt voor verwerken van alles dat werd aangepast op de admin pagina. De hele pagina is een grote form
element die dan wordt gesubmit door Opslaan knop -->
<?php

require_once("../src/imports/checkIfLoggedIn.php");
if (!(isset($_POST["title"]) && isset($_POST["logo"]) && isset($_POST["font-link"]) && $_POST["font-code"])) {
    header("Location: admin");
    exit;
}
foreach ([$_POST["title"], $_POST["logo"], $_POST["font-link"], $_POST["font-code"]] as $key => $value) {
    $pdo->prepare("UPDATE texts SET text = ? WHERE id = ?")->execute([$value, ++$key]);
}
define("ALLOWED_BLOG_ROWS", [
    "title" => true,
    "author" => true,
    "image_link" => true,
    "categories" => true,
    "publication_date" => true,
    "preview_text" => true,
    "text" => true
]);
$newBlogValues = [];
foreach ($_POST as $key => $value) {
    $first5letters = substr($key, 0, 5);
    if ($first5letters == "page-") {
        $pdo->prepare("UPDATE pages SET title = ? WHERE id = ?")->execute([$value, substr($key, 5)]);
    } else if ($first5letters == "color") {
        $pdo->prepare("UPDATE colors SET hex = ? WHERE id = ?")->execute([substr($value, 1), substr($key, 6)]);
    } else if ($first5letters == "blog-") {
        $split = explode("-", $key);
        $splitKey = $split[1];
        $lastSplitValue = $split[count($split) - 1];
        if ($lastSplitValue == "new") {
            if ($value) { // zo dat het array leeg is en geldt als false voor een if als er geen data is voor een nieuwe blog
                $newBlogValues[$splitKey] = $value;
            }
        } elseif ($splitKey == "categories") {
            $newCategories = explode(",,, ", $value);
            $oldCategories = explode(",,, ", $_POST["blog-categories_old-" . $lastSplitValue]);
            if ($newCategories != $oldCategories) {
                foreach ($newCategories as $newCategory) {
                    $index = array_search($newCategory, $oldCategories);
                    if ($index) {
                        unset($oldCategories[$index]);
                    } else {
                        $pdo->prepare("INSERT INTO categories (blog_id, name) VALUES (?, ?)")->execute([$lastSplitValue, $newCategory]);
                    }
                }
                foreach ($oldCategories as $oldCategory) {
                    $pdo->prepare("DELETE FROM categories WHERE blog_id = ? AND name = ?")->execute([$lastSplitValue, $oldCategory]);
                }
            }
        } elseif ($splitKey != "categories_old" && isset(ALLOWED_BLOG_ROWS[$splitKey])) {
            $pdo->prepare("UPDATE blogs SET " . $splitKey . " = ? WHERE id = ?")->execute([$value, $lastSplitValue]);
        }
    }
}
if ($newBlogValues) {
    $categories = $newBlogValues["categories"];
    unset($newBlogValues["categories"]);
    $hasPublicationDate = $newBlogValues["publication_date"] != "";
    if (!$hasPublicationDate) {
        unset($newBlogValues["publication_date"]);
    }
    $statement = $pdo->prepare("INSERT INTO blogs (title, preview_text, text, author" . ($hasPublicationDate ? ", publication_date" : "") .
    ", image_link) VALUES (:title, :preview_text, :text, :author" . ($hasPublicationDate ? ", :publication_date" : "") .
    ", :image_link)")->execute($newBlogValues);
    $id = $pdo->query("SELECT id FROM blogs ORDER BY id DESC LIMIT 1")->fetch()["id"];
    foreach (explode(",,, ", $categories) as $category) {
        $pdo->prepare("INSERT INTO categories (blog_id, name) VALUES (?, ?)")->execute([$id, $category]);
    }
}
header("Location: admin");
