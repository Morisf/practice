<?php

namespace Moris\Practice\Database\MySQLiConnection;

use Moris\Practice\Database\Interface\DatabaseStatement;

class MySQLiStatementWrapper implements DatabaseStatement {
    private \mysqli_stmt $mysqliStmt;

    public function __construct(\mysqli_stmt $stmt) {
        $this->mysqliStmt = $stmt;
    }

    public function execute(array $params = []): bool {
        if ($params) {
            $this->mysqliStmt->bind_param(str_repeat('s', count($params)), ...$params);
        }
        return $this->mysqliStmt->execute();
    }

    public function fetch(): array {
        $result = $this->mysqliStmt->get_result();
        return $result->fetch_assoc() ?: [];
    }

    public function fetchAll(): array {
        $result = $this->mysqliStmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}