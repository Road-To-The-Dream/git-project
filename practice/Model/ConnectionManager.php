<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 06.01.2019
 * Time: 12:33
 */

namespace practice\Model;

class ConnectionManager
{
    private static $instance = null;

    /**
     * ConnectionManager constructor.
     */
    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    /**
     * @return null
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::connection();
        }
        return self::$instance;
    }

    private static function connection()
    {
        $config = require 'DBconfiguration.php';

        $dsn = 'mysql:dbname=' . $config['dbname'] . ';host=' . $config['host'];
        try {
            self::$instance = new \PDO($dsn, $config['user'], $config['password'], [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . $config['charset']]);

            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    /**
     * @param $query
     * @param array $parameters
     * @param int $mode
     * @return null
     */
    public static function executionQuery($query, $parameters = [], $mode = \PDO::FETCH_ASSOC)
    {
        try {
            $query = trim(str_replace('\r', '', $query));
            $rawStatement = explode(' ', preg_replace("/\s+|\t+|\n+/", " ", $query));
            $statement = strtolower($rawStatement[0]);

            if ($statement === 'select') {
                $statement = self::$instance->query($query);
                return $statement->fetchAll($mode);
            } elseif ($statement === 'insert' || $statement === 'update' || $statement === 'delete') {
                $statement = self::$instance->prepare($query);
                $statement->execute($parameters);
            } else {
                return null;
            }
        } catch (\PDOException $ex) {
            exit($ex->getMessage());
        }
    }
}
