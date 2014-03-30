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
            <ul class="nav nav-tabs">
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
                <li><a href="login.php">Kirjaudu sisään</a></li>
            </ul>
        </div>
        <div class="container">
            <?php require 'views/' . $sivu; ?>
        </div>
        <div>
            <?php if (!empty($data->virhe)): ?>
                <div class="alert alert-danger"><?php echo $data->virhe; ?></div>
            <?php endif; ?>
        </div>
    </body>
</html>
