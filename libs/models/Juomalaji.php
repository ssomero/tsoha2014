<?php

require_once 'libs/tietokantayhteys.php';

class Juomalaji {

    private $juomalaji_id;
    private $nimi;

    public function __construct($juomalaji_id, $nimi) {
        $this->juomalaji_id = $juomalaji_id;
        $this->nimi = $nimi;
    }

    public function getJuomalaji_id() {
        return $this->juomalaji_id;
    }

    public function getNimi() {
        return $this->nimi;
    }

    public function setJuomalaji_id($juomalaji_id) {
        $this->juomalaji_id = $juomalaji_id;
    }

    public function setNimi($nimi) {
        $this->nimi = $nimi;
    }

    public static function listaaJuomalajit() {
        $sql = "SELECT * FROM juomalaji";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $juomalaji = new Juomalaji();
            $juomalaji->setJuomalaji_id($tulos->juomalaji_id);
            $juomalaji->setNimi($tulos->nimi);

            $tulokset[] = $juomalaji;
        }
        return $tulokset;
    }

}
