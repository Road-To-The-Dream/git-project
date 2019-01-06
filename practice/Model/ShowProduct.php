<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 06.01.2019
 * Time: 12:33
 */

namespace practice\Model;


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
            $this->pdo = new \PDO($dsn, $this->settings['user'], $this->settings['password']);
        } catch (\PDOException $ex) {
            exit($ex->getMessage());
        }
    }

}