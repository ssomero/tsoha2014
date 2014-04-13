<div class="container">
    <h1>Drinkin lisääminen</h1>
    <p>Täytä alla olevat kentät huolellisesti lisätäksesi uuden reseptin. </p>
    <form role="form" action="lisays.php" method="POST">
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
            <div id="kentat" class="form-inline">
                <input class="form-control"  type='text' placeholder="Määrä" name='maarat[]'/> 
                <input class="form-control" type='text' placeholder="cl, dl,..." name='yksikot[]'/> 
                <input class="form-control" type="text"  placeholder="Ainesosa" name="ainekset[]"/>

            </div>
            <input class="btn btn-default" type="button" value="Lisää uusi ainesosa" onClick="lisaaKentta('kentat');"/> 
            <br>
            <label for="inputOhjeet">Valmistusohjeet</label>
            <textarea class="form-control" rows="3" name="ohjeet"></textarea>
        </div>    
        <button type="submit" class="btn btn-success">Lisää drinkki</button>
    </form>

    <script>
        var laskuri = 1;
        var max = 10;
        function lisaaKentta(divName) {
            if (laskuri == max) {
                alert("Ei saa olla yli " + laskuri + " ainetta!");
            }
            else {
                var ainesdiv = document.createElement('div');
                var valintadiv = document.createElement('div');
                ainesdiv.innerHTML = "<input type='text' class='form-control' placeholder='Määrä' name='maarat[]'> <input type='text' class='form-control' placeholder='cl, dl...' name='yksikot[]'> <input type='text' class='form-control' placeholder='Ainesosa' name='ainekset[]'>";

                document.getElementById(divName).appendChild(ainesdiv);
                laskuri++;
            }
        }
    </script>
</div>
