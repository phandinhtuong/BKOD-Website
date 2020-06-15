<!DOCTYPE html>
<html>
    <head>
        <title>test add map</title>
        <script src="../assets/js/map/add_map.js"></script>
   </head>
    <body>
    <?php
    include_once("../models/map.php");

    // Map Object
    $foo = new Map;

    $tour_id = 1;
    
    $existing_times = $foo->getTime($tour_id);
    $all_times = $foo->getAllTimes();
    $times = array();

    foreach ($all_times  as $x) {
        if ( !in_array($x, $existing_times ) ) {
            array_push($times, $x);
        }
    }

    $buildings = $foo->getAllBuildings();
    ?>
        <form action="add_map.php"><table>
            <?php TableHeader(); ?>
            <tr>
                <td>1</td>
                <td>
                <select name="StartTime" id="StartTime" onchange="displayEndTime()">
                    <?php 
                    foreach ($times as $time) {
                        $id = $time['TimesheetId'];
                        $start = $time['StartTime'];
                        print("<option value=$id>$start</option>");
                    }
                    ?>
                </select>
                </td>
                <td>
                    <div id="endtime" name="endtime" value=""></div>
                </td>
                <td>
                <select name="building" id="building" onchange="get_class_by_building(this.value)">
                    <?php 
                    foreach ($buildings as $building) {
                        $id = $building['BuildingID'];
                        $name = $building['Name'];
                        print("<option value=$id>$name</option>");
                    }
                    ?>
                </select>
                </td>
                <td><select name="class" id="class"></select></td>
            </tr>
        </table>
        <input type="hidden" id="tour" name="tour" value="1">
        <input type="submit" value="Add map" />
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