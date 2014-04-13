<div class="container">
    <h1>Drinkin ehdottaminen</h1>
    <p>Täytä alla olevat kentät huolellisesti ehdottaaksesi uutta reseptiä. </p>
    <form role="form" action="ehdotus.php" method="POST">
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
            <br>
            <label>Ainesosat</label>
            <div class="row">
                <div class="col-xs-1">
                    <input type="text" class="form-control" placeholder="Määrä" name="maara">
                </div>
                <div class="col-xs-1">
                    <input type="text" class="form-control" placeholder="cl, dl..." name="yksikko">
                </div>
                <div class="col-xs-4">
                    <input type="text" class="form-control" placeholder="Ainesosan nimi" name="ainesosa">
                </div>
            </div>

            <label for="inputOhjeet">Valmistusohjeet</label>
            <textarea class="form-control" rows="3" name="ohjeet"></textarea>
        </div>    
        <button type="submit" class="btn btn-success">Ehdota drinkkiä</button>
    </form>
</div>


