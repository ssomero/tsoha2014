<?php
require_once 'libs/tietokantayhteys.php';

class Kayttaja {

    private $kayttaja_id;
    private $kayttajanimi;
    private $salasana;
    private $email;
    private $etunimi;
    private $sukunimi;

    public function _construct($kayttaja_id, $kayttajanimi, $salasana, $email, $etunimi, $sukunimi) {
        $this->kayttaja_id = $kayttaja_id;
        $this->kayttajanimi = $kayttajanimi;
        $this->salasana = $salasana;
        $this->email = $email;
        $this->etunimi = $etunimi;
        $this->sukunimi = $sukunimi;
    }

    function etsiKaikkiKayttajat() {
        $sql = "SELECT kayttaja_id, kayttajatunnus, salasana, email, etunimi, sukunimi FROM kayttaja";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $kayttaja = new Kayttaja();
            $kayttaja->setKayttaja_id($tulos->id);
            $kayttaja->setKayttajanimi($tulos->tunnus);
            $kayttaja->setSalanana($tulos->salasana);
            $kayttaja->setEmail($tulos->email);
            $kayttaja->setEtunimi($tulos->etunimi);
            $kayttaja->setSukunimi($tulos->sukunimi);

            //$array[] = $muuttuja; lisää muuttujan arrayn perään. 
            //Se vastaa melko suoraan ArrayList:in add-metodia.
            $tulokset[] = $kayttaja;
        }
        return $tulokset;
    }

    public function etsiKayttajaTunnuksilla($kayttajanimi, $salasana) {
        $sql = "SELECT * FROM  kayttaja "
                . "WHERE kayttajanimi=? AND salasana=? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kayttajanimi, $salasana));

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
            $kayttaja = new Kayttaja();
            $kayttaja->setKayttaja_id($tulos->kayttaja_id);
            $kayttaja->setKayttajanimi($tulos->kayttajanimi);
            $kayttaja->setSalasana($tulos->salasana);
            $kayttaja->setEmail($tulos->email);
            $kayttaja->setEtunimi($tulos->etunimi);
            $kayttaja->setSukunimi($tulos->sukunimi);

            return $kayttaja;
        }
    }

    public function onkoKayttajanimiOlemassa() {
        $sql = "SELECT * FROM kayttaja WHERE kayttajanimi=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->kayttajanimi));

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return false;
        } else {
            return true;
        }
    }

    public function luoKayttaja() {
        $sql = "INSERT INTO kayttaja (kayttajanimi, salasana, etunimi, sukunimi, email) VALUES(?, ?, ?, ?, ?) RETURNING kayttaja_id";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array($this->getKayttajanimi(), $this->getSalasana(), $this->getEtunimi(), $this->getSukunimi(), $this->getEmail()));
        if($ok) {
            $this->kayttaja_id = $kysely->fetchColumn();
        }
        return $ok;
    }

    public function setKayttaja_id($kayttaja_id) {
        $this->kayttaja_id = $kayttaja_id;
    }

    public function setKayttajanimi($kayttajanimi) {
        $this->kayttajanimi = $kayttajanimi;
    }

    public function setSalasana($salasana) {
        $this->salasana = $salasana;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setEtunimi($etunimi) {
        $this->etunimi = $etunimi;
    }

    public function setSukunimi($sukunimi) {
        $this->sukunimi = $sukunimi;
    }

    public function getKayttaja_id() {
        return $this->kayttaja_id;
    }

    public function getKayttajanimi() {
        return $this->kayttajanimi;
    }

    public function getSalasana() {
        return $this->salasana;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getEtunimi() {
        return $this->etunimi;
    }

    public function getSukunimi() {
        return $this->sukunimi;
    }

}
