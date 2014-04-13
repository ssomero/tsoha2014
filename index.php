 
<?php
require_once 'libs/utilities.php';
$kayttaja = $_SESSION['kayttajanNimi'];
naytaNakyma('index.php', array('kayttaja' => $kayttaja));

?>
