<?php ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <form class="navbar-form navbar-right" role="form">
                <div class="form-group">
                    <input type="text" placeholder="Käyttäjätunnus" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Salasana" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Kirjaudu sisään!</button>
            </form>
            <ul class="nav nav-tabs">
                <li><a href="html-demo.html">Etusivu</a></li>
                <li><a href="haku.php">Haku</a></li>
                <li><a href="drinkit.php">Drinkit</a></li>
            </ul>

            <body>
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
