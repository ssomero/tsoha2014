<?php
require '../views/ylapalkki.php'
?>



<div class="container">
    <h1>Reseptin ehdotus</h1>
    <form class="form-horizontal" role="form" action="ehdotus.php" method="POST">

        <div class="form-group">
            <label for="inputName">Nimi</label>
            <input type="text" class="form-control" id="inputName" placeholder="Drinkin nimi">
        </div>                        
        <div class="form-group">
            <p style="font-weight: bold">Aineosat:</p>
            <p class="help-block">Esim. 4cl vodka <br>(oikeassa versiossa tarkoitus,
                että määrä ja ainesosa ovat erillään...)
            </p>
            <label for="inputAinesosa1"></label>
            <input type="text" class="form-control" id="inputAinesosa1" placeholder="Määrä ja ainesosa">
        </div>
        <div class="form-group">
            <label for="inputAinesosa1"></label>
            <input type="text" class="form-control" id="inputAinesosa1" placeholder="Määrä ja ainesosa">                                
        </div>
        <div class="form-group">
            <label for="inputAinesosa1"></label>
            <input type="text" class="form-control" id="inputAinesosa1" placeholder="Määrä ja ainesosa">
        </div>
        <div class="form-group">
            <label for="inputAinesosa1"></label>
            <input type="text" class="form-control" id="inputAinesosa1" placeholder="Määrä ja ainesosa">
        </div>
    </form>
    <button type="submit" class="btn btn-success">Tallenna!</button>
    <a href="drinkit.php"><button type="button" class="btn btn-danger">Peruuta</button></a>
</div>
</body>
</html>
