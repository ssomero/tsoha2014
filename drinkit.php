<?php 
require_once 'libs/utilities.php';
require_once 'libs/models/Drinkki.php';
require_once 'libs/models/Juomalaji.php';
$drinkit = Drinkki::listaaKaikkiDrinkit();
naytaNakyma('drinkit.php', array('drinkit' => $drinkit));
?>

