<!DOCTYPE html>
<html>
    <head>
        <title>test display map</title>
        <script type="text/javascript">
        // function foo() {
        //     alert("fooooo");
        // }

        /** open a popup window and show user respective map with building and classroom */
        function showMap(classroom, building, buildingID) {
            var myWindow = window.open("", "myWindow","width="+screen.availWidth+",height="+screen.availHeight);
            myWindow.document.write("<p>classroom: <b>" + classroom + "</b> of building: <b>" + building + "</b></p>");
            myWindow.document.write("<img src=../assets/img/building" + buildingID + ".gif>");
            
            // myWindow.opener.document.write("<p>This is the source window!</p>");
        }

        /** toggle tour timeline */
        function toggleDiv(tourid) {    
            var x = document.getElementById("myDIV" + tourid);
            // alert("myDiv" + tourid);
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
            x.style.display = "none";
            }
        }
        </script>
    </head>
    <body>
    <?php
    include_once("../models/map.php");

    // Map Object
    $foo = new Map;

    // get all tours id and name
    $tours = $foo->getTours() ;
    print("Choose your tour: ");    
    
    // create buttons to show timeline of each tour
    // print_r($tours);
    foreach ($tours as $tour) {
        $id = $tour['TourID'];
        $name = $tour['Name'];
        
        print( "<button type='button' ". "onclick=" ."\"" . "toggleDiv($id)" . "\"" .">$name</button>");
    }

    // Timeline of chosen tour
    foreach ($tours as $tour) {        
        print('<br/>');
        $id = $tour['TourID'];
        $name = $tour['Name'];

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