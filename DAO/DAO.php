<?php

namespace desafioprojetolegado\DAO;

use PDO;

abstract class DAO extends PDO
{
    protected static $connection = null;

    public function __construct()
    {
        self::getConnection();
    }

    protected static function getConnection()
    {
        if (self::$connection == null) {

            self::$connection = new PDO(
                "mysql:host=" . $_ENV['db']['host'] .
                ";dbname=" . $_ENV['db']['database'] .
                ";charset=utf8",
                $_ENV['db']['user'],
                $_ENV['db']['pass']
            );

            self::$connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        }

        return self::$connection;
    }
}
