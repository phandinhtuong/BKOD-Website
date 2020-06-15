<?php

function getAllTours() { // get all tours to display 
    require '../../utils/db_connection.php'; // database connection
    $sql = 'select * from tour;'; //SQL statement
    $result = &$db->query($sql); // query from databases
    $allTours = array(); // array of tours
    while ($tourRow = $result->fetchRow()) {
        $tour = array();
        foreach ($tourRow as $key => $value) {
            switch ($key) {
                case 0 : $tour["tourID"] = $value;
                    break;
                case 1 : $tour["name"] = $value;
                    break;
                case 2 : $tour["state"] = $value;
                    break;
                case 3 : $tour["imageUrl"] = $value;
                    break;
                case 4 : $tour["date"] = $value;
                    break;
                default : break;
            }
        }
        $allTours[] = $tour;
    }
    //return XML
    header('Content-Type: text/xml');
    echo '<?xml version="1.0" encoding="ISO-8859-1"?>
    <tours>';
    foreach ($allTours as $row) {
        echo "
        <tour>";
        echo "
            <tourID>" . $row['tourID'] . "</tourID>";
        echo "
            <name>" . $row['name'] . "</name>";
        echo "
            <state>" . $row['state'] . "</state>";
        echo "
            <imageUrl>" . $row['imageUrl'] . "</imageUrl>";
        echo "
            <date>" . $row['date'] . "</date>";
        echo "
        </tour>";
    }
    echo "
        </tours>";
}

function getOneTourToEdit($tourID) { //get one specific tour to edit
    require '../../utils/db_connection.php';
    $sql = 'select * from tour where tourID = ?;';
    $result = &$db->query($sql, $tourID);
    while ($tourRow = $result->fetchRow()) {
        $tour = array();
        foreach ($tourRow as $key => $value) {
            switch ($key) {
                case 0 : $tour["tourID"] = $value;
                    break;
                case 1 : $tour["name"] = $value;
                    break;
                case 2 : $tour["state"] = $value;
                    break;
                case 3 : $tour["imageUrl"] = $value;
                    break;
                case 4 : $tour["date"] = $value;
                    break;
                default : break;
            }
        }
    }
    header('Content-Type: text/xml');
    echo '<?xml version="1.0" encoding="ISO-8859-1"?>
    <tour>';
    echo "
            <tourID>" . $tour['tourID'] . "</tourID>";
    echo "
            <name>" . $tour['name'] . "</name>";
    echo "
            <state>" . $tour['state'] . "</state>";
    echo "
            <imageUrl>" . $tour['imageUrl'] . "</imageUrl>";
    echo "
            <date>" . $tour['date'] . "</date>";
    echo "
        </tour>";
}

function updateTour($tourID, $name, $state, $imageURL, $date) {
    require '../../utils/db_connection.php';
    $sql = 'update tour set name = ?, state = ?, imageurl = ?, date= ? where tourid=?';
    $data = array($name, $state, $imageURL, $date, $tourID);
    if ($db->query($sql, $data) == true) {
        header('Content-Type: text/xml');
        echo '<?xml version="1.0" encoding="ISO-8859-1"?>
    <result>Update Successfully</result>';
    } else {
        header('Content-Type: text/xml');
        echo '<?xml version="1.0" encoding="ISO-8859-1"?>
    <result>Update Failed</result>';
    }
}

function insertTour($name, $state, $imageURL, $date) {
    require '../../utils/db_connection.php';
    //tourID increases by one from max tourID in database
    $sql = 'insert into tour values((select max(TourId)+1 from (select TourId from tour) as tourid),?,?,?,?,?);';
    $data = array($name, $state, $imageURL, $date,$imageURL);
    if ($db->query($sql, $data) == true) {
        header('Content-Type: text/xml');
        echo '<?xml version="1.0" encoding="ISO-8859-1"?>
    <result>Add Tour Successfully</result>';
    } else {
        header('Content-Type: text/xml');
        echo '<?xml version="1.0" encoding="ISO-8859-1"?>
    <result>Add Tour Failed</result>';
    }
}

function deleteTour($tourID) {
    require '../../utils/db_connection.php';
    $sql2= 'DELETE FROM tour2timesheet where tourId = ?;';
    $db->query($sql2, $tourID);
    $sql = 'DELETE FROM tour where tourId = ?;';
    if ($db->query($sql, $tourID) == true) {
        header('Content-Type: text/xml');
        echo '<?xml version="1.0" encoding="ISO-8859-1"?>
    <result>Delete Tour Successfully</result>';
    } else {
        header('Content-Type: text/xml');
        echo '<?xml version="1.0" encoding="ISO-8859-1"?>
    <result>Delete Tour Failed</result>';
    }
}

?>