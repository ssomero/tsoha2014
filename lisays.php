<?php

require_once 'libs/utilities.php';
require_once 'libs/models/Drinkki.php';
require_once 'libs/models/Juomalaji.php';
require_once 'libs/models/Drinkkimixer.php';
require_once 'libs/models/Ainesosa.php';

if (!onKirjautunut()) {
    header('Location: login.php');
}

//katsotaan onko sivulle tultu post-pyynnöllä
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uusidrinkki = new Drinkki();
    $nimi = strtolower($_POST['drinkinNimi']);
    if (Drinkki::onkoNimiOlemassa($nimi)) {
        naytaNakyma('lisays.php', array('virhe' => "Nimeämäsi drinkki on jo olemassa!"));
    }
    $uusidrinkki->setNimi($nimi);
    $uusidrinkki->setJuomalaji_id($_POST['juomalaji_id']);
    $uusidrinkki->setOhjeet($_POST['ohjeet']);
    if ($uusidrinkki->onkoKelvollinen()) {
        $uusidrinkki->lisaaKantaan();
    } else {
        naytaNakyma('lisays.php', array('virheet' => $uusidrinkki->getVirheet()));
    }
    $ainekset = $_POST['ainekset'];
    $maarat = $_POST['maarat'];
    $yksikot = $_POST['yksikot'];
    $apu = 0;
    foreach ($ainekset as $aine) {
        if(empty($aine)) {
            naytaNakyma('lisays.php', array('virhe' => "Ainesosalta puuttuu nimi!"));
        }
        if(empty($maarat[$apu])) {
            naytaNakyma('lisays.php', array('virhe' => "Ainesosalta puuttuu määrä!"));
        }
        if(empty($yksikot[$apu])) {
            naytaNakyma('lisays.php', array('virhe' => "Ainesosalta puuttuu yksikkö!"));
        }
        $aine = strtolower($aine);
        if (Ainesosa::onkoOlemassa($aine) > 0) {
            $ainesosa_id = Ainesosa::onkoOlemassa($aine);            
        } else {
            $uusiainesosa = new Ainesosa();
            $uusiainesosa->setNimi($aine);
            $ainesosa_id = $uusiainesosa->lisaaKantaan();
        }
        $uusidrinkkimix = new Drinkkimixer();
        $uusidrinkkimix->setDrinkki_id($uusidrinkki->getDrinkki_id());
        $uusidrinkkimix->setAinesosa_id($ainesosa_id);
        $uusidrinkkimix->setMaara($maarat[$apu]);
        $uusidrinkkimix->setYksikko($yksikot[$apu]);
        $uusidrinkkimix->lisaaKantaan();
        $apu++;
    }
    $_SESSION['viesti'] = "Drinkki lisätty onnistuneesti";
    header('Location: drinkit.php');
} else {
    naytaNakyma('lisays.php');
}


    