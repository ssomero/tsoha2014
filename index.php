<?php
require_once 'libs/utilities.php';
require_once 'libs/models/Kayttaja.php';
require_once 'libs/models/Drinkki.php';
$kayttaja = $_SESSION['kayttajanNimi'];
naytaNakyma('index.php', array('kayttaja' => $kayttaja));

?>
