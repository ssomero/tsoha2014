<div class='container'>
<h1>Tervetuloa drinkkiarkistoon!</h1>
            <p>Täällä voit hakea, selata, ehdottaa ja lisätä drinkkireseptejä. <br>
                Lisätäksesi drinkkejä sinun täytyy olla rekisteröitynyt käyttäjä. <br>
            </p>
            <?php if(!onkoKirjautunut()):?>
            <button type="button" class="btn btn-primary">Rekisteröidy</button>
            <?php endif; ?>
        </div>


