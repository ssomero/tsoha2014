<div class='container'>

    <?php if (isset($_SESSION['kirjautunut'])): ?>
        <h2>Hei <?php echo $data->kayttaja ?>!</h2>
        <p>Täällä voit hakea, selata, ehdottaa ja lisätä drinkkireseptejä.<br>
            Kirjautuneena käyttäjänä voit lisätä uusia drinkkireseptejä arkistoon! </p>
    <?php else : ?>
        <h2>Tervetuloa drinkkiarkistoon!</h2>
        <p>Täällä voit hakea, selata, ehdottaa ja lisätä drinkkireseptejä. <br>
            Lisätäksesi drinkkejä sinun täytyy olla rekisteröitynyt käyttäjä. <br>
        </p>
    <?php endif; ?>

    <?php if (!onkoKirjautunut()): ?>
        <a href="rekisteroidy.php"><button type="button" class="btn btn-primary">Rekisteröidy</button></a>
    <?php endif; ?>
</div>


