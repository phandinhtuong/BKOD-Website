<?php

class Controller
{
protected $_model;
protected $_controller;

public function __construct($model)
{
$this->_controller = ucwords(__CLASS__);
$this->_model = $model;
}

public function respondMissingFields() {
  echo json_encode("Missing required fields. Please check again!");
}

}