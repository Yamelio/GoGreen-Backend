<?php
namespace Pages;

use Tables\BidTable;


class Bid extends Page

{
    public function GET($parameters)
    {
        return BidTable::getBids();
    }

    public function POST($parameters)
    {
        return array("Nope" => "Not supported");
    }

    public function PUT($parameters)
    {
        return BidTable::addBid($parameters["car"],$parameters["departureTime"],$parameters["fromCompany"]);
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
