<?php

require_once 'config.php';

// PATTER SINGLETON
class Db
{
    protected static $instance = null;

    public static function getConnection()
    {
        if (self::$instance === null) {
            $dsn = 'mysql:host=' . HOST . ';dbname=' . DB_NAME . ';charset=' . CHARSET;
            $opt = array(
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );

            self::$instance = new PDO($dsn, USER, PASSWORD, $opt); // PDO object
        }

        return self::$instance;
    }

    private function __construct() {}
}