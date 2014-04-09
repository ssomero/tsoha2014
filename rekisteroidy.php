<?php
require_once 'libs/utilities.php';
require_once 'libs/models/Kayttaja.php';

if (onkoKirjautunut()) {
    header('Location: index.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uusikayttaja = new Kayttaja();
    $uusikayttaja->setKayttajanimi($_POST['kayttajanimi']);
    $uusikayttaja->setSalasana($_POST['salasana']);
    $uusikayttaja->setEtunimi($_POST['etunimi']);
    $uusikayttaja->setSukunimi($_POST['sukunimi']);
    $uusikayttaja->setEmail($_POST['email']);

    if($uusikayttaja->onkoKayttajanimiOlemassa()) {
    naytaNakyma('rekisteroidy.php', array(
    'etunimi' => $uusikayttaja->getEtunimi(), 'sukunimi' => $uusikayttaja->getSukunimi(), 'email' => $uusikayttaja->getEmail(),
        'virhe' => "Valitsemasi käyttäjänimi on jo käytössä!"));
    } 
    elseif ($_POST['salasana'] != $_POST['salasana2']) {
        naytaNakyma('rekisteroidy.php', array(
    'kayttajanimi' => $uusikayttaja->getKayttajanimi(), 'etunimi' => $uusikayttaja->getEtunimi(), 'sukunimi' => $uusikayttaja->getSukunimi(), 'email' => $uusikayttaja->getEmail(),
        'virhe' => "Salasanat eivät täsmää"));
    }
 else {
    $uusikayttaja->luoKayttaja();
    $_SESSION['kirjautunut'] = $uusikayttaja->getKayttaja_id();
    $_SESSION['viesti'] = "Rekisteröityminen onnistui!";
    header('Location: index.php');
    }
    
} else {
    naytaNakyma('rekisteroidy.php');
}

?>
