<?php
require_once 'libs/tietokantayhteys.php';

class Drinkkimixer {
    private $drinkki_id;
    private $ainesosa_id;
    private $maara;
    private $yksikko;
    
    function __construct($drinkki_id, $ainesosa_id, $maara, $yksikko) {
        $this->drinkki_id = $drinkki_id;
        $this->ainesosa_id = $ainesosa_id;
        $this->maara = $maara;
        $this->yksikko = $yksikko;
    }
   
    
    public static function listaaDrinkinAinesosat($drinkki_id) {
        $sql = "SELECT * FROM drinkkimixer "
                . "WHERE drinkki_id=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($drinkki_id));
        
        $tulokset = array();
        
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $drinkkimix = new Drinkkimixer();
            $drinkkimix->setDrinkki_id($tulos->drinkki_id);
            $drinkkimix->setAinesosa_id($tulos->ainesosa_id);
            $drinkkimix->setMaara($tulos->maara);
            $drinkkimix->setYksikko($tulos->yksikko);
            $tulokset[] = $drinkkimix;            
        } return $tulokset;
    }
    
    public function lisaaKantaan() {
        $sql = "INSERT INTO drinkkimixer(ainesosa_id, drinkki_id, yksikko, maara) VALUES(?, ?, ?, ?)";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->getAinesosa_id(), $this->getDrinkki_id(), $this->getYksikko(), $this->getMaara()));        
    }
    
    public function muokkaaDrinkkiMix() {
        $sql = "UPDATE drinkkimixer SET ainesosa_id = ?, maara=?, yskikko=?"
                . "WHERE drinkki_id=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->ainesosa_id, $this->maara, $this->yksikko));             
    }
    
    public static function getAinesosanNimi($ainesosa_id) {
       $sql = "SELECT nimi FROM ainesosa WHERE ainesosa_id=?";
       $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($ainesosa_id));

        $ainesosa = $kysely->fetchObject();
        return $ainesosa->nimi;
    }

    public function getDrinkki_id() {
        return $this->drinkki_id;
    }

    public function getAinesosa_id() {
        return $this->ainesosa_id;
    }

    public function getMaara() {
        return $this->maara;
    }

    public function getYksikko() {
        return $this->yksikko;
    }

    public function setDrinkki_id($drinkki_id) {
        $this->drinkki_id = $drinkki_id;
    }

    public function setAinesosa_id($ainesosa_id) {
        $this->ainesosa_id = $ainesosa_id;
    }

    public function setMaara($maara) {
        $this->maara = $maara;
    }

    public function setYksikko($yksikko) {
        $this->yksikko = $yksikko;
    }

        //put your code here
}
