<?php ?>

<html>
    <head>
        <title></title>
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
                <li class="active"><a href="haku.php">Haku</a></li>
                <li><a href="drinkit.php">Drinkit</a></li>
            </ul>

            <h1>Drinkkireseptien hakeminen</h1>
            <p>Anna hakusanaksi esim. drinkin nimi tai jokin ainesosa</p>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="nimi, ainesosa,...">
                </div>
                <button type="submit" class="btn btn-primary">Hae</button>
            </form>
        </div>
    </body>
</html>