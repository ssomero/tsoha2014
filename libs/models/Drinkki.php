<?php

require_once 'libs/tietokantayhteys.php';

class Drinkki {

    private $drinkki_id;
    private $nimi;
    private $juomalaji_id;
    private $lisaaja;
    private $lisaamisaika;
    private $virheet = array();

    public function _construct($drinkki_id, $nimi, $juomalaji_id, $lisaaja, $lisaamisaika) {
        $this->drinkki_id = $drinkki_id;
        $this->nimi = $nimi;
        $this->juomalaji_id = $juomalaji_id;
        $this->lisaaja = $lisaaja;
        $this->lisaamisaika = $lisaamisaika;
    }

    public function onkoKelvollinen() {
        if(trim($this->nimi)==null || trim($this->nimi=='')) {
            $this->virheet['nimi'] = "Drinkistä puuttuu nimi";
            return false;
        }
        else {
            return true;
        }
    }
    
    public function lisaaKantaan() {
        $sql = "INSERT INTO drinkki(nimi, juomalaji_id, lisaaja, lisaamisaika)"
                . "VALUES(?, ?, ?, ?) RETURNING drinkki_id";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array($this->getNimi(), $this->getJuomalaji_id(),
            $_SESSION['kirjautunut'], 'NOW()'));
        if($ok) {
            $this->drinkki_id = $kysely->fetchColumn();
        }
        return $ok;
    }
    
    public function muokkaaDrinkkia() {
        $sql = "UPDATE drinkki SET nimi = ?, juomalaji_id=?"
                . "WHERE drinkki_id=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->nimi, $this->juomalaji_id, $this->drinkki_id));             
    }
    
    public function poistaDrinkki() {
        $sql = "DELETE FROM drinkki WHERE drinkki_id=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->drinkki_id));
    }

    public static function listaaKaikkiDrinkit() {
        $sql = "SELECT * FROM drinkki";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();

        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $drinkki = new Drinkki();
            $drinkki->setDrinkki_id($tulos->drinkki_id);
            $drinkki->setNimi($tulos->nimi);
            $drinkki->setJuomalaji_id($tulos->juomalaji_id);
            $drinkki->setLisaaja($tulos->lisaaja);
            $drinkki->setLisaamisaika($tulos->lisaamisaika);

            $tulokset[] = $drinkki;
        }
        return $tulokset;
    }
    
    public function etsiAinesosat() {
        
        
    }

    public static function haku($hakusana) {
        $sql = "SELECT drinkki_id, nimi FROM drinkki, drinkkimixer, ainesosa"
                . "WHERE drinkki.drinkki_id=";
    }

    public static function haeIDlla($drinkki_id) {
        $sql = "SELECT * FROM drinkki WHERE drinkki_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($drinkki_id));

        $tulos = $kysely->fetchObject();

        if ($tulos == null) {
            return null;
        } else {
            $drinkki = new Drinkki();
            $drinkki->setDrinkki_id($tulos->drinkki_id);
            $drinkki->setNimi($tulos->nimi);
            $drinkki->setJuomalaji_id($tulos->juomalaji_id);
            $drinkki->setLisaaja($tulos->lisaaja);
            $drinkki->setLisaamisaika($tulos->lisaamisaika);

            return $drinkki;
        }
    }

    public function getKayttaja() {
        $sql = "SELECT kayttajanimi FROM kayttaja WHERE kayttaja_id=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->lisaaja));

        $kayttaja = $kysely->fetchObject();
        return $kayttaja->kayttajanimi;
    }

    public function getJuomalaji() {
        $sql = "SELECT nimi FROM juomalaji WHERE juomalaji_id=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->juomalaji_id));

        $juomalaji = $kysely->fetchObject();
        return $juomalaji->nimi;
    }

    public function setDrinkki_id($drinkki_id) {
        $this->drinkki_id = $drinkki_id;
    }

    public function setNimi($nimi) {
        $this->nimi = $nimi;
    }

    public function setJuomalaji_id($juomalaji_id) {
        $this->juomalaji_id = $juomalaji_id;
    }

    public function setLisaaja($lisaaja) {
        $this->lisaaja = $lisaaja;
    }

    public function setLisaamisaika($lisaamisaika) {
        $this->lisaamisaika = $lisaamisaika;
    }

    public function getDrinkki_id() {
        return $this->drinkki_id;
    }

    public function getNimi() {
        return $this->nimi;
    }

    public function getJuomalaji_id() {
        return $this->juomalaji_id;
    }

    public function getLisaaja() {
        return $this->lisaaja;
    }

    public function getLisaamisaika() {
        return $this->lisaamisaika;
    }
    
    public function getVirheet() {
        return $this->virheet;
    }

}

?>