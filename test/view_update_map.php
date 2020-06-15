<!DOCTYPE html>
<html>
    <head>
        <title>test add map</title>
        <script src="../assets/js/map/update_map.js"></script>
   </head>
    <body>
    <?php
    include_once("../models/map.php");

    // Map Object
    $foo = new Map;

    $tour_id = 1;
    
    $times = $foo->getTime($tour_id);
    
    $old = $foo->getMap($tour_id);

    print_r($old);
    $buildings = $foo->getAllBuildings();
    ?>
        <form action="update_map.php"><table>
            <?php TableHeader(); ?>
            <tr>
                <td>1</td>
                <td>
                <select name="StartTime" id="StartTime" onchange="displayEndTime()">
                    <?php 
                    foreach ($times as $time) {
                        $id = $time['TimesheetId'];
                        $start = $time['StartTime'];
                        print("$id - $start <br/>");
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
        <input type="hidden" id="tour" name="tour" value="<?php echo $tour_id?>">
        
        <input type="submit" value="update map" />
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