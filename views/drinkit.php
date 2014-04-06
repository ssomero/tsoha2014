<div class="container">
    <h1>Drinkit</h1>
    <p><br>Tässä lista Drinkkiarkistosta löytyvistä resepteistä</p>
    
    <?php if(isset($_SESSION['kirjautunut'])): ?>
    
    <a href="lisays.php"><button type="button" class="btn btn-primary">Lisää resepti</button></a>
    <?php endif; ?>
    
    
    <div class ="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nimi</th>
                    <th>Juomalaji</th>
                    <th>Lisääjä</th>
                    <th>Lisäämisaika</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data->drinkit as $drinkki): ?>
                <tr>
                    <td><a href="drinkki.php?drinkki_id=<?php echo $drinkki->getID()?>"><?php echo $drinkki->getNimi();?></a></td>
                    <td><?php echo $drinkki->getJuomalaji();?></td>
                    <td><?php echo $drinkki->getKayttaja();?></td>
                    <td><?php echo date('d-m-Y H:i',strtotime($drinkki->getLisaamisaika()));?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>            
        </table>
    </div>

</div>

