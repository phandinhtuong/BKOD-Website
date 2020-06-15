<!DOCTYPE html>
<html>
    <head>
        <title>test display map</title>
        <script src="../../assets/js/map/display.js"></script>
    </head>
    <body>
    <?php
    include_once("../../models/map.php");

    // Map Object
    $foo = new Map;

    // get all tours id and name
     $id2 = $_GET['tourID'];
//    $id2 = '1';
    
    $tours = $foo->getAllTours() ;
//    print("Choose your tour: ");    
    
    // create buttons to show timeline of each tour
//    print_r($tours);
    foreach ($tours as $tour) {

        $id = $tour['TourID'];
        $name = $tour['Name'];
        if($id!==$id2){
            continue;
        }
        print($name);
//        print( "<button type='button' ". "onclick=" ."\"" . "toggleDiv($id)" . "\"" .">$name</button>");
        
        print("<div id=myDIV$id > Timeline of <b>$name</b>: ");
        $res = $foo->getMap($id) ;

        print("<ol>");
        foreach( $res as $b ) {
            $start_time = $b["StartTime"];
            $end_time = $b["EndTime"];
            $buildingID = $b["BuildingId"];
            $classroomID = $b["ClassroomId"];
            $classroom = $b["classroomName"];
            $building = $b["buildingName"];
             
            print("<li><div style=\"color:blue; cursor : pointer; \" onclick=\"showMap('$classroom', '$building', $buildingID)\">$start_time - $end_time</div></li>");
            
        }
        print("</ol>");
        print("</div>");   
        
    }
?>
    </body>
</html>