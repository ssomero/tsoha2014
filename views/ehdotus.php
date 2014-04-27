<div class="container">

    <form role="form" action="ehdotus.php" method="POST" class="form-horizontal">
        <div class="form-group"> 
            <h2>Drinkin ehdottaminen</h2>
            <p>Täytä alla olevat kentät huolellisesti ehdottaaksesi uutta reseptiä. </p>


            <div class="col-xs-4">
                <label>Nimi</label> 
                <input type="text" class="form-control" name="drinkinNimi" placeholder="Drinkin nimi">
                
                <br>
                <label>Vaihtoehtoinen nimi</label>
                <div id="kentta" class="form-inline">
                <input class="btn btn-warning" type="button" value="Lisää drinkille uusi kutsumanimi" onclick="lisaaNimiKentta('kentta')"/>
                </div>
                <label>Juomalaji</label>
                <select name="juomalaji_id" class="form-control">
                    <?php foreach (Juomalaji::listaaJuomalajit() as $juomalaji): ?>
                        <option value="<?php echo $juomalaji->getJuomalaji_id(); ?>"><?php echo $juomalaji->getNimi(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-xs-10">
                <br>
                <label>Ainesosat</label>
                <br>
                <div id="kentat" class="form-inline">
                    <input class="form-control"  type='text' placeholder="Määrä" name='maarat[]'/> 
                    <input class="form-control" type='text' placeholder="cl, dl,..." name='yksikot[]'/> 
                    <input class="form-control" type="text"  placeholder="Ainesosa" name="ainekset[]"/>
                </div>
                <input class="btn btn-warning" type="button" value="Lisää uusi ainesosa" onClick="lisaaKentta('kentat');"/> 
                <br>
            </div>
            <div class="col-xs-4">
                <br>
                <label>Valmistusohjeet</label>
                <textarea class="form-control" rows="3" name="ohjeet"></textarea>
            </div>
        </div>    
        <button type="submit" class="btn btn-success">Ehdota drinkkiä</button>
        <a href="drinkit.php"><button type="button" class="btn btn-default">Peruuta</button></a>
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


