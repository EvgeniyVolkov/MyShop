<?php
namespace shop\db;

require_once 'config.php';
use PDO;

// PATTER SINGLETON
class Db
{
    protected static $instance = null;

    /**
     * @return PDO
     */
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