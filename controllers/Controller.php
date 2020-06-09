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

public function respondMissingFields(...$fields) {
  if (count($fields) > 1)
    echo json_encode("Missing one of the required fields: " . implode(", ", $fields));
  else
    echo json_encode("Missing the required field: " . $fields[0]);
}

public function validateInput(&...$fields)
{
  foreach ($fields as &$value) {
    $value = strip_tags($value);
  }
}

}