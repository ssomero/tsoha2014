<?php
require_once 'libs/utilities.php';
require_once 'libs/models/Drinkki.php';
require_once 'libs/models/Juomalaji.php';


if (!isset($_POST['submitted'])) {
    naytaNakyma('haku.php');
} else {
    $hakusana = strtolower($_POST['hakusana']);
    $haku = Drinkki::hakuKaikkialta($hakusana);
    naytaNakyma('haku.php', array('haku' => $haku));
}
?>

