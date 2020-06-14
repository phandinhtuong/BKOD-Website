<?php
require '../utils/sql_commands.php';
require_once '../utils/model.class.php';

/** Map links tour, time, building and classroom together */
class Map extends Model{
    /** return all maps of all available tours */
    public function getAllMaps() {
        return $this->getAll(getAllMapsSQL);;
        }

    /** get all tours name and id */
        public function getTours() {
            return $this->getAll(getToursIDSQL);;
        }
    
    public function getAllBuildings () {
        return $this->getAll(getBuildingSQL);;
    }

    public function getAllTimes() {
        return $this->getAll(getTimesheetSQL);;
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

    public function getTime($id) {
        $db = $this->_db;

        $query = $db->prepare(getTimeByTourID_SQL);
        if ( $this->sqlCommandIsError($query) ) 
            return 1;

        $res = &$db->execute($query, $id);
        if ( $this->queryIsError($res) ) 
        return 1;

        // $tour is the result array
        $classrooms = array();
        while ( $classroom = $res->fetchRow() ) {
            $id = $classroom[0];
            $start_time = $classroom[1];
            
            // $tour saves the id and name of each row in result set
            $timee = ['id' => $id, 'start_time' => $start_time];
            array_push($classrooms, $timee);
        }
        
        return $classrooms;
    }

    /** return all maps of a given tour id */
    public function getMap($id) {
        $db = $this->_db;

        // authen query
        $query = $db->prepare(getMapSQL);
        if ( $this->sqlCommandIsError($query) ) 
            return 1;

        // execute query and authen result
        $res = &$db->execute($query, $id);
        if ( $this->queryIsError($res) ) 
            return 1;
        
            $maps = array(); 
            $counter = 0;
            while ( $map = $res->fetchRow(DB_FETCHMODE_ASSOC )) {
                $counter++;
                $count = ['id' => $counter];
                $map = array_merge($map, $count);
                array_push($maps, $map);
            }
            return $maps;

    }
    public function getClassroom($id) {
        $db = $this->_db;

        $query = $db->prepare(getClassroomByBuildingID_SQL);
        if ( $this->sqlCommandIsError($query) ) 
            return 1;

        $res = &$db->execute($query, $id);
        if ( $this->queryIsError($res) ) 
        return 1;

        // $tour is the result array
        $classrooms = array();
        while ( $classroom = $res->fetchRow() ) {
            $id = $classroom[0];
            $name = $classroom[1];
            
            // $tour saves the id and name of each row in result set
            $timee = ['id' => $id, 'name' => $name];
            array_push($classrooms, $timee);
        }
        
        return $classrooms;
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