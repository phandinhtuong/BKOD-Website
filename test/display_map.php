<!DOCTYPE html>
<html>
    <head>
        <title>test display map</title>
        <script src="js/display_map.js"></script>
    </head>
    <body>
    <?php
    include_once("../models/map.php");

    // Map Object
    $foo = new Map;

    // get all tours id and name
    $tours = $foo->getAllTours() ;
    print("Choose your tour: ");    
    
    // create buttons to show timeline of each tour
    // print_r($tours);
    foreach ($tours as $tour) {
        print('<br/>');

        $id = $tour['TourID'];
        $name = $tour['Name'];
        
        print( "<button type='button' ". "onclick=" ."\"" . "toggleDiv($id)" . "\"" .">$name</button>");
        
        print("<div id=myDIV$id style=\"display: none\"> Timeline of <b>$name</b>: ");
        $res = $foo->getMap($id) ;

        print("<ol>");
        foreach( $res as $b ) {
            $start_time = $b["StartTime"];
            $end_time = $b["EndTime"];
            $buildingID = $b["BuildingId"];
            $classroomID = $b["ClassroomId"];
            $classroom = $b["classroomName"];
            $building = $b["buildingName"];
             
            print("<li><div style=\"color:blue\" onclick=\"showMap('$classroom', '$building', $buildingID)\">$start_time - $end_time</div></li>");
            
        }
        print("</ol>");
        print("</div>");   
    }
?>
    </body>
</html>