<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$usrname = $url["user"];
$pswd = $url["pass"];
$dbname = substr($url["path"], 1);

$db = new mysqli($server, $usrname, $pswd, $dbname);
?>
