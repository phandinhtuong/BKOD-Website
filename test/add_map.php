<?php
    include_once("../models/map.php");

    // Map Object
    $foo = new Map;

    print_r($_REQUEST);
    $tourid = $_REQUEST['tour'];
    $classid = $_REQUEST['class'];
    $timeid = $_REQUEST['start_time'];
    $buildingid = $_REQUEST['building'];
    
    // echo $tourid . $classid . $timeid . $buildingid;

    $foo->addMap($tourid, $timeid, $classid, $buildingid);

    header("Location: display_map.php");