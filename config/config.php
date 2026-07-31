<?php
 
/** Configuration Variables **/

define('DB_NAME', getenv('DB_NAME') ?: 'bkod');
define('DB_USER', getenv('DB_USER') ?: 'bkod_app');
define('DB_PASSWORD', getenv('DB_PASSWORD') ?: '');
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_TYPE', getenv('DB_TYPE') ?: 'mysqli');
