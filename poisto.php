<?php
require_once 'libs/utilities.php';
require_once 'libs/models/Drinkki.php';
require_once 'libs/models/Juomalaji.php';
require_once 'libs/models/Ainesosa.php';
require_once 'libs/models/Drinkkimixer.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $drinkki = Drinkki::haeIDlla($_POST['id']);
//    $mix = Drinkkimixer::listaaDrinkinAinesosat($drinkki->getDrinkki_id());
    if ($drinkki->onkoKelvollinen()) {
        $drinkki->poistaDrinkki();
        //yritys poistaa samalla sellaiset ainesosat tauluista, joita ei ole muissa drinekissä
        //tää ei vielä toimi
//        foreach ($mix as $ainesosa) {
//            if(Drinkkimixer::onkoAinesosaaMuualla($ainesosa->getAinesosa_id())) {
//                continue;
//            } else {
//                $aine = Ainesosa::haeIDlla($ainesosa->getAinesosa_id());
//                $aine->poistaAinesosa();
//            }
        }
        header('Location: drinkit.php');
        $_SESSION['viesti'] = "Poisto onnistui";
    }

?>