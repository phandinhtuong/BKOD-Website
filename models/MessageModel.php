<?php

class MessageModel {

    public function getAllMessages($currentUserId, $selectedUserId) {
        require '../../utils/db_connection.php';
        $allMessages = array();
        $trueMessage = array();

//        $getAllMessagesQuery = $db->prepare("SELECT * FROM message");
//        $getAllMessagesQuery = $db->prepare("SELECT * FROM message WHERE recieverId = '" . $currentUserId . "' AND senderId = '" . $selectedUserId . "' " . "ORDER by messageId DESC");

        $getAllMessagesQuery = $db->prepare("SELECT * FROM message WHERE ( recieverId = ?  AND senderId = ? ) OR (recieverId = ? AND  senderId = ?) ORDER by messageId ASC");

        if (PEAR::isError($getAllMessagesQuery)) {
            echo "Bad query detected!";
        }

        $data = array($currentUserId, $selectedUserId, $selectedUserId, $currentUserId);

        $res = &$db->execute($getAllMessagesQuery, $data);

        if (PEAR::isError($res)) {
            $err = $res->getDebugInfo();
            echo json_encode("An unknown error occured!");
        } else {
            while (($message = $res->fetchRow())) {
                foreach ($message as $key => $value) {
                    if ($key === 0)
                        $trueMessage["senderId"] = $value;
                    else if ($key === 1)
                        $trueMessage["recieverId"] = $value;
                    else if ($key === 2)
                        $trueMessage["messageId"] = $value;
                    else if ($key === 3)
                        $trueMessage["mContent"] = $value;
                    else if ($key === 4)
                        $trueMessage["time"] = $value;
                }
                $allMessages[] = $trueMessage;
            }
//    echo json_encode($allMessages);
            foreach ($allMessages as $row) {
//while ($row = mysqli_fetch_array($res)) {
                if ($row['senderId'] == $currentUserId) {
                    echo "<div style='background-color: #00FFFF; display: table; margin-right: 320px; margin-left:auto; border-radius: 25px; height: 20px; padding: 5px'>"
                    . $row['mContent'] . "</div>";
                } else {
                    echo "<div style='background-color: #7FFF00; display: table; margin-right: auto; margin-left:20px; border-radius: 25px; height: 20px; padding: 5px'>"
                    . $row['mContent'] . "</div>";
                }
            }
        }
    }

    public function sendMessage($senderId, $receiverId, $message) {
        require '../../utils/db_connection.php';
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $messageId = time();
        $date = date('Y/m/d h:i:s.a', time());
        $insertMessageQuery = $db->prepare("INSERT INTO message (SenderId, RecieverId, messageId, mContent, Time) VALUES (?, ?, ?, ?, ?)");
        if (PEAR::isError($insertMessageQuery)) {
            return "Bad query detected!";
        }
//        echo MessageModel::$currentUserId . ", " . $receiverId . ", " .  $messageId . ", " .  $message . ", " .  $time;
        $data = array($senderId, $receiverId, $messageId, $message, $date);
        $res = &$db->execute($insertMessageQuery, $data);

        if (PEAR::isError($res)) {  
            $err = $res->getDebugInfo();
            if (strpos($err, 'Duplicate entry') !== false) {
                return json_encode("Message already existed!");
            } else {
                echo "An unknown error occured!";
            }
        } else {
            echo $this->getAllMessages($senderId, $receiverId);
        }
    }

}
