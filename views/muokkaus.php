<div class="container">
    <h1>Drinkin muokkaus</h1>

    <form role="form" action="muokkaus.php" method="POST">
        <div class="form-group">
            <label for="inputName">Nimi</label>
            <input type="text" class="form-control" name="drinkinNimi" value="<?php echo $data->drinkki->getNimi(); ?>">
            <input type="hidden" name="id" value="<?php echo $data->drinkki->getDrinkki_id(); ?>">
            <br>
            <label>Juomalaji</label>
            <select name="juomalaji_id">
                <?php foreach (Juomalaji::listaaJuomalajit() as $juomalaji): ?>
                    <?php if ($juomalaji->getJuomalaji_id() == $data->drinkki->getJuomalaji_id()): ?>
                        <option value="<?php echo $juomalaji->getJuomalaji_id(); ?>" selected="selected"><?php echo $juomalaji->getNimi(); ?></option>
                    <?php else : ?>
                        <option value="<?php echo $juomalaji->getJuomalaji_id(); ?>"><?php echo $juomalaji->getNimi(); ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <br>
            
            <label for="inputOhjeet">Valmistusohjeet</label>
            <textarea class="form-control" rows="3" name="ohjeet"><?php echo $data->drinkki->getOhjeet(); ?></textarea>
        </div>    
        <button type="submit" class="btn btn-success">Muokkaa drinkkiä</button>
        <a href="drinkki.php?id=<?php echo $data->drinkki->getDrinkki_id(); ?>"><button type="button" class="btn btn-default">Peruuta</button></a>
    </form>
</div>

