<?php

require_once 'libs/utilities.php';
require_once 'libs/models/Kayttaja.php';

if (currentUser() == '1') {
    $kayttajat = Kayttaja::etsiKaikkiKayttajat();
    naytaNakyma('kayttajat.php', array('kayttajat' => $kayttajat));
} else {
    adminOikeudet();
    header('Location: index.php');
}