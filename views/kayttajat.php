<div class="container">
    <h2>Drinkkiarkistoon rekisteröityneet käyttäjät</h2>
    <table class="table table-striped table-condensed">
        <?php foreach ($data->kayttajat as $kayttaja): ?>

            <tr>
                <?php if ($kayttaja->getKayttaja_id() != '1'): ?>
                    <td><form role="form" action="kayttajansivu.php" method="POST">    
                            <input type="hidden" name="kayttaja_id" value="<?php echo $kayttaja->getKayttaja_id(); ?>">
                            <a href="kayttajansivu.php?id=<?php echo $kayttaja->getKayttaja_id(); ?>"> <?php echo $kayttaja->getKayttajanimi(); ?></a> 
                        </form></td>            
                    <td><form role="form" action="kaytpoisto.php" method="POST">

                            <button type="submit" class="btn btn-danger btn-sm">
                                <span class="glyphicon glyphicon-trash"></span> Poista käyttäjä
                            </button>
                            <input type="hidden" name="kayttaja_id" value="<?php echo $kayttaja->getKayttaja_id(); ?>">
                        </form></td>
                <?php endif; ?>
            </tr>

        <?php endforeach; ?>

    </table>
</div>
