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
