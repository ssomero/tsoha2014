<?php
require_once 'libs/tietokantayhteys.php';

class Vaihtoehtoisnimi {
    private $drinkki_id;
    private $nimi;
    
    function _construct($drinkki_id, $nimi) {
        $this->drinkki_id = $drinkki_id;
        $this->nimi = $nimi;
    }
    
    public function lisaaKantaan() {
        $sql = "INSERT INTO vaihtoehtoisnimi(drinkki_id, nimi) VALUES(?, ?)";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->getDrinkki_id(), $this->getNimi()));        
    }

    public static function haeDrinkinMuutNimet($drinkki_id) {
        $sql = "SELECT * FROM vaihtoehtoisnimi WHERE drinkki_id=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($drinkki_id));
        
        $tulokset = array();
        
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) AS $tulos) {
            $muunimi = new Vaihtoehtoisnimi();
            $muunimi->setDrinkki_id($tulos->drinkki_id);
            $muunimi->setNimi($tulos->nimi);
            $tulokset[] = $muunimi;
        } return $tulokset;
    }
    
    public static function onkoNimiOlemassa($nimi) {
        $sql = "SELECT count(*) FROM vaihtoehtoisnimi "
                . "WHERE nimi=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($nimi));
        $tulos = $kysely->fetchColumn();
        if($tulos > 0) {
            return true;
        } else { return FALSE; }
    }
    
    public function getDrinkki_id() {
        return $this->drinkki_id;
    }

    public function getNimi() {
        return $this->nimi;
    }

    public function setDrinkki_id($drinkki_id) {
        $this->drinkki_id = $drinkki_id;
    }

    public function setNimi($nimi) {
        $this->nimi = $nimi;
    }


    
}

