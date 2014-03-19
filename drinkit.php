<?php ?>
<html>
    <head>
        <title>Drinkit</title>
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
                <li class="active"><a href="drinkit.php">Drinkit</a></li>
            </ul>

            
            <p>Tässä lista Drinkkiarkistosta löytyvistä resepteistä</p>
            <button type="button" class="btn btn-default navbar-btn">Ehdota reseptiä</button>

            <div class="container">
                <table class="table table-striped">
            </div>
            <thead>
                <tr>
                    <th>Nimi</th>
                    <th>Pääainesosa</th>
                    <th>Juomalaji</th>
                    <th>Lisääjä</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mojito</td>
                    <td>Vaalea rommi</td>
                    <td>cocktail</td>
                    <td>ylläpitäjä</td>
                </tr>
                <tr>
                    <td>Piña Colada</td>
                    <td>Vaalea rommi</td>
                    <td>cocktail</td>
                    <td>ylläpitäjä</td>
                </tr>
                <tr>
                    <td>Sitrusbooli</td>
                    <td>Vodka</td>
                    <td>booli</td>
                    <td>käyt123</td>
                </tr>
                <tr>
                    <td>ÄssäMix</td>
                    <td>Useita</td>
                    <td>shotti</td>
                    <td>ylläpitäjä</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
