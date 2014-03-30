<div class="container">
    <br>
    <form action="login.php" method="POST" class="form-inline">    
        Käyttäjänimi: <input type="text" class="form-control" name="username" value="<?php echo $data->kayttaja; ?>"/>    
        Salasana: <input type="password" class="form-control" name="password" />
        <input type="hidden" name="submitted" value="true">
        <button type="submit" class="btn btn-success">Kirjaudu</button>
    </form>
</div>

