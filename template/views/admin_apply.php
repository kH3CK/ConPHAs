<?php

require_once("../src/imports/checkIfLoggedIn.php");
foreach ([$_POST["title"], $_POST["logo"], $_POST["font-link"], $_POST["font-code"]] as $key => $value) {
    $pdo->prepare("UPDATE texts SET text = ? WHERE id = ?")->execute([$value, ++$key]);
}
$newblogvalues = [];
foreach ($_POST as $key => $value) {
    $first5letters = substr($key, 0, 5);
    if ($first5letters == "page-") {
        $pdo->prepare("UPDATE pages SET title = ? WHERE id = ?")->execute([$value, substr($key, 5)]);
    } else if ($first5letters == "color") {
        $pdo->prepare("UPDATE colors SET hex = ? WHERE id = ?")->execute([substr($value, 1), substr($key, 6)]);
    } else if ($first5letters == "blog-") {
        $split = explode("-", $key);
        $splitkey = $split[1];
        $lastsplitvalue = $split[count($split) - 1];
        if ($lastsplitvalue == "new") {
            if ($value) { // zo dat het array leeg is en geldt als false voor een if als er geen data is voor een nieuwe blog
                $newblogvalues[$splitkey] = $value;
            }
        } elseif ($splitkey == "categories") {
            $pdo->prepare("DELETE FROM categories WHERE blog_id = ?")->execute([$lastsplitvalue]);
            foreach (explode(",,, ", $value) as $categoryName) {
                $pdo->prepare("INSERT INTO categories (blog_id, name) VALUES (?, ?)")->execute([$lastsplitvalue, $categoryName]);
            }
        } else {
            // ik weet dat direct data inserten in een prepated statement gaat tegen het doel van een prepared statement, maar dit is
            // onbelangrijk in deze situatie want alleen een admin kan naar deze pagina gaan
            $pdo->prepare("UPDATE blogs SET " . $splitkey . " = ? WHERE id = ?")->execute([$value, $lastsplitvalue]);
        }
    }
}
if ($newblogvalues) {
    $categories = $newblogvalues["categories"];
    unset($newblogvalues["categories"]);
    $haspublicationdate = $newblogvalues["publication_date"] != "";
    if (!$haspublicationdate) {
        unset($newblogvalues["publication_date"]);
    }
    $statement = $pdo->prepare("INSERT INTO blogs (title, preview_text, text, author" . ($haspublicationdate ? ", publication_date" : "") .
    ", image_link) VALUES (:title, :preview_text, :text, :author" . ($haspublicationdate ? ", :publication_date" : "") .
    ", :image_link)")->execute($newblogvalues);
    $id = $pdo->query("SELECT id FROM blogs ORDER BY id DESC LIMIT 1")->fetch()["id"];
    foreach (explode(",,, ", $categories) as $category) {
        $pdo->prepare("INSERT INTO categories (blog_id, name) VALUES (?, ?)")->execute([$id, $category]);
    }
}
header("Location: admin");
