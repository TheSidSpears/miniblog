<?php


namespace Miniblog;


class DatabaseConnection
{
    static private $instance = null;
    public $dbh;

    protected function __construct()
    {
        $this->dbh = new \PDO('mysql:host=mysql;dbname=test', 'dev', 'dev'); // todo move to .env
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    static public function getInstance()
    {
        return self::$instance ?? new self;
    }
}