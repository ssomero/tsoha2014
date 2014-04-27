<div class="container">
    
    <h2>Drinkin muokkaus</h2>

    <form role="form" action="muokkaus.php" method="POST">
        <div class="form-group">
            <div class="col-xs-4">
                <label for="inputName">Nimi</label>
                <input type="text" class="form-control" name="drinkinNimi" value="<?php echo ucfirst($data->drinkki->getNimi()); ?>">
                <input type="hidden" name="id" value="<?php echo $data->drinkki->getDrinkki_id(); ?>">
                <br>
                <label>Juomalaji</label>
                <select name="juomalaji_id" class="form-control">
                    <?php foreach (Juomalaji::listaaJuomalajit() as $juomalaji): ?>
                        <?php if ($juomalaji->getJuomalaji_id() == $data->drinkki->getJuomalaji_id()): ?>
                            <option value="<?php echo $juomalaji->getJuomalaji_id(); ?>" selected="selected"><?php echo $juomalaji->getNimi(); ?></option>
                        <?php else : ?>
                            <option value="<?php echo $juomalaji->getJuomalaji_id(); ?>"><?php echo $juomalaji->getNimi(); ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <br>
            </div>
            <div class="col-xs-10">

                <label>Ainesosat</label>
                <?php foreach ($data->ainekset as $mix): ?>
                    <div id="kentat" class="form-inline">

                        <input class="form-control"  type='text' placeholder="Määrä" name='maarat[]' value="<?php echo $mix->getMaara(); ?>"/> 
                        <input class="form-control" type='text' placeholder="cl, dl,..." name='yksikot[]' value="<?php echo $mix->getYksikko(); ?>"/> 
                        <input class="form-control" type="text"  placeholder="Ainesosa" name="ainekset[]" value="<?php echo $mix->getAinesosanNimi($mix->getAinesosa_id()); ?>" disabled/>
                        <input type="hidden" name="ainesosa_id[]" value="<?php echo $mix->getAinesosa_id(); ?>"/>
                    </div>
                <?php endforeach; ?>
                <br> 

            </div>
            <div class="col-xs-4">
                <label for="inputOhjeet">Valmistusohjeet</label>
                <textarea class="form-control" rows="3" name="ohjeet"><?php echo $data->drinkki->getOhjeet(); ?></textarea>
                <br>
                <button type="submit" class="btn btn-success">Muokkaa drinkkiä</button>
                <a href="drinkki.php?id=<?php echo $data->drinkki->getDrinkki_id(); ?>"><button type="button" class="btn btn-default">Peruuta</button></a>
            </div>
        </div>    

    </form>
    
    
</div>

