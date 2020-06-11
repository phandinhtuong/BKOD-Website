<?php
/** Database Connection. Use function get_db() to retrieve Established-Connection Object */
class DBConnection{
    protected $_db;

    function __construct() {       
        require_once 'DB.php';
        # parameters for connecting to the "business_service" 
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
        
        $this->_db = $db;
    }

    /**
     * Get the value of _db
     */ 
    public function get_db()
    {
        return $this->_db;
    }
}    
?>