<?php 
//require_once(libs(models(kayttaja.php))) . '/tietokantayhteys.php'; 

//Lista asioista array-tietotyyppiin laitettuna:
//$lista = Kayttaja::etsiKaikkiKayttajat();
$lista = array("Kissa", "Koira", "Omena", "Banaani", "vesi");
?>
<!DOCTYPE HTML>
<html>
  <head><title>Listaustesti</title></head>
  <body>
    <h1>Listaelementtitesti</h1>
    <ul>
    <?php foreach($lista as $asia) { ?>
        <li><?php echo $asia; ?></li>
    <?php } ?>
    </ul>
<!--    <p>Jostain syystä en saanut tietokannasta tänne listausta käyttäjä-taulusta ja aika loppui kesken jotta ongelma olisi ratkennut...
        <br>Ohjeet tuntuivat aika epäselviltä</p>    -->
  </body>
</html>
