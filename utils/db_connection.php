<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = "localhost";
$usrname = "root";
$pswd = "";
$dbname = "bkod";

$db = new mysqli($server, $usrname, $pswd, $dbname);
?>
