<!DOCTYPE html>
<html>
    <head>
        <title>test map</title>
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
    // print_r( get_class_methods('Map') );
    echo '<br/>';

    // print_r( $foo->getAllMaps() );
    // echo '<hr/>';
    // print_r( $foo->getMap(1) );
    // echo '<hr/>';
    // print_r( $foo->getToursID() );
    // echo '<hr/>';

    // get all tours id and name
    $tours = $foo->getTours() ;
    print("Choose your tour: ");    
    
    // create buttons to show timeline of each tour
    foreach ($tours as $tour) {
        $id = $tour['id'];
        $name = $tour['name'];
        
        print( "<button type='button' ". "onclick=" ."\"" . "toggleDiv($id)" . "\"" .">$name</button>");
    }

    // Timeline of chosen tour
    foreach ($tours as $tour) {        
        print('<br/>');
        $id = $tour['id'];
        $name = $tour['name'];

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
            
            // print($classroom);
            // echo '<br/>';
            // print($building);
             
            print("<li><div style=\"color:blue\" onclick=\"showMap('$classroom', '$building', $buildingID)\">$start_time - $end_time</div></li>");
            
        }
        print("</ol>");
        print("</div>");
    }
?>
    </body>
</html>
<!-- <img src='map.gif' usemap='#mapmap' style='width:auto;' />
<map name='mapmap'>
<!-- <area shape="rect" coords="200,130,400,160" href="https://vi.wikipedia.org/wiki/T%E1%BA%ADp_tin:Nh%C3%A0_C1_%C4%90%E1%BA%A1i_h%E1%BB%8Dc_B%C3%A1ch_Khoa_H%C3%A0_N%E1%BB%99i.jpg" /> -->
<!-- <area shape="rect" coords="200,130,400,160" href="foos.png"/>
</map> -->