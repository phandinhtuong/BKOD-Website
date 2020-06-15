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
//            foreach ($allMessages as $row) {
////while ($row = mysqli_fetch_array($res)) {
//                if ($row['senderId'] == $currentUserId) {
//                    echo "<div style='background-color: #00FFFF; display: table; margin-right: 320px; margin-left:auto; border-radius: 25px; height: 20px; padding: 5px'>"
//                    . $row['mContent'] . "</div>";
//                } else {
//                    echo "<div style='background-color: #7FFF00; display: table; margin-right: auto; margin-left:20px; border-radius: 25px; height: 20px; padding: 5px'>"
//                    . $row['mContent'] . "</div>";
//                }
//            }

            echo '<select style="width: 100%; height: 500px; border-radius: 5px" id="chatSelection" name="chatSelection" size=20 multiple>';
            foreach ($allMessages as $row) {
                if ($row['senderId'] == $currentUserId) {
                    echo'<option style="background-color: #00FFFF; display: table; margin-right: 0px; margin-left:auto; border-radius: 25px; height: 20px; padding: 5px" value="' . $row['messageId'] . '">' . $row['mContent'] . '</option>';
                } else {
                    echo'<option style="background-color: #7FFF00; display: table; margin-right: auto; margin-left:20px; border-radius: 25px; height: 20px; padding: 5px" value="' . $row['messageId'] . '">' . $row['mContent'] . '</option>';
                }
            }
            echo'</select>';
        }
    }

    public function getMessageInfo($messageId) {
        require '../../utils/db_connection.php';
        $allMessages = array();
        $trueMessage = array();

        $getMessageInfoQuery = $db->prepare("SELECT * FROM message WHERE messageId = ?");

        if (PEAR::isError($getMessageInfoQuery)) {
            echo "Bad query detected!";
        }

        $res = &$db->execute($getMessageInfoQuery, $messageId);

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

            foreach ($allMessages as $row) {
                echo'Content: ';
                echo'<input id="messageContent" type="text" name="receiverId" readonly value="' . $row['mContent'] . '"><br>';
                echo'Time sent: ';
                echo'<input id="messageTime" type="text" name="receiverId" readonly value="' . $row['time'] . '">';
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

    public function getMessengerUsers() {
        require '../../utils/db_connection.php';
        $getAllUsersQuery = $db->prepare("SELECT * FROM user");
        if (PEAR::isError($getAllUsersQuery)) {
            echo "Bad query detected!";
        }

        $res = &$db->execute($getAllUsersQuery);

        if (PEAR::isError($res)) {
            $err = $res->getDebugInfo();
            echo json_encode("An unknown error occured!");
        } else {
            $allUsers = array();
            $count = 0;
            while (($user = $res->fetchRow())) {
                $count++;
                $trueUser = array();
                $trueUser["no"] = $count;
                foreach ($user as $key => $value) {
                    if ($key === 0)
                        $trueUser["userId"] = $value;
                    else if ($key === 1)
                        $trueUser["username"] = $value;
                    else if ($key === 3)
                        $trueUser["fullName"] = $value;
                    else if ($key === 4)
                        $trueUser["birthday"] = $value;
                    else if ($key === 5)
                        $trueUser["gender"] = $value;
                    else if ($key === 6)
                        $trueUser["school"] = $value;
                    else if ($key === 7)
                        $trueUser["class"] = $value;
                    else if ($key === 8)
                        $trueUser["phoneNumber"] = $value;
                    else if ($key === 9)
                        $trueUser["isCounselor"] = $value;
                    else if ($key === 10)
                        $trueUser["state"] = $value;
                }
                $allUsers[] = $trueUser;
            }
            echo '<select style="width: 100%; height: 500px; border-radius: 20px; border-radius: 10px" id="user" name="user" size=20 multiple>';
            foreach ($allUsers as $row) {
                if ($row['username'] != 'admin') {
                    if ($row['userId'] == 2) {
                        echo'<option style="border: 1px solid #00FF00; background-color: #FF8C00; display: table; border-radius: 25px; height: 15px; padding: 5px" selected value="' . $row['userId'] . '">' . $row['fullName'] . '</option>';
                    } else {
                        echo'<option style="border: 1px solid #00FF00; background-color: #FF8C00; display: table; border-radius: 25px; height: 15px; padding: 5px" value="' . $row['userId'] . '">' . $row['fullName'] . ' </option>';
                    }
                }
            }
            echo'</select>';
        }
    }

    public function getAdmin() {
        require '../../utils/db_connection.php';

        $getAllUsersQuery = $db->prepare("SELECT * FROM user");
        if (PEAR::isError($getAllUsersQuery)) {
            echo "Bad query detected!";
        }

        $res = &$db->execute($getAllUsersQuery);

        if (PEAR::isError($res)) {
            $err = $res->getDebugInfo();
            echo json_encode("An unknown error occured!");
        } else {
            $allUsers = array();
            $count = 0;
            while (($user = $res->fetchRow())) {
                $count++;
                $trueUser = array();
                $trueUser["no"] = $count;
                foreach ($user as $key => $value) {
                    if ($key === 0)
                        $trueUser["userId"] = $value;
                    else if ($key === 1)
                        $trueUser["username"] = $value;
                    else if ($key === 3)
                        $trueUser["fullName"] = $value;
                    else if ($key === 4)
                        $trueUser["birthday"] = $value;
                    else if ($key === 5)
                        $trueUser["gender"] = $value;
                    else if ($key === 6)
                        $trueUser["school"] = $value;
                    else if ($key === 7)
                        $trueUser["class"] = $value;
                    else if ($key === 8)
                        $trueUser["phoneNumber"] = $value;
                    else if ($key === 9)
                        $trueUser["isCounselor"] = $value;
                    else if ($key === 10)
                        $trueUser["state"] = $value;
                }
                $allUsers[] = $trueUser;
            }
            echo '<select style="width: 100%; height: 500px; border-radius: 20px; border-radius: 10px" id="user" name="user" size=20 multiple>';
            foreach ($allUsers as $row) {
                if ($row['username'] == 'admin') {
                    echo'<option style="border: 1px solid #00FF00; background-color: #FF8C00; display: table; border-radius: 25px; height: 15px; padding: 5px" selected value="' . $row['userId'] . '">' . $row['fullName'] . '</option>';
                }
            }
            echo'</select>';
        }
    }

}
