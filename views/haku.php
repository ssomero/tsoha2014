<div class="container">
    <h2>Drinkkireseptien hakeminen</h2>
    <p>Anna hakusanaksi esim. drinkin nimi tai jokin ainesosa</p>

    <form class="navbar-form navbar-left" role="search" action="haku.php" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="nimi, ainesosa,..." name="hakusana">
            <input type="hidden" name="submitted" value="true">
        </div>
        <button type="submit" class="btn btn-primary">Hae</button>
    </form>
</div>



<div class="container">
    <?php if (isset($_POST['submitted'])): ?>  
        <?php if ($data->haku == null): ?>
            <div class="container">
                <p>Hakusanalla ei löytynyt tuloksia</p>
            </div>
        <?php else: ?>
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
                    <?php foreach ($data->haku as $tulos): ?>
                    <?php if($tulos->getEhdotus()!=true): ?>
                        <tr>
                            <td><a href="drinkki.php?id=<?php echo $tulos->getDrinkki_id() ?>"><?php echo ucfirst($tulos->getNimi()); ?></a></td>
                            <td><?php echo $tulos->getJuomalaji(); ?></td>
                            <?php if ($tulos->getKayttaja() == null): ?>
                                <td> ------- </td>
                            <?php else: ?>
                                <td><?php echo $tulos->getKayttaja(); ?></td>
                            <?php endif; ?>

                            <td><?php echo date('d-m-Y H:i', strtotime($tulos->getLisaamisaika())); ?></td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>             
            </table>
        <?php endif; ?>
    <?php endif; ?>
</div>





