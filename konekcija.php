<?php

$mysql_server = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_db = "db_auto_servis";

$mysqli = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
if ($mysqli->connect_errno) {
    printf("Konekcija neuspešna: %s\n", $mysqli->connect_error);
    exit();
}
$mysqli->set_charset("utf8");
?>