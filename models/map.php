<?php
require '../utils/sql_commands.php';
require_once '../utils/model.class.php';

/** Map links tour, time, building and classroom together */

class Map extends Model{
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

    /** return all maps of all available tours */
    public function getAllMaps() {
    $db = $this->_db;

        $query = $db->prepare(getAllMapsSQL);
        if ( $this->sqlCommandIsError($query) ) 
            return 1;

        $res = &$db->execute($query);
        if ( $this->queryIsError($res) ) 
            return 1;

            $maps = array();
            $counter = 0;
            while (($map = $res->fetchRow(DB_FETCHMODE_ASSOC))) {
                $counter++;
                $id = ['id' => $counter];
                $map = array_merge($map, $id);
                array_push($maps, $map);
            }
                
            
            return json_encode($maps);
        }

    /** get all tours name and id */
        public function getTours() {
            $db = $this->_db;

            $query = $db->prepare(getToursIDSQL);
            if ( $this->sqlCommandIsError($query) ) 
                return 1;

            $res = &$db->execute($query);
            if ( $this->queryIsError($res) ) 
            return 1;

            // $tour is the result array
            $tours = array();
            while ( $tour = $res->fetchRow() ) {
                $id = $tour[0];
                $name = $tour[1];
                
                // $tour saves the id and name of each row in result set
                $tour = ['id' => $id, 'name' => $name];

                // push $tour to $tours
                array_push($tours, $tour);
            }
            
            return $tours;
        }

    /** add a new map
     * $id : tour id
     * $start : starting time
     * $end : ending time
     * $class : classroom visited
     * $building : building containing $class
     */
    public function addMap($id, $start, $end, $class, $building) {
        $db = $this->_db;

        // Create an unique timesheet id
        $timesheet_id = abs( crc32( uniqid() ) );

        $start = time();
        $end = time() + 60*60; // now + 1 hour
        
        $foo1 = array($timesheet_id, $start, $end);

        // add a new timesheet row
        $query = $db->prepare(addTimesheet);
        if ( $this->sqlCommandIsError($query) ) 
            return 1;
            
        $res = &$db->execute($query, $foo1);
        if ( $this->queryIsError($res) ) 
            return 1;
        

        $foo2 = array($id, $timesheet_id);

        $query = $db->prepare(addTour2Timesheet);
        if ( $this->sqlCommandIsError($query) ) 
            return 1;
            
        $res = &$db->execute($query, $foo2);
        if ( $this->queryIsError($res) ) 
            return 1;
    }

    public function getTime () {
        $db = $this->_db;

        $query = $db->prepare(getTimesheetSQL);
        if ( $this->sqlCommandIsError($query) ) 
            return 1;

        $res = &$db->execute($query);
        if ( $this->queryIsError($res) ) 
        return 1;

        // $tour is the result array
        $times = array();
        while ( $time = $res->fetchRow() ) {
            $start = $time[0];
            $id = $time[1];
            $end = $time[2];
            
            // $tour saves the id and name of each row in result set
            $timee = ['id' => $id, 'start' => $start, 'end' => $end];
            array_push($times, $timee);
        }
        
        return $times;

    }
    
    public function getBuilding () {
        $db = $this->_db;

        $query = $db->prepare(getBuildingSQL);
        if ( $this->sqlCommandIsError($query) ) 
            return 1;

        $res = &$db->execute($query);
        if ( $this->queryIsError($res) ) 
        return 1;

        // $tour is the result array
        $buildings = array();
        while ( $building = $res->fetchRow() ) {
            $id = $building[0];
            $name = $building[1];
            $subname = $building[2];
            
            // $tour saves the id and name of each row in result set
            $timee = ['id' => $id, 'name' => $name, 'subname' => $subname];
            array_push($buildings, $timee);
        }
        
        return $buildings;

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
}