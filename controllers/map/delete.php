<?php
    require_once("../../utils/auth.php");
    requireAdminMutation();
    include_once("../../models/map.php");

    // Map Object
    $foo = new Map;

    // print_r($_REQUEST);
    $tourid = $_POST['tour'];
    // $classid = $_REQUEST['class'];
    $timeid = $_POST['StartTime'];
    // $buildingid = $_REQUEST['building'];
    
    $foo->deleteMap($tourid, $timeid);
    echo "<script>window.close();</script>";

    // echo "delete successfully";
    // echo $tourid . $classid . $timeid . $buildingid;

    // $foo->addMap($tourid, $timeid, $classid, $buildingid);

    // header("Location: display_map.php");
