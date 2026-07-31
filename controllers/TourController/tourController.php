<?php
include '../../models/tourModel.php'; //include tour model to connect to database
$q = $_GET['q'] ?? ($_POST['q'] ?? '');
if (strcmp($q, "getAllTours") == 0){
    getAllTours();
} else if (strcmp($q, "getOneTourToEdit")==0){
    $tourID = $_GET['tourID'];
    getOneTourToEdit($tourID);
} else if (strcmp($q, "updateTour")==0){
    require_once("../../utils/auth.php");
    requireAdminMutation();
    $tourID = $_POST['tourID'];
    $name=$_POST['name'];
    $state =$_POST['state'];
    $imageURL = $_POST['imageURL'];
    $date = $_POST['date'];
    updateTour($tourID,$name,$state,$imageURL,$date);
} else if (strcmp($q, "insertTour")==0){
    require_once("../../utils/auth.php");
    requireAdminMutation();
    $name=$_POST['name'];
    $state =$_POST['state'];
    $imageURL = $_POST['imageURL'];
    $date = $_POST['date'];
    insertTour($name,$state,$imageURL,$date);
} else if (strcmp($q, "deleteTour")==0){
    require_once("../../utils/auth.php");
    requireAdminMutation();
    $tourID = $_POST['tourID'];
    deleteTour($tourID);
} else {
    http_response_code(400);
    echo "Unknown operation";
}
?>
