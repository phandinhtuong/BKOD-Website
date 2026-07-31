<?php
    require_once("../../utils/auth.php");
    requireAdminMutation();
    include_once("../../models/map.php");

    // Map Object
    $foo = new Map;

    // print_r($_REQUEST);
    $tourid = $_POST['tour'];
    $classid = $_POST['class'];
    $timeid = $_POST['StartTime'];
    $buildingid = $_POST['building'];
    
    // echo $tourid . $classid . $timeid . $buildingid;

    $foo->addMap($tourid, $timeid, $classid, $buildingid);
    echo "<script>window.close();</script>";

    // print("Successfully added!");
    // header("Location: display_map.php");
