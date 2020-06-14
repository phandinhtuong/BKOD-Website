<?php
require_once '../utils/db_connection.class.php';

class Model {
    protected $_db;

    function __construct() {
        $DBConnection = new DBConnection();
        $this->_db = $DBConnection->get_db();
    }

    function sqlCommandIsError($query) {
        if (PEAR::isError($query)) {
            print("Bad query command detected!");
            return TRUE;
        }

        return FALSE;
    }

    function queryIsError($res) {
        if (PEAR::isError($res)) {
            $err = $res->getDebugInfo();
            print_r($err);
            return TRUE;
        }

        return FALSE;
    }

    
    public function getAll($sql_cmd) {
        $db = $this->_db;

        $query = $db->prepare($sql_cmd);
        if ( $this->sqlCommandIsError($query) ) 
            return 1;
    
        $res = &$db->execute($query);
        if ( $this->queryIsError($res) ) 
        return 1;
    
        // $tour is the result array
        $res_arr = array();
        
        while ( $re = $res->fetchRow( DB_FETCHMODE_ASSOC ) ) {
            array_push($res_arr, $re);
        }
        
        return $res_arr;
    }

    public function getById ($sql_cmd, $id) {
        $db = $this->_db;

        $query = $db->prepare($sql_cmd);
        if ( $this->sqlCommandIsError($query) ) 
            return 1;
    
        $res = &$db->execute($query, $id);
        if ( $this->queryIsError($res) ) 
        return 1;
    
        // $tour is the result array
        $res_arr = array();
        
        while ( $re = $res->fetchRow( DB_FETCHMODE_ASSOC ) ) {
            array_push($res_arr, $re);
        }
        
        return $res_arr;
    }
}