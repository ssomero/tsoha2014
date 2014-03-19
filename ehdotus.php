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
                            <label for="inputName" class="col-md-2 control-label">Nimi</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="inputName" name="text" placeholder="drinkin nimi">
                            </div>
                        </div>

                </div>

                </form>
        </div>
    </body>
</html>
