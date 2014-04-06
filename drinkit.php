<?php 
require_once 'libs/utilities.php';
require_once 'libs/models/Drinkki.php';
$drinkit = Drinkki::listaaKaikkiDrinkit();
naytaNakyma('drinkit.php', array('drinkit' => $drinkit));
?>

