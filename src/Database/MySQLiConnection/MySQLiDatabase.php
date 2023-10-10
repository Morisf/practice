<?php

namespace Moris\Practice\Database\MySQLiConnection;

use Moris\Practice\Database\Interface\DatabaseInterface;
use Moris\Practice\Database\Interface\DatabaseStatement;
use Moris\Practice\Database\Interface\EntityIteratorInterface;
use Moris\Practice\Database\Entity\User;
use Moris\Practice\Database\EntityIterator;

class MySQLiDatabase implements DatabaseInterface {
    private \mysqli $mysqli;
    private string $host;
    private string $user;
    private string $pass;
    private string $dbName;
    private int $dbPort;

    public function __construct($host, $user, $pass, $dbName, $dbPort = 3306) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbName = $dbName;
        $this->dbPort = $dbPort;
    }

    public function connect(): void {
        if (!$this->mysqli) {
            $this->mysqli = new \mysqli($this->host, $this->user, $this->pass, $this->dbName, $this->dbPort);

            if ($this->mysqli->connect_error) {
                die('Connect Error (' . $this->mysqli->connect_errno . ') ' . $this->mysqli->connect_error);
            }
        }
    }

    public function query(string $sql): EntityIteratorInterface {
        $result = $this->mysqli->query($sql);

        $entityIterator = new EntityIterator();
        foreach ($result->fetch_all(MYSQLI_ASSOC) as $row) {
            $entity = new User();
            foreach ($row as $fieldName => $fieldValue) {
                $entity->$fieldName = $fieldValue;
                $entityIterator->addItem($entity);
            }
        }
        return $entityIterator;
    }

    public function prepare(string $sql): DatabaseStatement {
        $stmt = $this->mysqli->prepare($sql);
        return new MySQLiStatementWrapper($stmt);
    }
}