<?php
/**
 * Created by PhpStorm.
 * User: Yamei
 * Date: 15/01/2018
 * Time: 11:40
 */


error_reporting(E_ALL);
ini_set('display_errors', 1);
error_reporting(E_ERROR | E_PARSE);

require_once __DIR__."/vendor/autoload.php";
$method = $_SERVER["REQUEST_METHOD"];
use Pages\Bid;
$bid=new Bid();
switch($method) {
    case "GET":
        echo json_encode($bid->GET($_GET));
        break;

    case "POST":
        echo json_encode($bid->POST($_POST));
        break;

    case "PUT":
        parse_str(file_get_contents("php://input"), $parameters);
        echo json_encode($bid->PUT($_GET));
        break;

    case "DELETE":
        parse_str(file_get_contents("php://input"), $parameters);
        echo json_encode($bid->DELETE($parameters));
        break;

    default:
        echo json_encode($bid->OTHER());
}