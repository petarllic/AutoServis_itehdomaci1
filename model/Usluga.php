<?php

class Usluga {

    public $usluga_id;
    public $usluga_naziv;
    public $usluga_opis;
    public $usluga_cena;
    public $auto_servis_id;

    public function getUsluga_id() {
        return $this->usluga_id;
    }

    public function getUsluga_naziv() {
        return $this->usluga_naziv;
    }

    public function getUsluga_opis() {
        return $this->usluga_opis;
    }

    public function getUsluga_cena() {
        return $this->usluga_cena;
    }

    public function getAuto_servis_id() {
        return $this->auto_servis_id;
    }

    public function setUsluga_id($usluga_id) {
        $this->usluga_id = $usluga_id;
    }

    public function setUsluga_naziv($usluga_naziv) {
        $this->usluga_naziv = $usluga_naziv;
    }

    public function setUsluga_opis($usluga_opis) {
        $this->usluga_opis = $usluga_opis;
    }

    public function setUsluga_cena($usluga_cena) {
        $this->usluga_cena = $usluga_cena;
    }

    public function setAuto_servis_id($auto_servis_id) {
        $this->auto_servis_id = $auto_servis_id;
    }

    public static function vratiSvePodatkeIzBaze() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query('SELECT usluga_id, usluga_naziv, usluga_opis, usluga_cena, auto_servis_naziv 
                                        FROM auto_servis, usluga 
                                        WHERE auto_servis.auto_servis_id=usluga.auto_servis_id');
        $uslugaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $usluga = new usluga();
            $usluga->setUsluga_id($red['usluga_id']);
            $usluga->setUsluga_naziv($red['usluga_naziv']);
            $usluga->setUsluga_opis($red['usluga_opis']);
            $usluga->setUsluga_cena($red['usluga_cena']);
            $usluga->setAuto_servis_id($red['auto_servis_naziv']);
            array_push($uslugaNiz, $usluga);
        }
        return $uslugaNiz;
    }

    public static function sortAsc() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("SELECT usluga_id, usluga_naziv, usluga_opis, usluga_cena, auto_servis_naziv 
                                        FROM auto_servis, usluga 
                                        WHERE auto_servis.auto_servis_id=usluga.auto_servis_id
                                        ORDER BY usluga_id ASC");
        $uslugaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $usluga = new usluga();
            $usluga->setUsluga_id($red['usluga_id']);
            $usluga->setUsluga_naziv($red['usluga_naziv']);
            $usluga->setUsluga_opis($red['usluga_opis']);
            $usluga->setUsluga_cena($red['usluga_cena']);
            $usluga->setAuto_servis_id($red['auto_servis_naziv']);

            array_push($uslugaNiz, $usluga);
        }
        return $uslugaNiz;
    }

    public static function sortDesc() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("SELECT usluga_id, usluga_naziv, usluga_opis, usluga_cena, auto_servis_naziv 
                                        FROM auto_servis, usluga 
                                        WHERE auto_servis.auto_servis_id=usluga.auto_servis_id
                                        ORDER BY usluga_id DESC");
        $uslugaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $usluga = new usluga();
            $usluga->setUsluga_id($red['usluga_id']);
            $usluga->setUsluga_naziv($red['usluga_naziv']);
            $usluga->setUsluga_opis($red['usluga_opis']);
            $usluga->setUsluga_cena($red['usluga_cena']);
            $usluga->setAuto_servis_id($red['auto_servis_naziv']);

            array_push($uslugaNiz, $usluga);
        }
        return $uslugaNiz;
    }

    public static function vratiPoNazivu($pretraga) {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("SELECT usluga_id, usluga_naziv, usluga_opis, usluga_cena, auto_servis_naziv 
                                        FROM auto_servis, usluga 
                                        WHERE auto_servis.auto_servis_id=usluga.auto_servis_id and usluga_naziv LIKE '%$pretraga%'");
        $uslugaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $usluga = new usluga();
            $usluga->setUsluga_id($red['usluga_id']);
            $usluga->setUsluga_naziv($red['usluga_naziv']);
            $usluga->setUsluga_opis($red['usluga_opis']);
            $usluga->setUsluga_cena($red['usluga_cena']);
            $usluga->setAuto_servis_id($red['auto_servis_naziv']);

            array_push($uslugaNiz, $usluga);
        }
        return $uslugaNiz;
    }

    public function save() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("INSERT INTO usluga (usluga_naziv, usluga_opis, usluga_cena, auto_servis_id)
            VALUES ('$this->usluga_naziv', '$this->usluga_opis', '$this->usluga_cena', '$this->auto_servis_id')");
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }

    public static function obrisi($usluga_id) {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query('DELETE FROM usluga WHERE usluga_id=' . $usluga_id);
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }



}
