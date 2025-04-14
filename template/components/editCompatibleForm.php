<?php

function form() {
    return isset($GLOBALS["editingPage"]) ? "div" : "form"; // TODO: iets beter uitvinden, want als wij gaan styling hebben die
    // afhankelijk is van de element type (bijv. div of form), gaat dit dat breken
}

?>