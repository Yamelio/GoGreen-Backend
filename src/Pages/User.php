<?php
namespace Pages;

use Tables\UserTable;


class User extends Page

{
    public function GET($parameters)
    {
        return UserTable::getUsers();
    }

    public function POST($parameters)
    {
        return array("Nope" => "Not supported");
    }

    public function PUT($parameters)
    {
        return UserTable::addUser($parameters["name"],$parameters["surname"],$parameters["login"],$parameters["pass"],$parameters["address"], $parameters["company"], $parameters["phoneNumber"]);
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
