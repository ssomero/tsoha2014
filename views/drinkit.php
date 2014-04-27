<div class="container">
    <h2>Drinkit</h2>
    <p>Drinkkiarkistossa on tällä hetkellä <?php echo $data->montako ?> reseptiä.</p>

    <?php if (isset($_SESSION['kirjautunut'])): ?>    
        <a href="lisays.php"><button type="button" class="btn btn-primary">Lisää resepti</button></a>
    <?php else : ?>
        <a href="ehdotus.php"><button type="button" class="btn btn-primary">Ehdota reseptiä</button></a>
    <?php endif; ?>


    <div class ="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><a href="drinkit.php?jarj=nimi">Nimi</a></th>
                    <th><a href="drinkit.php?jarj=juomalaji">Juomalaji</a></th>
                    <th>Lisääjä</th>
                    <th>Lisäämisaika</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data->drinkit as $drinkki): ?>
                    <tr>
                        <td><a href="drinkki.php?id=<?php echo $drinkki->getDrinkki_id() ?>"><?php echo ucfirst($drinkki->getNimi()); ?></a></td>
                        <td><?php echo $drinkki->getJuomalaji(); ?></td>
                        <?php if ($drinkki->getKayttaja() == null): ?>
                            <td> ------- </td>
                        <?php else: ?>
                            <td><?php echo $drinkki->getKayttaja(); ?></td>
                        <?php endif; ?>
                        <td><?php echo date('d-m-Y H:i', strtotime($drinkki->getLisaamisaika())); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>            
        </table>
    </div>

</div>

