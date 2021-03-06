<?php
// CONNEXION A LA BASE DE DONNEES 
class Database
{
    private static $dbHost = "localhost";
    private static $dbName = "hopital";
    private static $dbUsername = "nathan";
    private static $dbUserpassword = "oskour";

    private static $connection = null;

    public static function connect()
    {
        if(self::$connection == null)
        {
            try
            {
              self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName , self::$dbUsername, self::$dbUserpassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }

    public static function disconnect()
    {
        self::$connection = null;
    }

}
?>
