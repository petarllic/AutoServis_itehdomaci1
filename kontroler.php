<?php
include 'model/AutoServis.php';
include 'model/Usluga.php';

if (isset($_GET['auto_servis']) && $_GET['auto_servis'] == 'prikaz') {
    echo json_encode(AutoServis::vratiSvePodatkeIzBaze());
}

if (isset($_GET['usluga']) && $_GET['usluga'] == 'prikaz') {
    echo json_encode(Usluga::vratiSvePodatkeIzBaze());
}

if (isset($_GET['usluga']) && $_GET['usluga'] == 'pretraga') {
    if (isset($_GET['tekst'])) {
        echo json_encode(Usluga::vratiPoNazivu($_GET['tekst']));
    }
}

if (isset($_GET['usluga']) && $_GET['usluga'] == 'sortAsc') {
    echo json_encode(Usluga::sortAsc());
}

if (isset($_GET['usluga']) && $_GET['usluga'] == 'sortDesc') {
    echo json_encode(Usluga::sortDesc());
}

if (isset($_GET['obrisi']) && $_GET['obrisi'] == 'usluga') {
    if (Usluga::obrisi($_GET['id'])){
        echo 'OK';
    }
    else{
        echo 'ERR';
    }
}

if (isset($_GET['obrisi']) && $_GET['obrisi'] == 'auto_servis') {
    if (AutoServis::obrisi($_GET['id'])){
        echo 'OK';
    }
    else{
        echo 'ERR';
    }
}


?>