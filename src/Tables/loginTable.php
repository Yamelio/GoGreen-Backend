<?php
/**
 * Created by PhpStorm.
 * User: Yamei
 * Date: 18/03/2018
 * Time: 22:03
 */

namespace Tables;

use Database;

class LoginTable
{
    public static function AddUser($name,$surname,$login,$pass,$address, $company, $phoneNumber){

        $salt=mcrypt_create_iv(32,MCRYPT_DEV_URANDOM);
        $crypted_pw=crypt($pass,$salt);
        $req="insert into user(name,surname,login,password,salt,address,company,phoneNumber,rate) values(:name, :surname, :login, :password, :salt, :address, :company, :phoneNumber, '5');";
        $params=array(':name' => $name, ':surname' => $surname, ':login' => $login, ':password' => $crypted_pw,':salt' => $salt, ':address' => $address, ':company' => $company, ':phoneNumber' => $phoneNumber);
        Database::execInser($req,$params);
        return "ok";
    }
}
