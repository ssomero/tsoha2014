<?php

require_once 'libs/utilities.php';
require_once 'libs/models/Drinkki.php';
require_once 'libs/models/Juomalaji.php';
require_once 'libs/models/Ainesosa.php';
require_once 'libs/models/Drinkkimixer.php';
require_once 'libs/models/Vaihtoehtoisnimi.php';

$id = (int) $_GET['id'];
$drinkki = Drinkki::haeIDlla($id);
$drinkkimix = Drinkkimixer::listaaDrinkinAinesosat($id);
$muutnimet = Vaihtoehtoisnimi::haeDrinkinMuutNimet($id);
$ehdotus = Drinkki::haeEhdotusIDlla($id);

if ($drinkki == NULL && $ehdotus != NULL && currentUser() == '1') {
    naytaNakyma('drinkki.php', array('drinkki' => $ehdotus, 'drinkkimix' => $drinkkimix, 'muutnimet' => $muutnimet));
} elseif ($drinkki != NULL) {
    naytaNakyma('drinkki.php', array('drinkki' => $drinkki, 'drinkkimix' => $drinkkimix, 'muutnimet' => $muutnimet));
} else {
    header("Location: drinkit.php");
}
?>


