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
}