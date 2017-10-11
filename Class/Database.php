<?php
namespace APP;
class Database
{
    private static $dbHost = "localhost";
    private static $dbName = "personnal_blog";
    private static $dbUser = "root";
    private static $dbUserPassword = "";

    private static $connection = null;

    /**
     * @return null|PDO
     */
    public static function connect()
    {
        try
        {
            self::$connection = new \PDO("mysql:host=" . self::$dbHost . "; dbname=" . self::$dbName, self::$dbUser, self::$dbUserPassword);
        }
        catch (PDOException $e)
        {
            die($e -> getMessage());
        }
        return self::$connection;
    }

    public static function disconnect()
    {
        self::$connection = null;
    }
}