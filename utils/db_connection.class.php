<?php
/** Database Connection. Use function get_db() to retrieve Established-Connection Object */
class DBConnection{
    protected $_db;

    function __construct() {       
        include_once '../config/config.php';
        require_once 'DB.php';
        # parameters for connecting to the "business_service" 
        $usernameDB = DB_USER;
        $passwordDB = DB_PASSWORD;
        $hostspec = DB_HOST;
        $database = DB_NAME;
        $dbtype = DB_TYPE;
    
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