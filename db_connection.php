<?php

require_once 'DB.php';
# parameters for connecting to the "business_service" 
$usernameDB = "root";
$password = "";
$hostspec = "localhost";
$database = "bkod";
// $dbtype = 'pgsql';
// $dbtype = 'oci8';
$dbtype = 'mysqli';

# DSN constructed from parameters 
$dsn = "$dbtype://$usernameDB:$password@$hostspec/$database";

# Establish the connection
$db = DB::connect($dsn);
if (DB::isError($db)) {
    die($db->getMessage());
}
?> 
