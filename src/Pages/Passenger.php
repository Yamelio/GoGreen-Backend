<?php
namespace Pages;

use Tables\PassengerTable;


class Passenger extends Page

{
    public function GET($parameters)
    {
        return PassengerTable::getPassengers();
    }

    public function POST($parameters)
    {
        return array("Nope" => "Not supported");
    }

    public function PUT($parameters)
    {
        return PassengerTable::addPassenger($parameters["bid"],$parameters["passenger"]);
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
