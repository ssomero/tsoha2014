<div class="container">
    <h1>Drinkin lisääminen</h1>
    <p>Täytä alla olevat kentät huolellisesti lisätäksesi uuden reseptin.</p>
    <form role="form" action="lisays.php" method="POST">
        <div class="form-group">
            <label for="inputName">Nimi</label>
            <input type="text" class="form-control" name="drinkinNimi" placeholder="Drinkin nimi">
            <br>
            <label>Juomalaji</label>
            <select name="juomalaji_id">
                <?php foreach (Juomalaji::listaaJuomalajit() as $juomalaji): ?>
                    <option value="<?php echo $juomalaji->getJuomalaji_id(); ?>"><?php echo $juomalaji->getNimi(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>    
        <button type="submit" class="btn btn-success">Lisää drinkki</button>
    </form>
</div>
