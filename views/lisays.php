<div class="container">
    <h2>Drinkin lisääminen</h2>
    <p>Täytä alla olevat kentät huolellisesti lisätäksesi uuden reseptin. </p>
    <form role="form" action="lisays.php" method="POST">
        <div class="form-group">
            <div class="col-xs-4">
                <label for="inputName">Nimi</label>
                <input type="text" class="form-control" name="drinkinNimi" placeholder="Drinkin nimi" value="<?php echo $data->drinkinNimi; ?>">
                <br>
                <label>Vaihtoehtoinen nimi</label>
                <div id="kentta" class="form-inline">
                <input class="btn btn-warning" type="button" value="Lisää drinkille uusi kutsumanimi" onclick="lisaaNimiKentta('kentta')"/>
                </div>
                <label>Juomalaji</label>
                <select name="juomalaji_id" class="form-control">
                    <?php foreach (Juomalaji::listaaJuomalajit() as $juomalaji): ?>
                        <?php if ($data->juomalaji == $juomalaji->getJuomalaji_id()): ?>
                    <option value="<?php echo $juomalaji->getJuomalaji_id(); ?>" selected="selected"><?php echo $juomalaji->getNimi(); ?></option>
                        <?php else: ?>
                            <option value="<?php echo $juomalaji->getJuomalaji_id(); ?>"><?php echo $juomalaji->getNimi(); ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-xs-10">
                <br>
                <label>Ainesosat</label>
                <div id="kentat" class="form-inline">
                    <input class="form-control"  type='text' placeholder="Määrä" name='maarat[]'/> 
                    <input class="form-control" type='text' placeholder="cl, dl,..." name='yksikot[]'/> 
                    <input class="form-control" type="text"  placeholder="Ainesosa" name="ainekset[]"/>
                </div>

                <input class="btn btn-warning" type="button" value="Lisää uusi ainesosa" onClick="lisaaKentta('kentat');"/> 
                
            </div>

            <div class="col-xs-4">
                <br>
                <label for="inputOhjeet">Valmistusohjeet</label>
                <textarea class="form-control" rows="3" name="ohjeet"></textarea>
                <br>
                <button type="submit" class="btn btn-success">Lisää drinkki</button>        
                <a href="drinkit.php"><button type="button" class="btn btn-default">Peruuta</button></a>
                <br>
            </div>
        </div>    

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
    
    <script>
        var laskuri = 0;
        var max = 10;
        function lisaaNimiKentta(divName) {
            if(laskuri==max) {
                alert("Ei saa olla yli" + laskuri + "vaihtoehtoista nimeä!");
            } else {
                var nimidiv = document.createElement('div');
                nimidiv.innerHTML = "<input type='text' class='form-control' placeholder='Nimi' name='nimet[]'> "
                
                document.getElementById(divName).appendChild(nimidiv);
                laskuri++;
            }
        }
    </script>
</div>
