<?php
require_once 'libs/utilities.php';
require_once 'libs/models/Drinkki.php';
require_once 'libs/models/Juomalaji.php';

if(!onKirjautunut()) {
  header('Location: login.php');
}

//katsotaan onko sivulle tultu post-pyynnöllä
if($_SERVER["REQUEST_METHOD"]== "POST"){
$uusidrinkki = new Drinkki();
$uusidrinkki->setNimi($_POST['drinkinNimi']);
$uusidrinkki->setJuomalaji_id($_POST['juomalaji_id']);
if($uusidrinkki->onkoKelvollinen()) {
    $uusidrinkki->lisaaKantaan();
    $_SESSION['viesti'] = "Drinkki lisätty onnistuneesti!";
    header('Location: drinkit.php');
} else {
    naytaNakyma('lisays.php', array('virheet' => $uusidrinkki->getVirheet()));
}
} else {
    naytaNakyma('lisays.php');
}


