<?php
function getAllTours(){
    require '../utils/db_connection.php';
    $sql = 'select * from tour;';
    $result = &$db->query($sql);
    $allTours = array();
        while ($tourRow = $result->fetchRow()) {
            $tour = array();
            foreach ($tourRow as $key => $value) {
                switch ($key) {
                    case 0 : $tour["tourID"] = $value;
                        break;
                    case 1 : $tour["name"] = $value;
                        break;
                    case 2 : $tour["state"] = $value;
                        break;
                    case 3 : $tour["imageUrl"] = $value;
                        break;
                    case 4 : $tour["date"] = $value;
                        break;
                    case 5 : $tour["mapImageUrl"] = $value;
                        break;
                    default : break;
                }
            }
            $allTours[] = $tour;
        }
//    echo json_encode($allTours);
        echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>State</th>
<th>ImageUrl</th>
<th>Date</th>
<th>MapImageUrl</th>
</tr>";
        foreach ($allTours as $row) {
//while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>" . $row['tourID'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['state'] . "</td>";
            echo "<td>" . $row['imageUrl'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['mapImageUrl'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
}
function getAllToursByPEAR() {
    require '../utils/db_connection.php';
//header('Content-Type: application/json');

    $getAllToursQuery = $db->prepare("select * from tour;");
    if (PEAR::isError($getAllToursQuery)) {
        echo "Bad query detected!";
    }

    $res = &$db->execute($getAllToursQuery);

    if (PEAR::isError($res)) {
        $err = $res->getDebugInfo();
        echo json_encode("An unknown error occured!");
    } else {
        $allTours = array();
        while ($tourRow = $res->fetchRow()) {
            $tour = array();
            foreach ($tourRow as $key => $value) {
                switch ($key) {
                    case 0 : $tour["tourID"] = $value;
                        break;
                    case 1 : $tour["name"] = $value;
                        break;
                    case 2 : $tour["state"] = $value;
                        break;
                    case 3 : $tour["imageUrl"] = $value;
                        break;
                    case 4 : $tour["date"] = $value;
                        break;
                    case 5 : $tour["mapImageUrl"] = $value;
                        break;
                    default : break;
                }
            }
            $allTours[] = $tour;
        }
//    echo json_encode($allTours);
        echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>State</th>
<th>ImageUrl</th>
<th>Date</th>
<th>MapImageUrl</th>
</tr>";
        foreach ($allTours as $row) {
//while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>" . $row['tourID'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['state'] . "</td>";
            echo "<td>" . $row['imageUrl'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['mapImageUrl'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>