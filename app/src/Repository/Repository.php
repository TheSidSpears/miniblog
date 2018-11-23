<?php


namespace Miniblog\Repository;


use Miniblog\DatabaseConnection;

abstract class Repository
{
    protected $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getInstance()->dbh;
    }
}