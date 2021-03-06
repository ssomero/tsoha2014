<?php

require_once 'libs/tietokantayhteys.php';

class Ainesosa {

    private $ainesosa_id;
    private $nimi;

    public function __construct($ainesosa_id, $nimi) {
        $this->ainesosa_id = $ainesosa_id;
        $this->nimi = $nimi;
    }

    public static function onkoOlemassa($nimi) {
        $sql = "SELECT * FROM ainesosa WHERE nimi=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($nimi));
        $tulos = $kysely->fetch();
        if ($tulos[ainesosa_id] > 0) {
            return $tulos[ainesosa_id];
        } else {
            return false;
        }
    }

    public function lisaaKantaan() {
        $sql = "INSERT INTO ainesosa (nimi) VALUES(?) RETURNING ainesosa_id";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->getNimi()));
        return $kysely->fetchColumn();
    }
    
    public function poistaAinesosa() {
        $sql = "DELETE FROM ainesosa WHERE ainesosa_id=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->ainesosa_id));
    }
    
    public static function haeIDlla($ainesosa_id) {
        $sql = "SELECT * FROM ainesosa WHERE ainesosa_id=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($ainesosa_id));
        $tulos = $kysely->fetchObject();
        
        if($tulos==NULL) {
            return null;
        } else {
            $ainesosa = new Ainesosa();
            $ainesosa->setAinesosa_id($tulos->ainesosa_id);
            $ainesosa->setNimi($tulos->nimi);
            
            return $ainesosa;
        }
    }

    public function getAinesosa_id() {
        return $this->ainesosa_id;
    }

    public function getNimi() {
        return $this->nimi;
    }

    public function setAinesosa_id($ainesosa_id) {
        $this->ainesosa_id = $ainesosa_id;
    }

    public function setNimi($nimi) {
        $this->nimi = $nimi;
    }

}
