<?php

class AutoServis {

    public $auto_servis_id = 0;
    public $auto_servis_naziv = '';

    public function getAuto_servis_id() {
        return $this->auto_servis_id;
    }

    public function getAuto_servis_naziv() {
        return $this->auto_servis_naziv;
    }

    public function setAuto_servis_id($auto_servis_id) {
        $this->auto_servis_id = $auto_servis_id;
    }

    public function setAuto_servis_naziv($auto_servis_naziv) {
        $this->auto_servis_naziv = $auto_servis_naziv;
    }

    public static function vratiSvePodatkeIzBaze() {
        include 'konekcija.php';
        $podaciIzBaze = $mysqli->query('SELECT * FROM auto_servis');
        $autoServisNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $auto_servis = new AutoServis();
            $auto_servis->setAuto_servis_id($red['auto_servis_id']);
            $auto_servis->setAuto_servis_naziv($red['auto_servis_naziv']);
            array_push($autoServisNiz, $auto_servis);
        }
        return $autoServisNiz;
    }

    public function save() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("INSERT INTO auto_servis (auto_servis_naziv)
            VALUES ('$this->auto_servis_naziv')");
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }

    public static function obrisi($auto_servis_id) {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query('DELETE FROM auto_servis WHERE auto_servis_id=' . $auto_servis_id);
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }

}

