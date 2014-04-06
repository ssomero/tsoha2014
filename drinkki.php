<?php
require_once 'libs/utilities.php';
require_once 'libs/models/Drinkki.php';

$id = (int)$_GET['id'];
$drinkki = Drinkki::haeIDlla($id);

if($drinkki==NULL) {
    naytaNakyma('drinkit.php');
} else {
    naytaNakyma('drinkki.php', array('drinkki' => $drinkki));
}
?>


