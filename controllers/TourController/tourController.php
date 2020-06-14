<?php
include '../../models/tourModel.php';
$q = $_GET['q'];
if (strcmp($q, "getAllTours") == 0){
    getAllTours();
} else if (strcmp($q, "editTour")==0){
    $tourID = $_GET['tourID'];
    editTour($tourID);
}
?>