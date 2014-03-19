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

            <h1>Drinkit</h1>
            <p><br>Tässä lista Drinkkiarkistosta löytyvistä resepteistä</p>
            <a href="ehdotus.php"><button type="button" class="btn btn-info">Ehdota reseptiä</button></a>

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
                    <td><a href="mojito.php">Mojito</a> </td>
                    <td>Vaalea rommi</td>
                    <td>cocktail</td>
                    <td>ylläpitäjä</td>
                </tr>
                <tr>
                    <td><a href="">Piña Colada</a></td>
                    <td>Vaalea rommi</td>
                    <td>cocktail</td>
                    <td>ylläpitäjä</td>
                </tr>
                <tr>
                    <td><a href="">Sitrusbooli</a></td>
                    <td>Vodka</td>
                    <td>booli</td>
                    <td>käyt123</td>
                </tr>
                <tr>
                    <td><a href="">ÄssäMix</a></td>
                    <td>Useita</td>
                    <td>shotti</td>
                    <td>ylläpitäjä</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
