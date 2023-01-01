<?php

class Database
{
    public $connection;
    public $statement;
    public static $_instance;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public static function getDbInstance()
    {
        $config = require 'config.php';

        if (!isset(self::$_instance)) {
            self::$_instance = new Database($config);
        }
        return self::$_instance;
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function get($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this->statement->fetch();
    }
}
