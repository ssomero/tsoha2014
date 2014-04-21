<?php
session_start();

function naytaNakyma($sivu, $data=array()) {
    $data = (object)$data;
    require 'views/sivupohja.php';
    exit();
}

function onKirjautunut() {
    if(isset($_SESSION['kirjautunut'])) {
        return true;
    } else {
        header('Location: login.php');
    }
}

function onkoKirjautunut() {
    if(isset($_SESSION['kirjautunut'])) {
        return true;
    } else {
        return false;
    }
}

function currentUser() {
    if(isset($_SESSION['kirjautunut'])) {
        return $_SESSION['kirjautunut'];
    }
}

function adminOikeudet() {
    $_SESSION['virhe'] = "Sivu, jonka yritit ladata vaatii ylläpitäjän oikeudet";
}
?>