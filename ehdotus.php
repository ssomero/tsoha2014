<?php

require_once 'libs/utilities.php';
require_once 'libs/models/Drinkki.php';
require_once 'libs/models/Juomalaji.php';
require_once 'libs/models/Drinkkimixer.php';
require_once 'libs/models/Vaihtoehtoisnimi.php';
require_once 'libs/models/Ainesosa.php';

if (onkoKirjautunut()) {
    header('Location: drinkit.php');
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uusidrinkki = new Drinkki();
    $nimi = strtolower($_POST['drinkinNimi']);
    $ainekset = $_POST['ainekset'];
    $maarat = $_POST['maarat'];
    $yksikot = $_POST['yksikot'];
    $nimet = $_POST['nimet'];
    
    if (Drinkki::onkoNimiOlemassa($nimi)) {
        naytaNakyma('ehdotus.php', array('virhe' => "Nimeämäsi drinkki on jo olemassa!"));
    } else if (Vaihtoehtoisnimi::onkoNimiOlemassa($nimi)) {
        naytaNakyma('drinkit.php', array('virhe' => "Drinkki löytyy Drinkkiarkistosta jo toisella nimellä. Voit hakea drinkin tällä nimellä."));
    }
    $uusidrinkki->setNimi($nimi);
    $uusidrinkki->setJuomalaji_id($_POST['juomalaji_id']);
    $uusidrinkki->setOhjeet($_POST['ohjeet']);
    $uusidrinkki->setEhdotus(TRUE);
    if ($uusidrinkki->onkoKelvollinen()) {
        $uusidrinkki->lisaaKantaan();
        
        foreach ($nimet as $vaihtnimi) {
            if (empty($vaihtnimi)) {
                $uusidrinkki->poistaDrinkki();
                naytaNakyma('ehdotus.php', array('virhe' => "Yritit lisätä tyhjän vaihtoehtoisen nimen!",
                    'drinkinNimi' => $uusidrinkki->getNimi(), 'juomalaji' => $uusidrinkki->getJuomalaji_id()));
            }
            $vaihtnimi = strtolower($vaihtnimi);
            $vnimi = new Vaihtoehtoisnimi();
            $vnimi->setNimi($vaihtnimi);
            $vnimi->setDrinkki_id($uusidrinkki->getDrinkki_id());
            $vnimi->lisaaKantaan();
        }
        
        $apu = 0;
        foreach ($ainekset as $aine) {
            if (empty($aine) && empty($maarat[$apu]) && empty($yksikot[$apu])) {
                $uusidrinkki->poistaDrinkki();
                naytaNakyma('ehdotus.php', array('virhe' => "Yritit lisätä tyhjän ainesosan!",
                    'drinkinNimi' => $uusidrinkki->getNimi(), 'juomalaji' => $uusidrinkki->getJuomalaji_id()));
            }
            if (empty($aine)) {
                $uusidrinkki->poistaDrinkki();
                naytaNakyma('ehdotus.php', array('virhe' => "Ainesosalta puuttuu nimi!",
                    'drinkinNimi' => $uusidrinkki->getNimi(), 'juomalaji' => $uusidrinkki->getJuomalaji_id()));
            }
            if (empty($maarat[$apu])) {
                $uusidrinkki->poistaDrinkki();
                naytaNakyma('ehdotus.php', array('virhe' => "Ainesosalta puuttuu määrä!",
                    'drinkinNimi' => $uusidrinkki->getNimi(), 'juomalaji' => $uusidrinkki->getJuomalaji_id()));
            }
            if (empty($yksikot[$apu])) {
                $uusidrinkki->poistaDrinkki();
                naytaNakyma('ehdotus.php', array('virhe' => "Ainesosalta puuttuu yksikkö!",
                    'drinkinNimi' => $uusidrinkki->getNimi(), 'juomalaji' => $uusidrinkki->getJuomalaji_id()));
            }
            if (empty($aine) && empty($maarat[$apu]) && empty($yksikot[$apu])) {
                $uusidrinkki->poistaDrinkki();
                naytaNakyma('ehdotus.php', array('virhe' => "Yritit lisätä tyhjän ainesosan!"));
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
        
        $_SESSION['viesti'] = "Drinkin ehdotus onnistui. Ylläpitäjän täytyy vielä hyväksyä resepti, ennen kuin se on luettavissa Drinkkiarkistossa.";
        header('Location: drinkit.php');
    } else {
        naytaNakyma('ehdotus.php', array('virheet' => $uusidrinkki->getVirheet()));
    }
} else {
    naytaNakyma('ehdotus.php');
}
?>

