<?php

namespace Tables;

use Database;
//use Models\UserModel;

class UserModel
{
    private $id;
    private $name;
    private $surname;
    private $login;
    /*
    private $password;
    private $salt;
    */
    private $address;
    private $phoneNumber;
    private $rate;
    private $companyName;
    private $companyAddress;

/*
    public function __construct($id, $name, $surname, $login, $password, $salt, $address, $company, $phoneNumber, $rate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->login = $login;
        $this->password = $password;
        $this->salt = $salt;
        $this->address = $address;
        $this->company = $company;
        $this->phoneNumber = $phoneNumber;
        $this->rate = $rate;
    }
*/
    public function __construct($id, $name, $surname, $login, $address, $phoneNumber, $rate, $companyName, $companyAddress)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->login = $login;
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
        $this->rate = $rate;
        $this->companyName = $companyName;
        $this->companyAddress = $companyAddress;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param mixed $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param mixed $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

    /**
     * @return mixed
     */
    public function getCompanyAddress()
    {
        return $this->companyAddress;
    }

    /**
     * @param mixed $companyAddress
     */
    public function setCompanyAddress($companyAddress)
    {
        $this->companyAddress = $companyAddress;
    }


    public function toArray() {
        return array(
            "id" => $this->id,
            "name" => $this->name,
            "surname" => $this->surname,
            "login" => $this->login,
            "address" => $this->address,
            "phoneNumber" => $this->phoneNumber,
            "rate" => $this->rate,
            "compayName"=>$this->companyName,
            "companyAddress" => $this->companyAddress
        );
    }
}


class UserTable
{
    public static function getUsers(){

        $req=Database::fetchAll("select * from user as u, company as c where u.company=c.id and c.id=1;");

        $res=array();
        foreach ($req as $row) {
            $user = new UserModel($row[0], $row[1], $row[2], $row[3], $row[6], $row[8], $row[9], $row[11], $row[12]);
            $res[]=$user->toArray();
        }
        return $res;
    }

    public static function AddUser($name,$surname,$login,$pass,$address, $company, $phoneNumber){

        $salt=mcrypt_create_iv(32,MCRYPT_DEV_URANDOM);
        $crypted_pw=crypt($pass,$salt);
        $req="insert into user(name,surname,login,password,salt,address,company,phoneNumber,rate) values(:name, :surname, :login, :password, :salt, :address, :company, :phoneNumber, '5');";
        $params=array(':name' => $name, ':surname' => $surname, ':login' => $login, ':password' => $crypted_pw,':salt' => $salt, ':address' => $address, ':company' => $company, ':phoneNumber' => $phoneNumber);
        Database::execInser($req,$params);
        return "ok";
    }
}
