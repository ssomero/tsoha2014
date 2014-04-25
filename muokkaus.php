<?php
require_once 'libs/utilities.php';
require_once 'libs/models/Drinkki.php';
require_once 'libs/models/Juomalaji.php';
require_once 'libs/models/Drinkkimixer.php';


//katsotaan onko sivulle tultu post-pyynnöllä
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $drinkki = Drinkki::haeIDlla($_POST['id']);
    $drinkkimixer = Drinkkimixer::listaaDrinkinAinesosat($_POST['id']);
    $uusinimi = strtolower($_POST['drinkinNimi']);
    $drinkki->setNimi($uusinimi);    
    $drinkki->setJuomalaji_id($_POST['juomalaji_id']);
    $drinkki->setOhjeet($_POST['ohjeet']);
    if ($drinkki->onkoKelvollinen()) {
        $drinkki->muokkaaDrinkkia();
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