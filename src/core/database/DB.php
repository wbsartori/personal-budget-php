<?php

namespace Source\Core\Database;

use Source\Core\Database\Drivers\ConnectionSQLite;

class DB extends ConnectionSQLite
{
    public function __construct($table)
    {
        parent::__construct($table);
    }

    public function insert($fields, $values): bool
    {
        return parent::insert($fields, $values);
    }

    public function select(string $fields = '*', $where = null, $join = null, $order = null, $limit = null, bool $fetchAll = true): mixed
    {
        return parent::select($fields, $where, $join, $order, $limit, $fetchAll);
    }

    public function update($where = null, array $fields = [], array $values = []): bool
    {
        return parent::update($where, $fields, $values);
    }

    public function delete($where = null): bool
    {
        return parent::delete($where);
    }
}