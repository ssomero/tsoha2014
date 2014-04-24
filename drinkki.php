<?php
require_once 'libs/utilities.php';
require_once 'libs/models/Drinkki.php';
require_once 'libs/models/Juomalaji.php';
require_once 'libs/models/Ainesosa.php';
require_once 'libs/models/Drinkkimixer.php';
require_once 'libs/models/Vaihtoehtoisnimi.php';

$id = (int)$_GET['id'];
$drinkki = Drinkki::haeIDlla($id);
$drinkkimix = Drinkkimixer::listaaDrinkinAinesosat($id);
$muutnimet = Vaihtoehtoisnimi::haeDrinkinMuutNimet($id);

if($drinkki==NULL) {
    naytaNakyma('drinkit.php');
} else {
    naytaNakyma('drinkki.php', array('drinkki' => $drinkki, 'drinkkimix' => $drinkkimix, 'muutnimet' => $muutnimet));
}
?>


