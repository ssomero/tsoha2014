<?php

require_once 'libs/tietokantayhteys.php';

class Drinkki {

    private $drinkki_id;
    private $nimi;
    private $juomalaji_id;
    private $lisaaja;
    private $lisaamisaika;
    private $ohjeet;
    private $ehdotus;
    private $virheet = array();

    public function _construct($drinkki_id, $nimi, $juomalaji_id, $lisaaja, $lisaamisaika, $ohjeet, $ehdotus) {
        $this->drinkki_id = $drinkki_id;
        $this->nimi = $nimi;
        $this->juomalaji_id = $juomalaji_id;
        $this->lisaaja = $lisaaja;
        $this->lisaamisaika = $lisaamisaika;
        $this->ohjeet = $ohjeet;
        $this->ehdotus = $ehdotus;
    }

    public function onkoKelvollinen() {
        if (trim($this->nimi) == null || trim($this->nimi == '')) {
            $this->virheet['nimi'] = "Drinkistä puuttuu nimi";
            return false;
        } else {
            return true;
        }
    }

    public function lisaaKantaan() {
        $sql = "INSERT INTO drinkki(nimi, juomalaji_id, lisaaja, lisaamisaika, ohjeet, ehdotus)"
                . "VALUES(?, ?, ?, ?, ?, ?) RETURNING drinkki_id";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array($this->getNimi(), $this->getJuomalaji_id(),
            $_SESSION['kirjautunut'], 'NOW()', $this->getOhjeet(), $this->getEhdotus()));
        if ($ok) {
            $this->drinkki_id = $kysely->fetchColumn();
        }
        return $ok;
    }

    public function muokkaaDrinkkia() {
        $sql = "UPDATE drinkki SET nimi = ?, juomalaji_id=?, ohjeet=?, ehdotus=? "
                . "WHERE drinkki_id=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->nimi, $this->juomalaji_id, $this->ohjeet, $this->ehdotus, $this->drinkki_id));
    }

    public function poistaDrinkki() {
        $sql = "DELETE FROM drinkki WHERE drinkki_id=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->drinkki_id));
    }

    public static function listaaKaikkiDrinkit() {
        $sql = "SELECT * FROM drinkki WHERE ehdotus IS NOT TRUE "
                . "ORDER BY nimi";
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
            $drinkki->setOhjeet($tulos->ohjeet);

            $tulokset[] = $drinkki;
        }
        return $tulokset;
    }
    
    public static function listaaJuomalajinMukaan() {
        $sql = "SELECT distinct drinkki.nimi, drinkki.drinkki_id, drinkki.juomalaji_id, lisaaja, lisaamisaika, ohjeet FROM drinkki, juomalaji "
                . "WHERE ehdotus IS NOT TRUE "
                . "ORDER BY drinkki.juomalaji_id, drinkki.nimi";
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
            $drinkki->setOhjeet($tulos->ohjeet);

            $tulokset[] = $drinkki;
        }
        return $tulokset;
        
    }

    public static function listaaEhdotukset() {
        $sql = "SELECT * FROM drinkki WHERE ehdotus = TRUE";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();
        $tulos = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $drinkki = new Drinkki();
            $drinkki->setDrinkki_id($tulos->drinkki_id);
            $drinkki->setNimi($tulos->nimi);
            $drinkki->setJuomalaji_id($tulos->juomalaji_id);
            $drinkki->setLisaaja($tulos->lisaaja);
            $drinkki->setLisaamisaika($tulos->lisaamisaika);
            $drinkki->setOhjeet($tulos->ohjeet);
            $drinkki->setEhdotus($tulos->ehdotus);

            $tulokset[] = $drinkki;
        }
        return $tulokset;
    }
    
    public static function haeEhdotusIDlla($drinkki_id) {
        $sql = "SELECT * FROM drinkki WHERE drinkki_id = ? AND "
                . "ehdotus = TRUE";
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
            $drinkki->setOhjeet($tulos->ohjeet);
            $drinkki->setEhdotus($tulos->ehdotus);

            return $drinkki;
        }
    }

        public static function haku($hakusana) {
//        $haku = strtolower($hakusana);
        $sql = "SELECT * FROM drinkki "
                . "WHERE ehdotus IS NOT TRUE AND "
                . "nimi LIKE ? "
                . "ORDER BY nimi";

        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array("%$hakusana%"));

        $tulokset = array();

        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $drinkki = new Drinkki();
            $drinkki->setDrinkki_id($tulos->drinkki_id);
            $drinkki->setNimi($tulos->nimi);
            $drinkki->setJuomalaji_id($tulos->juomalaji_id);
            $drinkki->setLisaaja($tulos->lisaaja);
            $drinkki->setLisaamisaika($tulos->lisaamisaika);
            $drinkki->setOhjeet($tulos->ohjeet);

            $tulokset[] = $drinkki;
        } return $tulokset;
    }

    public static function hakuKaikkialta($hakusana) {      

        $sql = "SELECT distinct drinkki.drinkki_id, drinkki.nimi, juomalaji_id, lisaaja, lisaamisaika, ohjeet FROM "
                . "drinkki, drinkkimixer, ainesosa, vaihtoehtoisnimi WHERE "
                . "ehdotus IS NOT TRUE AND "
                . "drinkki.drinkki_id = drinkkimixer.drinkki_id AND "
                . "ainesosa.ainesosa_id = drinkkimixer.ainesosa_id AND ("               
                . "ainesosa.nimi LIKE ? OR "
                . "(vaihtoehtoisnimi.nimi LIKE ? AND vaihtoehtoisnimi.drinkki_id = drinkki.drinkki_id) OR " 
                . "drinkki.nimi LIKE ? ) "
                . "ORDER BY drinkki.nimi";

        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array("%$hakusana%", "%$hakusana%", "%$hakusana%"));

        $tulokset = array();

        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $drinkki = new Drinkki();
            $drinkki->setDrinkki_id($tulos->drinkki_id);
            $drinkki->setNimi($tulos->nimi);
            $drinkki->setJuomalaji_id($tulos->juomalaji_id);
            $drinkki->setLisaaja($tulos->lisaaja);
            $drinkki->setLisaamisaika($tulos->lisaamisaika);
            $drinkki->setOhjeet($tulos->ohjeet);

            $tulokset[] = $drinkki;
        } return $tulokset;
    }

    public static function onkoNimiOlemassa($nimi) {
        $sql = "SELECT count(*) FROM drinkki WHERE nimi=? AND "
                . "ehdotus=false";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($nimi));
        $tulos = $kysely->fetchColumn();
        if ($tulos > 0) {
            return true;
        } else {
            return FALSE;
        }
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
            $drinkki->setOhjeet($tulos->ohjeet);
            $drinkki->setEhdotus($tulos->ehdotus);

            return $drinkki;
        }
    }
    
    public static function ehdotustenMaara() {
        $sql = "SELECT count(*) FROM drinkki WHERE ehdotus = TRUE";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();
        $tulos = $kysely->fetchColumn();
        return $tulos;
    }
    
    public static function laskeDrinkit() {
        $sql = "SELECT count(*) FROM drinkki WHERE ehdotus IS NOT TRUE";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();
        $tulos = $kysely->fetchColumn();
        return $tulos;
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

    public function setOhjeet($ohjeet) {
        $this->ohjeet = $ohjeet;
    }

    public function getOhjeet() {
        return $this->ohjeet;
    }
    public function getEhdotus() {
        return $this->ehdotus;
    }

    public function setEhdotus($ehdotus) {
        $this->ehdotus = $ehdotus;
    }


}

?>