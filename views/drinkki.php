<div class="container">
    <h2><?php echo $data->drinkki->getNimi(); ?> (<?php echo $data->drinkki->getJuomalaji();?>)</h2>
   <?php if(currentUser()=='1'): ?>
    <a href="muokkaus.php?id=<?php echo $data->drinkki->getDrinkki_id()?>" ><button type="button" class="btn btn-primary">Muokkaa</button></a>
    <?php endif;?>   
    
</div>


