<div class='container'>
<h1>Tervetuloa drinkkiarkistoon!</h1>
            <p>Täällä voit hakea, selata, ehdottaa ja lisätä drinkkireseptejä. <br>
                Lisätäksesi drinkkejä sinun täytyy olla rekisteröitynyt käyttäjä. <br>
            </p>
            <?php if(!onkoKirjautunut()):?>
            <a href="rekisteroidy.php"><button type="button" class="btn btn-primary">Rekisteröidy</button></a>
            <?php endif; ?>
        </div>


