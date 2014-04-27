<div class="container">
<h2>Ehdotukset</h2>

<?php if($data->ehdotukset == NULL): ?>
<p>Ei ehdotettuja drinkkejä. </p>
<?php else: ?>
<table class="table table-striped">
            <thead>
                <tr>
                    <th>Nimi</th>
                    <th>Juomalaji</th>                    
                    <th>Lisäämisaika</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data->ehdotukset as $drinkki): ?>
                    <?php if ($drinkki->getEhdotus() == true): ?>
                        <tr>
                            <td><a href="drinkki.php?id=<?php echo $drinkki->getDrinkki_id(); ?>"><?php echo ucfirst($drinkki->getNimi()); ?></a></td>
                            <td><?php echo $drinkki->getJuomalaji(); ?></td>
                                                           
                            <td><?php echo date('d-m-Y H:i', strtotime($drinkki->getLisaamisaika())); ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>            
        </table>
<?php endif; ?>

</div>

