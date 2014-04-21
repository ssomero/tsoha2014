<div class="col-xs-4"> 
    <h2>Rekisteröityminen</h2>
    <form action="rekisteroidy.php" method="POST" class="form-horizontal"> 
        Etunimi: <input type="text" class="form-control" name="etunimi" placeholder="Etunimi" value="<?php echo $data->etunimi?>"/> 
        Sukunimi: <input type="text" class="form-control" name="sukunimi" placeholder="Sukunimi" value="<?php echo $data->sukunimi?>"/>
        Sähköposti: <input type="email" class="form-control" name="email" placeholder="Sähköposti" value="<?php echo $data->email?>"/>
        Käyttäjänimi: <input type="text" class="form-control" name="kayttajanimi" placeholder="Käyttäjänimi" value="<?php echo $data->kayttajanimi?>"/>    
        Salasana: <input type="password" class="form-control" name="salasana" placeholder="Salasana"/>
        Salasana uudelleen: <input type="password" class="form-control" name="salasana2" placeholder="Salasana uudelleen"/>
        <input type="hidden" name="submitted" value="true">
        <br>
        <a href="index.php"><button type="button" class="btn btn-default">Peruuta</button></a>
        <button type="submit" class="btn btn-success">Rekisteröidy</button>
    </form>
    
    <!--    <form role="form">
        <div class="form-group">
            <label for="etunimi">Etunimi</label>
            <input type="text" class="form-control" id="etunimi" placeholder="Etunimi">
        </div>
        <div class="form-group">
            <label for="sukunimi">Sukunimi</label>
            <input type="text" class="form-control" id="sukunimi" placeholder="Sukunimi">
        </div>
        <div class="form-group">
            <label for="email">Sähköposti</label>
            <input type="email" class="form-control" id="kayttajanimi" placeholder="Sähköposti">
        </div>
        <div class="form-group">
            <label for="kayttajanimi">Käyttäjänimi</label>
            <input type="text" class="form-control" id="kayttajanimi" placeholder="Käyttäjänimi">
        </div>
        <div class="form-group">
            <label for="salasana">Salasana</label>
            <input type="password" class="form-control" id="kayttajanimi" placeholder="Salasana">
        </div>
        <button type="submit" class="btn btn-info">Rekisteröidy!</button>
    </form>-->
    
</div>

