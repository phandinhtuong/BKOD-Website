<?php
include '../models/tourModel.php';
$q = $_GET['q'];
if (strcmp($q, "getAllTours") == 0){
    getAllTours();
}
?>