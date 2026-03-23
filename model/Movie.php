<?php

//Import Files
require_once 'DBConfig.php';

class Movie{

    static function getAllMovie(){

        try{
            $DBCon = DBConfig::getConnection();
            $resultObj = $DBCon->query('SELECT * FROM `movies`;');
            $result = $resultObj->fetch_all(MYSQLI_ASSOC);
        }
        catch(Exception $e){
            http_response_code(500);
            echo $e->getMessage();
            $result = false;
        }
        finally{
            $DBCon->close();
            return $result;
        }
    }
}