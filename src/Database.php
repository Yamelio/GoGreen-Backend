<?php

class Database
{

    public static function getConnection()
    {
        if (!isset($connection))
        {
            try {
                $connection = new PDO("mysql:host=localhost;dbname=covoit", "root", "");
                // set the PDO error mode to exception
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e)
            {
                $connection=null;
            }
        }
        return $connection;
    }
    
    public static function fetchAll($sql,$params=null)
    {
        $db = Database::getConnection();
        $stmt=$db->prepare($sql);
        if($params==null){
            $stmt->execute();
            $res=$stmt->fetchAll();
        }else{
            $stmt->execute($params);
            $res=$stmt->fetchAll();
        }
        return $res;

    }
    
    public static function fetchOne($sql,$params=null)
    {
        $db = Database::getConnection();
        $stmt=$db->prepare($sql);
        if($params==null){
            $stmt->execute();
            $res=$stmt->fetchAll();
        }else{
            $stmt->execute($params);
            $res=$stmt->fetchAll();
        }
        return $res[0];
    }
    
    public static function execInser($sql,$params=null)
    {
        $db = Database::getConnection();
        $stmt=$db->prepare($sql);
        if($params==null){
            $stmt->execute();
        }else{
            $stmt->execute($params);
        }
        return $db->lastInsertId();
    }

    public static function exec($sql,$params=null)
    {
        $db = Database::getConnection();
        $stmt=$db->prepare($sql);
        if($params==null){
            $affected=$stmt->execute();
        }else{
            $affected=$stmt->execute($params);
        }
        return $affected;
    }

    public static function reset()
    {
        $sql = file_get_contents('reset.sql');
        Database::getConnection()->query($sql);
    }
}
