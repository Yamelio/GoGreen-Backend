<?php
/**
 * Created by PhpStorm.
 * User: Yamei
 * Date: 18/03/2018
 * Time: 22:21
 */

namespace Pages;

use Tables\LoginTable;


class Login extends Page

{
    public function GET($parameters)
    {
        return array("Nope" => "Not supported");
    }

    public function POST($parameters)
    {
        return LoginTable::checkLogin($parameters["login"],$parameters["pass"]);
    }

    public function PUT($parameters)
    {
        return array("Nope" => "Not supported");
    }

    public function DELETE($parameters)
    {
        return array("Nope" => "Not supported");

    }

    public function OTHER()
    {
        return array("Nope" => "Not supported");
    }
}