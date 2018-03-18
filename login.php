<?php
/**
 * Created by PhpStorm.
 * User: Yamei
 * Date: 18/03/2018
 * Time: 22:37
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);
error_reporting(E_ERROR | E_PARSE);

require_once __DIR__."/vendor/autoload.php";
$method = $_SERVER["REQUEST_METHOD"];
use Pages\Login;
$login=new Login();
switch($method) {
    case "GET":
        echo json_encode($login->GET($_GET));
        break;

    case "POST":
        echo json_encode($login->POST($_POST));
        break;

    case "PUT":
        parse_str(file_get_contents("php://input"), $parameters);
        echo json_encode($login->PUT($parameters));
        break;

    case "DELETE":
        parse_str(file_get_contents("php://input"), $parameters);
        echo json_encode($login->DELETE($parameters));
        break;

    default:
        echo json_encode($login->OTHER());
}