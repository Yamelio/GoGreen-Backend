<?php

namespace Tables;

use Database;
//use Models\UserModel;

class CarModel
{
    private $id;
    private $driver;
    private $numberSeats;
    private $licencePlate;

    /**
     * CarModel constructor.
     * @param $id
     * @param $driver
     * @param $numberSeats
     * @param $licencePlate
     */
    public function __construct($id, $driver, $numberSeats, $licencePlate)
    {
        $this->id = $id;
        $this->driver = $driver;
        $this->numberSeats = $numberSeats;
        $this->licencePlate = $licencePlate;
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
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * @param mixed $driver
     */
    public function setDriver($driver)
    {
        $this->driver = $driver;
    }

    /**
     * @return mixed
     */
    public function getNumberSeats()
    {
        return $this->numberSeats;
    }

    /**
     * @param mixed $numberSeats
     */
    public function setNumberSeats($numberSeats)
    {
        $this->numberSeats = $numberSeats;
    }

    /**
     * @return mixed
     */
    public function getLicencePlate()
    {
        return $this->licencePlate;
    }

    /**
     * @param mixed $licencePlate
     */
    public function setLicencePlate($licencePlate)
    {
        $this->licencePlate = $licencePlate;
    }



    public function toArray() {
        return array(
            "id" => $this->id,
            "driver" => $this->driver,
            "numberSeats" => $this->numberSeats,
            "licencePlate" => $this->licencePlate
        );
    }
}


class CarTable
{
    public static function getCars(){

        $req=Database::fetchAll("select * from car;");

        $res=array();
        foreach ($req as $row) {
            $car = new CarModel($row[0], $row[1], $row[2], $row[3]);
            $res[]=$car->toArray();
        }
        return $res;
    }

    public static function addCar($driver, $numberSeats, $licencePlate){

        $req="insert into car(driver,numberSeats,licencePlate) values(:driver, :numberSeats, :licencePlate);";
        $params=array(':driver' => $driver, ':numberSeats' => $numberSeats, ':licencePlate' => $licencePlate);
        Database::execInser($req,$params);
        return "ok";
    }
}
