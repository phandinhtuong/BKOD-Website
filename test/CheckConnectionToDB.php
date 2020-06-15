<?php
require_once 'DB.php';
# parameters for connecting to the "business_service" 
$username = "root";
$password = "";
$hostspec = "localhost";
$database = "bkod";
// $dbtype = 'pgsql';
// $dbtype = 'oci8';
$dbtype = 'mysqli';

# DSN constructed from parameters 
$dsn = "$dbtype://$DB_NAME:$password@$hostspec/$database";

# Establish the connection
$db = DB::connect($dsn);
if (DB::isError($db)) {
    die($db->getMessage());
}
$sql = "select * from user where username = 'a@a.a';";
$result = $db->query($sql);
while ($row = $result->fetchRow()) {
    for ($i = 0; $i < count($row); $i++)
        echo "$row[$i]<br>";
}
?> 
