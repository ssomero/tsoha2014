<?php

require_once 'libs/utilities.php';
require 'libs/models/kayttaja.php';

if (empty($_POST["username"])) {
    naytaNakyma("login.php", array(
        'virhe' => "Kirjautuminen epäonnistui! Et antanut käyttäjänimeä.",
    ));
}
$kayttaja = $_POST["username"];

if (empty($_POST["password"])) {
    naytaNakyma("login.php", array(
        'kayttaja' => $kayttaja,
        'virhe' => "Kirjautuminen epäonnistui! Et antanut salasanaa.",
    ));
}
$salasana = $_POST["password"];


$kayt = new Kayttaja();
$kayt = $kayt->etsiKayttajaTunniksilla($kayttaja, $salasana);
if ($kayt != null) {
    header('Location: index.php');
} else {
    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
    naytaNakyma("login.php", array(
        'kayttaja' => $kayttaja,
        'virhe' => "Väärä käyttäjänimi tai salasana!",
    ));
}



