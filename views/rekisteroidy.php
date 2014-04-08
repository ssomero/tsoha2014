<div class="container">
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
    
    <form action="rekisteroidy.php.php" method="POST" class="form-horizontal"> 
        Etunimi: <input type="text" class="form-control" name="etunimi" placeholder="Etunimi"/> 
        Sukunimi: <input type="text" class="form-control" name="sukunimi" placeholder="Sukunimi"/>
        Sähköposti: <input type="email" class="form-control" name="email" placeholder="Sähköposti"/>
        Käyttäjänimi: <input type="text" class="form-control" name="kayttajanimi" placeholder="Käyttäjänimi"/>    
        Salasana: <input type="password" class="form-control" name="salasana" placeholder="Salasana"/>
        <input type="hidden" name="submitted" value="true">
        <button type="submit" class="btn btn-success">Kirjaudu</button>
    </form>
    
</div>

