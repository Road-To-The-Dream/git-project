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
    private $pdo;
    private $isConnected;
    private $statement;
    protected $settings = [];

    public function __construct(array $settings)
    {
        $this->settings = $settings;
        $this->Connect();
    }

    private function Connect()
    {
        $dsn = 'mysql:dbname=' . $this->settings['dbname'] . ';host=' . $this->settings['host'];
        try {
            $this->pdo = new \PDO($dsn, $this->settings['user'], $this->settings['password'], [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' .$this->settings['charset']]);

            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            $this->isConnected = true;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

//    private function init($sql, $parameters)
//    {
//        if(!$this->isConnected()) {
//            $this->Connect();
//        }
//
//        try {
//            $this->statement = $this->pdo->prepare($sql);
//
//        }
//    }

    public function ExecutionQuery($query, $parameters = [], $mode = \PDO::FETCH_ASSOC)
    {
        try {
            $query = trim(str_replace('\r', '', $query));
            $rawStatement = explode(' ', preg_replace("/\s+|\t+|\n+/", " ", $query));
            $statement = strtolower($rawStatement[0]);

            if ($statement === 'select') {
                $this->statement = $this->pdo->query($query);
                return $this->statement->fetchAll($mode);
            } else if ($statement === 'insert' || $statement === 'update' || $statement === 'delete') {
                $this->statement = $this->pdo->prepare($query);
                $this->statement->execute($parameters);
            } else {
                return null;
            }
        } catch (\PDOException $ex) {
            exit($ex->getMessage());
        }
    }

    public function closeConnection()
    {
        $this->pdo = null;
    }
}

