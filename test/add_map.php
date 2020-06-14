<!DOCTYPE html>
<html>
    <head>
        <title>test add map</title>
        <script type="text/javascript">
            function myFunc() {
                var x = document.getElementById("end_time");
                var y = document.getElementById("start_time");
                var foo = y.value.substring(0,2);
                foo = parseInt(foo);
                foo += 1;
                // alert(foo);

                var foo2 = y.value.substring(2);
                // alert(foo2);
                
                x.value = foo.toString() + foo2;
            }
            function myFunc2(id)
{
        console.log("in function 1");
    var x = new XMLHttpRequest();

    x.onreadystatechange = function () {
        console.log("in function 2");
        // everything is working fine
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);
            document.getElementById("class").innerHTML = this.responseText;
        }
    };

    x.open("GET", "get_class_by_building.php?q=" + id, true);
    x.send();
}
        </script>
    </head>
    <body>
    <?php
    include_once("../models/map.php");

    // Map Object
    $foo = new Map;
    $times = $foo->getTime();
    print_r( $foo->getTime() );
    echo '<br/>';
    $buildings = $foo->getBuilding();
    print_r( $foo->getBuilding() );
    echo '<br/>';
    $classrooms = $foo->getClassroom(38);
    print_r( $foo->getClassroom(38) );
    echo '<br/>';
    // $foo->addMap(1, 0, 0, 0, 0);
    ?>
        <form><table>
            <?php TableHeader(); ?>
            <tr>
                <td>1</td>
                <td>
                <select name="start_time" id="start_time" onChange="myFunc()">
                    <?php 
                    foreach ($times as $time) {
                        $id = $time['id'];
                        $start = $time['start'];
                        print("<option value=$start>$start</option>");
                    }
                    ?>
                </select>
                </td>
                <td>
                    <br/>
                    <input type="text" id="end_time" name="end_time" value="" readonly><br><br>
                </td>
                <td>
                <select name="building" id="building" onChange="myFunc2(this.value)">
                    <?php 
                    foreach ($buildings as $building) {
                        $id = $building['id'];
                        $name = $building['name'];
                        print("<option value=$id>$name</option>");
                    }
                    ?>
                </select>
                </td>
                <td>
                <select name="class" id="class"></select>
                </td>
            </tr>
        </table>
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