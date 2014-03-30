<?php

require_once 'libs/utilities.php';
require 'libs/models/kayttaja.php';

if (empty($_POST["username"])) {
    naytaNakyma("login.php", array(
        'virhe' => "Kirjautuminen epäonnistui! Et antanut käyttäjänimeä.",
    ));
}
$kayttajatunnus = $_POST["username"];

if (empty($_POST["password"])) {
    naytaNakyma("login.php", array(
        'kayttaja' => $kayttajatunnus,
        'virhe' => "Kirjautuminen epäonnistui! Et antanut salasanaa.",
    ));
}
$salasana = $_POST["password"];


$kayttaja = new Kayttaja();
$kayttaja = $kayttaja->etsiKayttajaTunnuksilla($kayttajatunnus, $salasana);

if ($kayttaja != null) {
    
    $_SESSION['kirjautunut'] = $kayttajatunnus;
    header('Location: index.php');
} else {
    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
    naytaNakyma("login.php", array(
        'kayttaja' => $kayttajatunnus,
        'virhe' => "Väärä käyttäjänimi tai salasana!",
    ));
}



