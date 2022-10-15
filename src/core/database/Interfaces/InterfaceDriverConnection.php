<?php

namespace Source\Core\Database\Interfaces;

use PDO;

Interface InterfaceDriverConnection
{
    /**
     * @return string
     */
    public function getPath(): string;

    /**
     * @param string $path
     */
    public function setPath(string $path);
    /**
     * @return string
     */
    public function getDatabaseName(): string;

    /**
     * @param string $databaseName
     */
    public function setDatabaseName(string $databaseName);

    /**
     * @return null
     */
    public function getDb();

    /**
     * @param PDO $db
     */
    public function setDb(PDO $db);
    /**
     * @return string
     */
    public function getTable(): string;

    /**
     * @param string $table
     */
    public function setTable(string $table): void;


    public function __construct();

    /**
     * @return PDO|void
     */
    public function connection();

    /**
     * @param $fields
     * @param $values
     * @return bool
     */
    public function insert($fields, $values): bool;
    /**
     * @param string $fields
     * @param null $where
     * @param null $join
     * @param null $order
     * @param null $limit
     * @param bool $fetchAll
     * @return mixed
     */
    public function select(string $fields = '*', $where = null, $join = null, $order = null, $limit = null, bool $fetchAll = true): mixed;

    /**
     * @param null $where
     * @param array $fields
     * @param array $values
     * @return bool
     */
    public function update($where = null, array $fields = [], array $values = []): bool;

    /**
     * @param null $where
     * @return bool
     */
    public function delete($where = null): bool;

    /**
     * @description Gera o where da consulta formato => $where[] = ['P' => 'id' , 'OP' => '=', 'V' => '2'];
     * @param $where
     * @return string
     */
    public function where($where): string;

    /**
     * @param $join
     * @return string
     */
    public function join($join): string;

    /**
     * @param $order
     * @return string
     */
    public function order($order): string;

    /**
     * @param $limit
     * @return string
     */
    public function limit($limit): string;
}