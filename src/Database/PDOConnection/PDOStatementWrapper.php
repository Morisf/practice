<?php

namespace Moris\Practice\Database\PDOConnection;

use Moris\Practice\Database\Interface\DatabaseStatement;

class PDOStatementWrapper implements DatabaseStatement {
    private $pdoStatement;

    public function __construct(\PDOStatement $stmt) {
        $this->pdoStatement = $stmt;
    }

    public function execute(array $params = []): bool {
        return $this->pdoStatement->execute($params);
    }

    public function fetch(): array {
        return $this->pdoStatement->fetch(\PDO::FETCH_ASSOC) ?: [];
    }

    public function fetchAll(): array {
        return $this->pdoStatement->fetchAll(\PDO::FETCH_ASSOC);
    }
}