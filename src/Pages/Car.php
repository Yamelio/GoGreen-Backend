<?php
namespace Pages;

use Tables\CarTable;


class Car extends Page

{
    public function GET($parameters)
    {
        return CarTable::getCars();
    }

    public function POST($parameters)
    {
        return array("Nope" => "Not supported");
    }

    public function PUT($parameters)
    {
        return CarTable::addCar($parameters["driver"],$parameters["numberSeats"],$parameters["licencePlate"]);
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
