<?php
    include_once("../../models/map.php");

    // Map Object
    $foo = new Map;

    print_r($_REQUEST);

    $tourid = $_REQUEST['tour'];
    $classid = $_REQUEST['class'];
    $timeid = $_REQUEST['StartTime'];
    $buildingid = $_REQUEST['building'];
    
    $foo->deleteMap($tourid, $timeid);
    $foo->addMap($tourid, $timeid, $classid, $buildingid);

    echo "update successfully";
    // echo $tourid . $classid . $timeid . $buildingid;

    // $foo->addMap($tourid, $timeid, $classid, $buildingid);

    // header("Location: display_map.php");