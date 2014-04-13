<?php
require_once 'libs/utilities.php';
require_once 'libs/models/Drinkki.php';
require_once 'libs/models/Juomalaji.php';
require_once 'libs/models/Drinkkimixer.php';

if(onkoKirjautunut()) {
  header('Location: drinkit.php');
}
if($_SERVER["REQUEST_METHOD"]== "POST"){
$uusidrinkki = new Drinkki();
$uusidrinkki->setNimi($_POST['drinkinNimi']);
$uusidrinkki->setJuomalaji_id($_POST['juomalaji_id']);
$uusidrinkki->setOhjeet($_POST['ohjeet']);
$uusidrinkkimix = new Drinkkimixer();
$uusidrinkkimix->setDrinkki_id($uusidrinkki->getDrinkki_id());
if($uusidrinkki->onkoKelvollinen()) {
    $uusidrinkki->lisaaKantaan();
    $uusidrinkkimix->lisaaKantaan();
    $_SESSION['viesti'] = "Drinkin ehdotus onnistui";
    header('Location: drinkit.php');
} else {
    naytaNakyma('ehdotus.php', array('virheet' => $uusidrinkki->getVirheet()));
}
} else {
    naytaNakyma('ehdotus.php');
}

?>

