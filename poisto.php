<?php
require_once 'libs/models/Drinkki.php';
require_once 'libs/models/Juomalaji.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $drinkki = Drinkki::haeIDlla($_POST['id']);
    if ($drinkki->onkoKelvollinen()) {
        $drinkki->poistaDrinkki();
        header('Location: drinkit.php');
    }
}
?>