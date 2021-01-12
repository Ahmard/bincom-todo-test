<?php


namespace App;


use PDO;

class Database
{
    private static PDO $pdoInstance;

    public static function create(array $config): PDO
    {
        self::$pdoInstance = new PDO("sqlite:{$config['db']['sqliteDb']}");
        self::$pdoInstance->setAttribute(PDO::ERRMODE_EXCEPTION, true);
        self::$pdoInstance->setAttribute(PDO::FETCH_ASSOC, true);
        return self::$pdoInstance;
    }

    /**
     * @return PDO
     */
    public static function getPdoInstance(): PDO
    {
        return self::$pdoInstance;
    }
}