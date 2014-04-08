<?php
require_once 'libs/utilities.php';

if(onkoKirjautunut()) {
    header('Location: index.php');
} else {
    naytaNakyma('rekisteroidy.php');
}

