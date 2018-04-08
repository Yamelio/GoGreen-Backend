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

    public static function checkLogin($login,$pass){

        $res=Database::fetchOne("select id,password,salt from user where login=:login",array(':login' => $login));
        $realpass=$res["password"];
        $salt=$res["salt"];
        $id=$res["id"];
        $cryptedtest=crypt($pass,$salt);
        if($realpass==$cryptedtest){
            return $id;
        }
        else{
            return false;
        }
    }

}
