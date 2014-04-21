<?php
require_once 'libs/utilities.php';
require_once 'libs/models/Kayttaja.php';

if(currentUser()=='1') {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $poistettava = Kayttaja::etsiKayttajaIDlla($_POST['kayttaja_id']);
    $poistettava->poistaKayttaja();
    header('Location: kayttajat.php');
    $_SESSION['viesti'] = "Käyttäjätilin poisto onnistui";
} else {
    $_SESSION['virhe'] = "Yrittämäsi sivun lataaminen ei onnistu. Valitse allaolevista käyttäjistä se, jonka haluat poistaa.";
    header('Location: kayttajat.php');
}
}
 else {
    adminOikeudet();
    header('Location: index.php');
}
