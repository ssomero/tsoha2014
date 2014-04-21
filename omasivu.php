<?php
require_once 'libs/utilities.php';
require_once 'libs/models/Kayttaja.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kayt = Kayttaja::etsiKayttajaIDlla($_SESSION['kirjautunut']);
    $uusietunimi = $_POST['etunimi'];
    $uusisukunimi = $_POST['sukunimi'];
    $uusiemail = $_POST['email'];
    if (empty($uusietunimi)) {
        naytaNakyma('omasivu.php', array('kayttajaolio' => $kayt, 'virhe' => "Etunimi ei saa olla tyhjä!"));
    } else if (empty($uusisukunimi)) {
        naytaNakyma('omasivu.php', array('kayttajaolio' => $kayt, 'virhe' => "Sukunimi ei saa olla tyhjä!"));
    } else if (empty($uusiemail)) {
        naytaNakyma('omasivu.php', array('kayttajaolio' => $kayt, 'virhe' => "Sähköposti ei saa olla tyhjä!"));
    } else {
        $kayt->setEtunimi($uusietunimi);
        $kayt->setSukunimi($uusisukunimi);
        $kayt->setEmail($uusiemail);
        $kayt->muokkaaKayttajaa();
        $_SESSION['kayttajanNimi'] = $uusietunimi;        
        header('Location: index.php');
        $_SESSION['viesti'] = "Tietojen muokkaus onnistui";
    }
    
    
//    if ($_POST['salasana'] != $_POST['salasana2']) {
//        naytaNakyma('rekisteroidy.php', array(
//    'kayttajanimi' => $uusikayttaja->getKayttajanimi(), 'etunimi' => $uusikayttaja->getEtunimi(), 'sukunimi' => $uusikayttaja->getSukunimi(), 'email' => $uusikayttaja->getEmail(),
//        'virhe' => "Salasanat eivät täsmää"));
//    }
}

if (!onkoKirjautunut()) {
    header('Location: login.php');
} else {
    $kayt = Kayttaja::etsiKayttajaIDlla($_SESSION['kirjautunut']);
    naytaNakyma('omasivu.php', array('kayttajaolio' => $kayt));
}

