<?php

include_once ("../Controller.php");

class MessageController extends Controller {

    public function __construct($model) {
        parent::__construct($model);
    }

    public function getAllMessages($currentUserId, $selectedUserId) {
        try {
            $allMessages = $this->_model->getAllMessages($currentUserId, $selectedUserId);
            echo $allMessages;
        } catch (Exception $e) {
            echo json_encode("Application error:" . $e->getMessage());
        }
    }
    
    public function getMessageInfo($messageId) {
        try {
            $messageInfo = $this->_model->getMessageInfo($messageId);
            echo $messageInfo;
        } catch (Exception $e) {
            echo json_encode("Application error:" . $e->getMessage());
        }
    }

    public function sendMessage($senderId, $receiverId, $message) {
        try {
            $result = $this->_model->sendMessage($senderId, $receiverId, $message);
            echo $result;
        } catch (Exception $e) {
            echo json_encode("Application error:" . $e->getMessage());
        }
    }
}

include ("../../models/MessageModel.php");
$messageController = new MessageController(new MessageModel());


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

