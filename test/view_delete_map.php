<!DOCTYPE html>
<html>
    <head>
        <title>test add map</title>
        <script src="js/delete_map.js"></script>
   </head>
    <body>
    <?php
    include_once("../models/map.php");

    // Map Object
    $foo = new Map;

    $tour_id = 1;
    
    $times = $foo->getTime($tour_id);

    $res = $foo->getMap($tour_id) ;
    print_r($res);

    $buildings = array();
    $classes = array();
    foreach ($res as $re) {
        array_push($buildings, $re['buildingName']);
        array_push($classes, $re['classroomName']);
    }

    echo '</br/>';
    print_r($buildings);
    
    echo '</br/>';  
    print_r($classes);
    ?>
        <form action="delete_map.php"><table>
            <?php TableHeader(); ?>
            <tr>
                <td>1</td>
                <td>
                <select name="StartTime" id="StartTime" onchange="display(this.id); 
                building(<?php echo $tour_id ?>, this.value);
                classroom(<?php echo $tour_id ?>, this.value);
                ">
                    <?php 
                    $counter = 0;
                    foreach ($times as $time) {
                        $num = $counter++;
                        // print("<input type='hidden' id='tour' name='tour' value=''>");
                        $id = $time['TimesheetId'];
                        $start = $time['StartTime'];
                        print("<option id=$num value=$id>$start</option>");
                    }
                    ?>
                </select>
                </td>
                <td><div id="endtime" name="endtime" value=""></div></td>
                <td><div id="building" name="building" value=""></div></td>
                <td><div id="class" name="class" value=""></div></td>
            </tr>
        </table>
        <input type="hidden" id="tour" name="tour" value="<?php echo $tour_id ?>">
        <input type="submit" value="delete map" />
    </form>  
    </body>
</html>

<?php
function TableHeader() {
    print(
        "
        <tr>
            <th>Tour ID</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Building</th>
            <th>Classroom</th>
            </tr>
        "
    );
}
?>