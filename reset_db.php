<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 13/05/2017
 * Time: 16:48
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);
error_reporting(E_ERROR | E_PARSE);

require_once __DIR__."/vendor/autoload.php";
$method = $_SERVER["REQUEST_METHOD"];
require_once 'src/Database.php';

Database::reset();
print("Done");