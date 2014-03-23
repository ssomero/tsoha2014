<?php

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

}
