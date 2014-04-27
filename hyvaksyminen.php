<?php
require_once 'libs/utilities.php';
require_once 'libs/models/Drinkki.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $drinkki_id = $_POST['id'];
    $drinkki = Drinkki::haeEhdotusIDlla($drinkki_id);
    $drinkki->setEhdotus(0);
    $drinkki->muokkaaDrinkkia();
    $_SESSION['viesti'] = "Drinkki hyväksytty";
    header('Location: drinkit.php');
}

