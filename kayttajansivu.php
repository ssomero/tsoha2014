<?php
require_once 'libs/utilities.php';
require_once 'libs/models/Kayttaja.php';

if (currentUser() == '1') {
    $kayt = Kayttaja::etsiKayttajaIDlla($_GET['id']);
    naytaNakyma('kayttajansivu.php', array('kayttaja' => $kayt));
} else {
    adminOikeudet();
    header('Location: index.php');
}

