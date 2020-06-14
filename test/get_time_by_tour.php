<?php
    include_once("../models/map.php");

    // create a Map Object
    $foo = new Map;

    // get the q parameter from url
    $q = $_REQUEST['q'];
    print($q);
    $classes = $foo->getTime($q);
    foreach ($classes as $class) {
        $id = $class['id'];
        $name = $class['start_time'];
        print("<option value=$id>$name</option>");
    }
    // print_r( $foo->getClassroom($q) );
    // echo '<br/>';