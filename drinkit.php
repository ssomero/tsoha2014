<?php 
require_once 'libs/utilities.php';
require_once 'libs/models/Drinkki.php';
require_once 'libs/models/Juomalaji.php';
$montako = Drinkki::laskeDrinkit();


if($_GET['jarj']=='nimi') {
    $drinkit = Drinkki::listaaKaikkiDrinkit();
    naytaNakyma('drinkit.php', array('drinkit' => $drinkit, 'montako' => $montako));
} elseif ($_GET['jarj']=='juomalaji') {
    $drinkki = Drinkki::listaaJuomalajinMukaan();
    naytaNakyma('drinkit.php', array('drinkit' => $drinkki, 'montako' => $montako));
} else {
    $drinkit = Drinkki::listaaKaikkiDrinkit();
naytaNakyma('drinkit.php', array('drinkit' => $drinkit, 'montako' => $montako));
}
?>

