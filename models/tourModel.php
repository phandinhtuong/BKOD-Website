<?php
function getAllTours() {
    require '../../utils/db_connection.php';
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
    header('Content-Type: text/xml');
    echo '<?xml version="1.0" encoding="ISO-8859-1"?>
    <tours>';
    foreach ($allTours as $row) {
        echo "
        <tour>";
        echo "
            <tourID>" . $row['tourID'] . "</tourID>";
        echo "
            <name>" . $row['name'] . "</name>";
        echo "
            <state>" . $row['state'] . "</state>";
//        echo "
//            <imageUrl>" . $row['imageUrl'] . "</imageUrl>";
        echo "
            <date>" . $row['date'] . "</date>";
        echo "
            <mapImageUrl>" . $row['mapImageUrl'] . "</mapImageUrl>";
        echo "
        </tour>";
    }
    echo "
        </tours>";
}
function editTour($tourID){
    require '../../utils/db_connection.php';
    
//    $sql = "select * from tour where tourID = "+$tourID+";";
//    $result = &$db->query($sql);
    
    $sql = 'select * from tour where tourID = ?;';
    $result = &$db->query($sql,$tourID);
    
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
    header('Content-Type: text/xml');
    echo '<?xml version="1.0" encoding="ISO-8859-1"?>
    <tour>';
        echo "
            <tourID>" . $allTours[0]['tourID'] . "</tourID>";
        echo "
            <name>" . $allTours[0]['name'] . "</name>";
        echo "
            <state>" . $allTours[0]['state'] . "</state>";
        echo "
            <imageUrl>" . $allTours[0]['imageUrl'] . "</imageUrl>";
        echo "
            <date>" . $allTours[0]['date'] . "</date>";
        echo "
            <mapImageUrl>" . $allTours[0]['mapImageUrl'] . "</mapImageUrl>";
    echo "
        </tour>";
}
function updateTour($tourID,$name,$state,$imageURL,$date,$mapImageUrl){
    require '../../utils/db_connection.php';
    $sql = 'update tour set name = ?, state = ?, imageurl = ?, date= ?,mapimageurl = ? where tourid=?';
    $data = array($name,$state,$imageURL,$date,$mapImageUrl,$tourID);
//    $result = &$db->query($sql,$data);
    if ($db->query($sql,$data)==true){
        header('Content-Type: text/xml');
    echo '<?xml version="1.0" encoding="ISO-8859-1"?>
    <result>Update Successfully</result>';
    
    }else{
        header('Content-Type: text/xml');
    echo '<?xml version="1.0" encoding="ISO-8859-1"?>
    <result>Update Failed</result>';
    }
}
?>