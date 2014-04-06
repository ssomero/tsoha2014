<?php

require_once 'libs/utilities.php';
require_once 'libs/models/Drinkki.php';
require_once 'libs/models/Juomalaji.php';


//katsotaan onko sivulle tultu post-pyynnöllä
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $drinkki = Drinkki::haeIDlla($_POST['id']);
    $drinkki->setNimi($_POST['drinkinNimi']);
    $drinkki->setJuomalaji_id($_POST['juomalaji_id']);
    if ($drinkki->onkoKelvollinen()) {
        $drinkki->muokkaaDrinkkia();
        header('Location: drinkit.php');
    } else {
        naytaNakyma('drinkit.php', array('virhe' => "Väärin"));
    }
} else {
    $drinkki = Drinkki::haeIDlla($_GET['id']);
    if (currentUser() != '1') {
        header('Location: login.php');
    } else {
        naytaNakyma('muokkaus.php', array('drinkki' => $drinkki));
    }
}