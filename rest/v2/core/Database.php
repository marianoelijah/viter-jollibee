<?php

//db connection

class Database
{
    private static $dbConnection;

    public static function connectDb()
    {

        // Localhost
        $host = "localhost";
        $dbname = "jollibee_v1";
        $username = "root";
        $password = "";

        if (self::$dbConnection === null) {
            self::$dbConnection = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
            self::$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }

        return self::$dbConnection;
    }
}
