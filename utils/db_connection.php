<?php
require_once 'DB.php'; //Database from ???
$usernameDB = "root";
$passwordDB = "";
$hostspec = "localhost";
$database = "bkod";
// $dbtype = 'pgsql';
// $dbtype = 'oci8';
$dbtype = 'mysqli';

# DSN constructed from parameters 
$dsn = "$dbtype://$usernameDB:$passwordDB@$hostspec/$database";

# Establish the connection
$db = DB::connect($dsn);
if (DB::isError($db)) {
    die($db->getMessage());
}
?>