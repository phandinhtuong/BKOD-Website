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
        <form>
        <table>
        <tr>
            <th>Tour ID</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Building</th>
            <th>Classroom</th>
            </tr>
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
                <select name="building" id="building" onChange="myFunc2()">
                    <?php 
                    foreach ($buildings as $building) {
                        $id = $building['id'];
                        $name = $building['name'];
                        print("<option value=$name>$name</option>");
                    }
                    ?>
                </select>
                </td>
                <td>
                </td>
            </tr>
        </table>
    </form>  
    </body>
</html>