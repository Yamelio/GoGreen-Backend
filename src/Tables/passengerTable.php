<?php

namespace Tables;

use Database;
//use Models\UserModel;

class PassengerModel
{
    private $bid;
    private $passenger;

    /**
     * PassengerModel constructor.
     * @param $bid
     * @param $passenger
     */
    public function __construct($bid, $passenger)
    {
        $this->bid = $bid;
        $this->passenger = $passenger;
    }

    /**
     * @return mixed
     */
    public function getBid()
    {
        return $this->bid;
    }

    /**
     * @param mixed $bid
     */
    public function setBid($bid)
    {
        $this->bid = $bid;
    }

    /**
     * @return mixed
     */
    public function getPassenger()
    {
        return $this->passenger;
    }

    /**
     * @param mixed $passenger
     */
    public function setPassenger($passenger)
    {
        $this->passenger = $passenger;
    }

    public function toArray() {
        return array(
            "bid" => $this->bid,
            "passenger" => $this->passenger
        );
    }
}


class PassengerTable
{
    public static function getPassengers(){

        $req=Database::fetchAll("select * from passenger;");

        $res=array();
        foreach ($req as $row) {
            $passenger = new PassengerModel($row[0], $row[1]);
            $res[]=$passenger->toArray();
        }
        return $res;
    }

    public static function addPassenger($bid,$passenger){

        $req="insert into passenger values(:bid, :passenger);";
        $params=array(':bid' => $bid, ':passenger' => $passenger);
        Database::execInser($req,$params);
        return "ok";
    }
}
