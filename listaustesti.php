<?php 

$lista = array("Kissa", "Koira", "Hampurilainen", "Bussi", "Hevonen");
?><!DOCTYPE HTML>
<html>
  <head><title>Listaustesti</title></head>
  <body>
    <h1>Listaelementtitesti</h1>
    <ul>
    <?php foreach($lista as $asia) { ?>
      <li><?php echo $asia; ?></li>
    <?php } ?>
    </ul>
  </body>
</html>
