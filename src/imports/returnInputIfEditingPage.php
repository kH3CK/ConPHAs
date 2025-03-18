<?php

function returnInputIfEditingPage($text, $name) {
    return isset($GLOBALS["editingPage"]) ? '<input type="text" name="'.$name.'" value=\''.$text.
    '\'class="border border-black bg-primary-background">' : $text;
}

?>