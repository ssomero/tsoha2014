<?php
session_start();

function naytaNakyma($sivu, $data=array()) {
    $data = (object)$data;
    require 'views/sivupohja.php';
    exit();
}
?>