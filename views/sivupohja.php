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
            <!--            <form class="navbar-form navbar-right" role="form" action="login.php" method="POST">
                            <div class="form-group">
                                <input type="text" placeholder="Käyttäjätunnus" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Salasana" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success">Kirjaudu sisään!</button>
                        </form>-->
            <ul class="nav navbar-nav">
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php'): ?>
                    class='active'
                    <?php endif; ?>
                    ><a href="index.php">Etusivu</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'haku.php'): ?>
                        class='active'
                    <?php endif; ?>
                    ><a href="haku.php">Haku</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'drinkit.php'): ?>
                        class='active'
                    <?php endif; ?>
                    ><a href="drinkit.php">Drinkit</a></li>
                <?php if(currentUser()== '1'): ?>
                <li><a href="ehdotukset.php">Ehdotukset <span class="badge"><?php echo Drinkki::ehdotustenMaara();?></span></a></li>
                <?php endif; ?>
                <?php if(currentUser()== '1'): ?>
                <li><a href="kayttajat.php">Käyttäjät</a></li>
                <?php endif; ?>
            </ul>            
            <ul class="nav navbar-right">
                <?php if (!onkoKirjautunut()) : ?>
                    <li><a href="login.php">Kirjaudu sisään</a></li>
                <?php else : ?>
                    <li><a href="logout.php">Kirjaudu ulos</a></li>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-right">
                <?php if (onkoKirjautunut()): ?>
                    <li><a href="omasivu.php">Muokkaa omia käyttäjätietoja</a></li>
                <?php endif; ?>
            </ul>
        </div>        
        <div class="container">
            <?php if (!empty($_SESSION['viesti'])): ?>
                <div class="alert alert-success"><?php echo $_SESSION['viesti']; ?></div>
                <?php unset($_SESSION['viesti']); ?>
            <?php endif; ?>
        </div>
        <div class="container">
            <?php if (!empty($_SESSION['virhe'])): ?>
                <div class="alert alert-warning"><?php echo $_SESSION['virhe']; ?></div>
                <?php unset($_SESSION['virhe']); ?>
            <?php endif; ?>
        </div>
        <div class="container">
            <?php require 'views/' . $sivu; ?>
        </div>
        <div class="container">
            <?php if (!empty($data->virhe)): ?>
                <div class="alert alert-danger"><?php echo $data->virhe; ?></div>
            <?php endif; ?>
        </div>
        <div class="container">
            <?php if (!empty($data->virheet)): ?>
                <?php foreach ($data->virheet as $virhe): ?>
                    <div class="alert alert-danger"><?php echo $virhe; ?></div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </body>
</html>
