<div class="container">
    
    <form role="form" action="omasivu.php" method="POST">
        <h2>Muokkaa omia käyttäjätietoja</h2>
        <div class="col-xs-4">
            
            <h3>Omat tiedot:</h3>    
            Etunimi: <input type="text" class="form-control" name="etunimi" value="<?php echo $data->kayttajaolio->getEtunimi(); ?>">
            Sukunimi: <input type="text" class="form-control" name="sukunimi" value="<?php echo $data->kayttajaolio->getSukunimi(); ?>">
            Sähköposti: <input type="email" class="form-control" name="email" value="<?php echo $data->kayttajaolio->getEmail(); ?>">
            <br>
<!--            <h4>Vaihda tilin salasana</h4>    
            Nykyinen salasana: <input type="password" class="form-control" name="nyksalasana">
            Uusi salasana: <input type="password" class="form-control" name="uusisalasana">
            Uusi salasana uudelleen: <input type="password" class="form-control" name="uusisalasana2">    

            <br>-->
            <a href="index.php"><button type="button" class="btn btn-default">Peruuta</button></a>
            <button type="submit" class="btn btn-success">Tallenna muutokset</button>
            <br><br>
            <?php if (currentUser() != '1'): ?>
                <button type="submit" class="btn btn-danger">Poista tili</button>
            <?php endif; ?>
        </div>
    </form>
</div>

