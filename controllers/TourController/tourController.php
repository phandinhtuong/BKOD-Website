<?php
include '../../models/tourModel.php'; //include tour model to connect to database
$q = $_GET['q']; //query string 
if (strcmp($q, "getAllTours") == 0){
    getAllTours();
} else if (strcmp($q, "getOneTourToEdit")==0){
    $tourID = $_GET['tourID'];
    getOneTourToEdit($tourID);
} else if (strcmp($q, "updateTour")==0){
    $tourID = $_GET['tourID'];
    $name=$_GET['name'];
    $state =$_GET['state'];
    $imageURL = $_GET['imageURL'];
    $date = $_GET['date'];
    $mapImageUrl = $_GET['mapImageUrl'];
    updateTour($tourID,$name,$state,$imageURL,$date,$mapImageUrl);
} else if (strcmp($q, "insertTour")==0){
    $name=$_GET['name'];
    $state =$_GET['state'];
    $imageURL = $_GET['imageURL'];
    $date = $_GET['date'];
    $mapImageUrl = $_GET['mapImageUrl'];
    insertTour($name,$state,$imageURL,$date,$mapImageUrl);
} else if (strcmp($q, "deleteTour")==0){
    $tourID = $_GET['tourID'];
    deleteTour($tourID);
}
?>