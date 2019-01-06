<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 06.01.2019
 * Time: 12:33
 */

namespace practice\Model;
use PDO;

class ShowProduct
{
    private $pdo;
    private $isConnected;
    private $statement;
    protected $settings = [];
    private $parameters = [];

    public function __construct(array $settings)
    {
        $this->settings = $settings;
        $this->connect();
    }

    private function connect()
    {
        $dsn = 'mysql:dbname=' . $this->settings['dbname'] . ';host=' . $this->settings['host'];
        try {
            $this->pdo = new \PDO($dsn, $this->settings['user'], $this->settings['password'], [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' .$this->settings['charset']]);

            # Disable emulations and we can now log
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            $this->isConnected = true;
            $this->init('Select name From client');
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function closeConnection()
    {
        $this->pdo = null;
    }

    private function init($query, array $parameters = [])
    {
        if(!$this->isConnected) {
            $this->connect();
        }

        try {
            $this->statement = $this->pdo->prepare($query);

            //$this->bind($parameters);
        } catch (\PDOException $ex) {
            exit($ex->getMessage());
        }
    }

//    private function bind($parameters)
//    {
//        if(!empty($parameters) and is_array($parameters)) {
//            $columns = array_keys($parameters);
//
//            foreach ($columns as $i)
//        }
//    }
}
$config = require_once 'config.php';
 $obj = new ShowProduct($config['db']);

