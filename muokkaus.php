<?php

require_once 'libs/utilities.php';
require_once 'libs/models/Drinkki.php';
require_once 'libs/models/Juomalaji.php';
require_once 'libs/models/Drinkkimixer.php';
require_once 'libs/models/Ainesosa.php';


//katsotaan onko sivulle tultu post-pyynnöllä
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $drinkki = Drinkki::haeIDlla($_POST['id']);
    $ainekset = Drinkkimixer::listaaDrinkinAinesosat($_POST['id']);
    $ainesosat = $_POST['ainekset'];
    $yksikot = $_POST['yksikot'];
    $maarat = $_POST['maarat'];
    $idt = $_POST['ainesosa_id'];
    $uusinimi = strtolower($_POST['drinkinNimi']);
    $drinkki->setNimi($uusinimi);
    $drinkki->setJuomalaji_id($_POST['juomalaji_id']);
    $drinkki->setOhjeet($_POST['ohjeet']);

    if ($drinkki->onkoKelvollinen()) {
        $drinkki->muokkaaDrinkkia();

        $apu = 0;
        foreach ($ainesosat as $aine) {
            if (empty($aine) && empty($maarat[$apu]) && empty($yksikot[$apu])) {                
                naytaNakyma('muokkaus.php', array('virhe' => "Yritit muokata ainesosan tyhjäksi!",
                    'drinkki' => $drinkki, 'ainekset' => $ainekset));
            }
            if (empty($aine)) {
                
                naytaNakyma('muokkaus.php', array('virhe' => "Ainesosalta puuttuu nimi!",
                    'drinkki' => $drinkki, 'ainekset' => $ainekset));
            }
            if (empty($maarat[$apu])) {
                
                naytaNakyma('muokkaus.php', array('virhe' => "Ainesosalta puuttuu määrä!",
                    'drinkki' => $drinkki, 'ainekset' => $ainekset));
            }
            if (empty($yksikot[$apu])) {
                
                naytaNakyma('muokkaus.php', array('virhe' => "Ainesosalta puuttuu yksikkö!",
                    'drinkki' => $drinkki, 'ainekset' => $ainekset));
            }            
            $aine = strtolower($aine);
                       
            $muokattava = new Drinkkimixer();
            $muokattava->setAinesosa_id($idt[$apu]);
            $muokattava->setDrinkki_id($drinkki->getDrinkki_id());
            $muokattava->setMaara($maarat[$apu]);
            $muokattava->setYksikko($yksikot[$apu]);
            $muokattava->muokkaaDrinkkiMix();
            $apu++;
        }

        header('Location: drinkit.php');
        $_SESSION['viesti'] = "Muokkaus onnistui";
    } else {
        naytaNakyma('drinkit.php', array('virhe' => "Väärin"));
    }
} else {
    $drinkki = Drinkki::haeIDlla($_GET['id']);
    $drinkkimixer = Drinkkimixer::listaaDrinkinAinesosat($_GET['id']);

    if (currentUser() != '1') {
        adminOikeudet();
        header('Location: index.php');
    } else {
        naytaNakyma('muokkaus.php', array('drinkki' => $drinkki, 'ainekset' => $drinkkimixer));
    }
}