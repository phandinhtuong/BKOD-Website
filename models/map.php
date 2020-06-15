<?php
require '../utils/sql_commands.php';
require_once '../utils/model.class.php';

/** Map links tour, time, building and classroom together */
class Map extends Model{
    /** return all maps of all available tours */
    public function getAllMaps() { return $this->getAll(getAllMapsSQL);}

    /** get all tours name and id */
    public function getAllTours() { return $this->getAll(getToursIDSQL);}
    
    public function getAllBuildings () { return $this->getAll(getBuildingSQL); }

    public function getAllTimes() { return $this->getAll(getTimesheetSQL); }

    public function getTime($id) { return $this->getById(getTimeByTourID_SQL, $id); }

    /** return all maps of a given tour id */
    public function getMap($id) { return $this->getById(getMapSQL, $id); }

    public function getClassroom($id) { return $this->getById(getClassroomByBuildingID_SQL, $id); }
    
    /** add a new map
     * $id : tour id
     * $start : starting time
     * $end : ending time
     * $class : classroom visited
     * $building : building containing $class
     */
    public function addMap($tourid, $timeid, $classid, $buildingid) {
        $db = $this->_db;

        $array1 = array($tourid, $timeid);
        $array2 = array($timeid, $classid, rand(1, 5) );
        $array3 = array($buildingid, $classid);
        

        $query1 = $db->prepare(addtour2timesheet_SQL);
        $query2 = $db->prepare(addtimesheet2classroom_SQL);
        $query3 = $db->prepare(addbuilding2classroom_SQL);

        if ( $this->sqlCommandIsError($query1) ) return 1;
        if ( $this->sqlCommandIsError($query2) ) return 1;
        if ( $this->sqlCommandIsError($query3) ) return 1;
    

        $res1 = &$db->execute($query1, $array1);
        if ( $this->queryIsError($res1) ) return 1;
        $res2 = &$db->execute($query2, $array2);
        if ( $this->queryIsError($res2) ) return 1;
        $res3 = &$db->execute($query3, $array3);
        if ( $this->queryIsError($res3) ) return 1;
    
        return 0;
    }

    public function getBuildingAndClassroomByTimeAndTour($id) {
        $db = $this->_db;

        $query = $db->prepare(getBuildingAndClassroomsByTimeAndTourID_SQL);
        if ( $this->sqlCommandIsError($query) ) 
            return 1;

        $res = &$db->execute($query, $id);
        if ( $this->queryIsError($res) ) 
        return 1;

        // $tour is the result array
        $res_arr = array();
        while ( $re = $res->fetchRow() ) {
            $class = $re[2];
            $building = $re[3];
            
            // $tour saves the id and name of each row in result set
            $x = ['class' => $class, 'building' => $building];
            array_push($res_arr, $x);
        }
        
        return $res_arr;
    }
}