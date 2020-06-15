<?php
include '../../models/tourModel.php';
$q = $_GET['q'];
if (strcmp($q, "getAllTours") == 0){
    getAllTours();
} else if (strcmp($q, "editTour")==0){
    $tourID = $_GET['tourID'];
    editTour($tourID);
} else if (strcmp($q, "updateTour")==0){
    $tourID = $_GET['tourID'];
    $name=$_GET['name'];
    $state =$_GET['state'];
    $imageURL = $_GET['imageURL'];
    $date = $_GET['date'];
    $mapImageUrl = $_GET['mapImageUrl'];
    updateTour($tourID,$name,$state,$imageURL,$date,$mapImageUrl);
} 
?>