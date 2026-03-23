<?php
class DBConfig{

    private static $host = 'localhost';
    private static $dbName = 'movie_monday';
    private static $user = 'root';
    private static $password = 'root';


    static function getConnection(): mysqli{

        $connection = new mysqli(
            self::$host,
            self::$user,
            self::$password,
            self::$dbName
        );

        return $connection;
    }
}