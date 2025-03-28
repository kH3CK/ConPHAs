<?php

if (!isset($GLOBALS["editingPage"])) {
    require_once("../src/imports/connectToDatabase.php");
    require_once("../src/imports/getTextFromDatabase.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="<?=getTextFromDatabase(3)?>">
    <style>
        body {
            font-family: <?=getTextFromDatabase(4)?>;
        }
        <?php

        foreach ($pdo->query("SELECT * FROM colors") as $color) {
            foreach (["text" => "color", "bg" => "background-color", "border" => "border-color", "border-t" => "border-top-color",
            "border-r" => "border-right-color", "border-l" => "border-left-color", "border-b" => "border-bottom-color"] as $name => $code) {
                echo "." . $name . "-" . str_replace(" ", "-", strtolower($color["name"])) . " { " . $code . ": #" . $color["hex"] . "; }\n";
            }
        }

        ?>
    </style>
    <title>
        <?php

        $statement = $pdo->prepare("SELECT title FROM pages WHERE filename = ?");
        $statement->execute([substr($uri, 1)]);
        $result = $statement->fetch();
        echo $result ? $result["title"] : $pdo->query("SELECT text FROM texts WHERE id = 1")->fetch()["text"];

        ?>
    </title>
</head>
<body>
<?php

}

?>