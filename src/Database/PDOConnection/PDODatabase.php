<?php

namespace Moris\Practice\Database\PDOConnection;

use Moris\Practice\Database\Interface\DatabaseInterface;
use Moris\Practice\Database\Interface\DatabaseStatement;
use Moris\Practice\Database\Interface\EntityIteratorInterface;
use Moris\Practice\Database\Entity\User;
use Moris\Practice\Database\EntityIterator;

class PDODatabase implements DatabaseInterface {
    private $pdo;
    private string $dsn;
    private string $user;
    private string $pass;
    private array $options;

    public function __construct($dsn, $user, $pass, $options = []) {
        $this->dsn = $dsn;
        $this->user = $user;
        $this->pass = $pass;
        $this->options = $options;
    }

    public function connect(): void {
        if (!$this->pdo) {
            $this->pdo = new \PDO($this->dsn, $this->user, $this->pass, $this->options);
        }
    }

    public function query(string $sql): EntityIteratorInterface {
        $stmt = $this->pdo->query($sql);

        /** for now just an example, later rewrite to find class or throw exception */
        $entityIterator = new EntityIterator();
        foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $entity = new User();
            foreach ($row as $fieldName => $fieldValue) {
                $entity->$fieldName = $fieldValue;
                $entityIterator->addItem($entity);
            }
        }

        return $entityIterator;
    }

    public function prepare(string $sql): DatabaseStatement {
        $stmt = $this->pdo->prepare($sql);
        return new PDOStatementWrapper($stmt);
    }
}