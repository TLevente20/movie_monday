<?php

//Import Files
require_once 'DBConfig.php';

class Movie{

    static function getAllMovie(){

        try{
            $DBCon = DBConfig::getConnection();
            $resultObj = $DBCon->query('SELECT * FROM `movies`;');
            $result = $resultObj->fetch_all(MYSQLI_ASSOC);
            $success = true;
        }

        catch(Exception $error){
            $result = $error->getMessage();
            $success = false;
        }

        finally{
            $DBCon->close();

            return [
                'result' => $result,
                'success' => $success
            ];
        }
    }
}

//Test database querry
// var_dump(Movie::getAllMovie());