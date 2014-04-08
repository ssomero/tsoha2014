<div class="container">
    <h2><?php echo $data->drinkki->getNimi(); ?> (<?php echo $data->drinkki->getJuomalaji();?>)</h2>
    
   <?php if(currentUser()=='1'): ?>
    
    <form role="form" action="poisto.php" method="POST">
        <div class="form-group">
            <a href="drinkit.php"><button type="button" class="btn btn-default">Palaa</button></a>
        </div>
        <div class="form-group">
            <a href="muokkaus.php?id=<?php echo $data->drinkki->getDrinkki_id();?>">
        <button type="button" class="btn btn-primary">Muokkaa</button></a>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger">Poista!</button>
            <input type="hidden" name="id" value="<?php echo $data->drinkki->getDrinkki_id();?>">
        </div>
        
    </form>
    <?php endif;?>   
    
</div>


