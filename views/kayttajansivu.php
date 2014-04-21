<div class="col-xs-3">
    <h2>Käyttäjän tiedot</h2>
    <form role="form" action="kayttajansivu.php" method="POST">
        <fieldset disabled>
            <div class="form-group">
                
                    Käyttäjänimi <input type="text" class="form-control"  value="<?php echo $data->kayttaja->getKayttajanimi(); ?>">
                    Etunimi <input type="text" class="form-control" value="<?php echo $data->kayttaja->getEtunimi(); ?>">
                    Sukunimi <input type="text" class="form-control" value="<?php echo$data->kayttaja->getSukunimi(); ?>">
                    Sähköposti <input type="text" class="form-control" value="<?php echo$data->kayttaja->getEmail(); ?>">
                    <input type="hidden" name="kayttaja_id" value="<?php echo $data->kayttaja->getKayttaja_id(); ?>">
                
            </div>
        </fieldset>
    </form>
    <form role="form" action="kaytpoisto.php" method="POST">
        <a href="kayttajat.php"><button type="button" class="btn btn-default">Palaa käyttäjälistaan</button></a>
        <button type="submit" class="btn btn-danger">Poista käyttäjä</button>
        <input type="hidden" name="kayttaja_id" value="<?php echo $data->kayttaja->getKayttaja_id(); ?>">
    </form>
</div>