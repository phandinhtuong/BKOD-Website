<!DOCTYPE html>
<html>
    <head>
        <title>test add map</title>
        <script src="delete_map.js"></script>
   </head>
    <body>
    <?php
    include_once("../models/map.php");

    // Map Object
    $foo = new Map;

    $tour_id = 1;
    $times = $foo->getTime($tour_id);
    
    $buildings = $foo->getAllBuildings();
    ?>
        <form action="add_map.php"><table>
            <?php TableHeader(); ?>
            <tr>
                <td>1</td>
                <td><select name="start_time" id="start_time" onchange="update(this.value)">
                    <?php 
                    foreach ($times as $time) {
                        $id = $time['id'];
                        $start = $time['start_time'];
                        print("<option value=$id>$start</option>");
                    }
                    ?>
                </select></td>
                <td><div id="end_time" name="end_time" value=""></div></td>
                <td><div id="building" name="building" value=""></div></td>
                <td><div id="class" name="class" value=""></div></td>
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