<div class="container">
    <h2><?php echo $data->drinkki->getNimi(); ?> (<?php echo $data->drinkki->getJuomalaji(); ?>)</h2>
    <h3>Ainesosat:</h3>  
    <ul>
        <?php foreach ($data->drinkkimix as $drinkkimix): ?>
        <li><?php echo $drinkkimix->getMaara()?> <?php echo $drinkkimix->getYksikko()?> <?php echo $drinkkimix->getAinesosanNimi($drinkkimix->getAinesosa_id())?> </li>            
        <?php endforeach; ?>
    </ul>
    <p><?php echo $data->drinkki->getOhjeet() ?></p>

    <?php if (currentUser() == '1'): ?>

        <form role="form" action="poisto.php" method="POST">
            <div class="form-group">
                <a href="drinkit.php"><button type="button" class="btn btn-default">Palaa</button></a>
            </div>
            <div class="form-group">
                <a href="muokkaus.php?id=<?php echo $data->drinkki->getDrinkki_id(); ?>">
                    <button type="button" class="btn btn-primary">Muokkaa</button></a>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger">Poista!</button>
                <input type="hidden" name="id" value="<?php echo $data->drinkki->getDrinkki_id(); ?>">
            </div>

        </form>
    <?php endif; ?>   

</div>


