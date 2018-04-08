<?php

namespace Tables;

use Database;
//use Models\UserModel;

class BidModel
{
    private $id;
    private $car;
    private $departureTime;
    private $fromCompany;

    /**
     * CarModel constructor.
     * @param $id
     * @param $car
     * @param $departureTime
     * @param $fromCompany
     */
    public function __construct($id, $car, $departureTime, $fromCompany)
    {
        $this->id = $id;
        $this->car = $car;
        $this->departureTime = $departureTime;
        $this->fromCompany = $fromCompany;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * @param mixed $car
     */
    public function setCar($car)
    {
        $this->car = $car;
    }

    /**
     * @return mixed
     */
    public function getDepartureTime()
    {
        return $this->departureTime;
    }

    /**
     * @param mixed $departureTime
     */
    public function setDepartureTime($departureTime)
    {
        $this->departureTime = $departureTime;
    }

    /**
     * @return mixed
     */
    public function getFromCompany()
    {
        return $this->fromCompany;
    }

    /**
     * @param mixed $fromCompany
     */
    public function setFromCompany($fromCompany)
    {
        $this->fromCompany = $fromCompany;
    }



    public function toArray() {
        return array(
            "id" => $this->id,
            "car" => $this->car,
            "departureTime" => $this->departureTime,
            "fromCompany" => $this->fromCompany
        );
    }
}


class BidTable
{
    public static function getBids(){

        $req=Database::fetchAll("select * from bid;");

        $res=array();
        foreach ($req as $row) {
            $bid = new BidModel($row[0], $row[1], $row[2], $row[3]);
            $res[]=$bid->toArray();
        }
        return $res;
    }

    public static function addBid($car, $departureTime, $fromCompany){

        $req="insert into bid(car,departureTime,fromCompany) values(:car, :departureTime, :fromCompany);";
        $params=array(':car' => $car, ':departureTime' => $departureTime, ':fromCompany' => $fromCompany);
        Database::execInser($req,$params);
        return "ok";
    }
}
