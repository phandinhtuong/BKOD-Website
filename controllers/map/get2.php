<?php
    include_once("../../models/map.php");

    // create a Map Object
    $foo = new Map;

    // get the q parameter from url
    $tourid = $_REQUEST['tourid'];
    $timeid = $_REQUEST['timeid'];

    $id_arr = array($tourid, $timeid);
    $classes = $foo->getMap2($id_arr);
    
    $id = $classes[0]['ClassroomId'];
    $name = $classes[0]['classroomName'];
    print("<option value=$id>$name</option>");