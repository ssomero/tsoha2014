<?php
require_once 'libs/utilities.php';
require_once 'libs/models/Drinkki.php';

if(currentUser()== '1') {
    $ehdotukset = Drinkki::listaaEhdotukset();
    naytaNakyma('ehdotukset.php', array('ehdotukset' => $ehdotukset));
} else {
    adminOikeudet();
    header('Location: index.php');
}

