<?php

// require '../utils/sql_commands.php';
// require_once '../utils/model.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/BKOD-Website/utils/model.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/BKOD-Website/utils/sql_commands.php';

/** Map links tour, time, building and classroom together */
class Map extends Model {

    /** return all maps of all available tours */
    public function getAllMaps() {
        return $this->getAll(getAllMapsSQL);
    }

    /** get all tours name and id */
    public function getAllTours() {
        return $this->getAll(getToursIDSQL);
    }

    public function getAllBuildings() {
        return $this->getAll(getBuildingSQL);
    }

    public function getAllTimes() {
        return $this->getAll(getTimesheetSQL);
    }

    public function getTime($id) {
        return $this->getById(getTimeByTourID_SQL, $id);
    }

    /** return all maps of a given tour id */
    public function getMap($id) {
        return $this->getById(getMapSQL, $id);
    }

    /** return all maps of a given tour id */
    public function getMap2($id) {
        return $this->getById(getMap2SQL, $id);
    }

    public function getClassroom($id) {
        return $this->getById(getClassroomByBuildingID_SQL, $id);
    }

    /** add a new map
     * $id : tour id
     * $start : starting time
     * $end : ending time
     * $class : classroom visited
     * $building : building containing $class
     */
    public function addMap($tourid, $timeid, $classid, $buildingid) {
        $db = $this->_db;

        print("tourid: $tourid - time: $timeid - class: $classid - building: $buildingid");

        $array1 = array($tourid, $timeid);
        $array2 = array($timeid, $classid, 1);
//        $array3 = array($buildingid, $classid);

        echo '<br/>';
        print( addtour2timesheet_SQL);

        echo '<br/>';
        print(addtimesheet2classroom_SQL);

        echo '<br/>';

        $query1 = $db->prepare(addtour2timesheet_SQL);
        $query2 = $db->prepare(addtimesheet2classroom_SQL);
//        $query3 = $db->prepare(addbuilding2classroom_SQL);

        if ($this->sqlCommandIsError($query1))
            return 1;
        if ($this->sqlCommandIsError($query2))
            return 1;
//        if ( $this->sqlCommandIsError($query3) ) return 1;


        $res1 = &$db->execute($query1, $array1);
        if ($this->queryIsError($res1))
            return 1;
        $res2 = &$db->execute($query2, $array2);
        if ($this->queryIsError($res2))
            return 1;
//        $res3 = &$db->execute($query3, $array3);
//        if ( $this->queryIsError($res3) ) return 1;

        return 0;
    }

    public function updateMap($tourid, $timeid, $classid, $buildingid) {
        $db = $this->_db;

        $array1 = array($tourid, $timeid);
        $array2 = array($timeid, $classid, rand(1, 5));
        $array3 = array($buildingid, $classid);


        $query1 = $db->prepare(addtour2timesheet_SQL);
        $query2 = $db->prepare(addtimesheet2classroom_SQL);
        $query3 = $db->prepare(addbuilding2classroom_SQL);

        if ($this->sqlCommandIsError($query1))
            return 1;
        if ($this->sqlCommandIsError($query2))
            return 1;
        if ($this->sqlCommandIsError($query3))
            return 1;


        $res1 = &$db->execute($query1, $array1);
        if ($this->queryIsError($res1))
            return 1;
        $res2 = &$db->execute($query2, $array2);
        if ($this->queryIsError($res2))
            return 1;
        $res3 = &$db->execute($query3, $array3);
        if ($this->queryIsError($res3))
            return 1;

        return 0;
    }

    public function deleteMap($tourid, $timeid) {

        $id = array($tourid, $timeid);
        $id2 = array($timeid);

        $this->d1($id);
        $this->d2($id2);
    }
    public function d1($id) {       
        $db = $this->_db;
        
        $query1 = $db->prepare(deleteMapSQL);
        if ($this->sqlCommandIsError($query1))
            return 1;
        
        $res = &$db->execute($query1, $id);
        if ($this->queryIsError($res))
            return 1;
}  
    public function d2($id2) {
        $db = $this->_db;

        $query = $db->prepare(deleteMapSQL2);
        if ($this->sqlCommandIsError($query))
            return 1;

        $res = &$db->execute($query, $id2);
        if ($this->queryIsError($res))
            return 1;
    }


}
