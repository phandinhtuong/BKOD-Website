<?php
    include_once("../../models/map.php");

    // create a Map Object
    $foo = new Map;

    // get the q parameter from url
    $q = $_REQUEST['q'];
    print($q);
    $classes = $foo->getClassroom($q);
    foreach ($classes as $class) {
        $id = $class['classroomId'];
        $name = $class['Name'];
        print("<option value=$id>$name</option>");
    }
    // print_r( $foo->getClassroom($q) );
    // echo '<br/>';