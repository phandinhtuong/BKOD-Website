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
}