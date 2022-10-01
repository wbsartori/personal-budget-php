<?php

namespace Server\PersonalBudget\Core\Database\Drivers;

use DateTime;
use Exception;
use PDO;

/**
 * @description Classe de conexão com Driver SQLite
 * @author Wesley Bonfim Sartóri wbsartori@gmail.com
 */
class ConnectionSQLite
{
    /**
     * @var string
     */
    private string $path = '';

    /**
     * @var string
     */
    private string $databaseName = '';

    /**
     * @var null
     */
    private $db = null;

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getDatabaseName(): string
    {
        return $this->databaseName;
    }

    /**
     * @param string $databaseName
     */
    public function setDatabaseName(string $databaseName)
    {
        $this->databaseName = $databaseName;
    }

    /**
     * @return null
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param PDO $db
     */
    public function setDb(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @return PDO|void
     */
    public function connection()
    {
        $this->setDatabaseName('database.sqlite');
        $this->setPath(BASE_ROOT . '\\database\\');

        try {
            return new PDO('sqlite:' . $this->getPath() . $this->getDatabaseName());

        } catch (Exception $exception) {
            echo $exception->getMessage();
            //throw new Exception($exception->getMessage());
        }
    }

    /**
     * @param $table
     * @param $fields
     * @param $values
     * @return bool
     */
    public function insert($table, $fields, $values): bool
    {
        $db = $this->connection();

        $date = new DateTime();
        array_push($fields, 'createdAt', 'updatedAt');
        array_push($values, $date->format('Y-m-d'), $date->format('Y-m-d'));
        $statement = $db->query('INSERT INTO ' . $table . ' (' . implode(',', $fields) . ') VALUES ("' . implode('","', $values) . '")');

        if ($statement->execute()) {
            return true;
        }

        return false;
    }

    /**
     * @param $table
     * @param string $fields
     * @param null $where
     * @param null $join
     * @param null $order
     * @param null $limit
     * @param bool $fetchAll
     * @return mixed
     */
    public function select($table, string $fields = '*', $where = null, $join = null, $order = null, $limit = null, bool $fetchAll = true): mixed
    {
        $data = [];
        $db = $this->connection();

        if(!is_null($where)){
            $where = $this->where($where);
        }

        if($fields < 0)
        {
            $fields = '*';
        }

        $statement = $db->query('SELECT ' . $fields . ' FROM ' . $table . $where . $join . $order . $limit);
        $list = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($list as $item) {
            $data[] = $item;
        }

        if (!$fetchAll) {
            return $data[0];
        }

        return $data;
    }

    /**
     * @param $table
     * @param null $where
     * @param array $fields
     * @param array $values
     * @return bool
     */
    public function update($table, $where = null, array $fields = [], array $values = []): bool
    {
        $db = $this->connection();
        $query = [];
        $date = new DateTime();
        array_push($fields, 'updatedAt');
        array_push($values, $date->format('Y-m-d'));

        foreach ($fields as $fieldkey => $field) {
            foreach ($values as $valueKey => $value) {
                if ($fieldkey === $valueKey) {
                    $query[] = $field . ' = "' . $value . '"';
                }
            }
        }

        $queryString = implode(',', $query);
        $statement = $db->query('UPDATE ' . $table . ' SET ' . $queryString . $this->where($where));

        if ($statement->execute()) {
            return true;
        }

        return false;
    }

    /**
     * @param $table
     * @param null $where
     * @return bool
     */
    public function delete($table, $where = null): bool
    {
        $db = $this->connection();
        $statement = $db->query('DELETE FROM ' . $table . $this->where($where));

        if ($statement->execute()) {
            return true;
        }

        return false;
    }

    /**
     * @description Gera o where da consulta formato => $where[] = ['P' => 'id' , 'OP' => '=', 'V' => '2'];
     * @param $where
     * @return string
     */
    public function where($where): string
    {
        $sql = '';
        $countParams = count($where);

        foreach ($where as $item) {
            if ($countParams > 1) {
                $sql .= $item['P'] . ' ' . $item['OP'] . ' ' . $item['V'] . ' AND ';
            } else {
                $sql = $item['P'] . ' ' . $item['OP'] . ' ' . $item['V'];
            }
        }

        $sqlCount = substr($sql, strlen($sql) - 4, strlen($sql));

        if (trim($sqlCount) === "AND") {
            return ' WHERE ' . substr($sql, -strlen($sql), strlen($sql) - 4);
        }

        return ' WHERE ' . $sql;
    }

    /**
     * @description Gera o join da consulta formato => $join[] = ['TBR' => 'person' , 'CR' => 'id', 'TBD' => 'income', 'CD' => 'idPerson'];
     * @param $join
     * @return string
     */
    public function join($join): string
    {
        $sql = '';
        $countJoin = count($join);

        foreach ($join as $item) {
            if ($countJoin > 1) {
                $sql .= ' LEFT JOIN ' . $item['TBR'] . ' on ' . $item['TBR'] . '.' . $item['CR'] . ' = ' . $item['TBD'] . '.' . $item['CD'];
            } else {
                $sql = ' LEFT JOIN ' . $item['TBR'] . '.' . $item['CR'] . ' = ' . $item['TBD'] . '.' . $item['CD'];
            }
        }

        return $sql;
    }

    /**
     * @param $order
     * @return string
     */
    public function order($order): string
    {
        return ' ORDER BY ' . $order;
    }

    /**
     * @param $limit
     * @return string
     */
    public function limit($limit): string
    {
        return ' LIMIT ' . $limit;
    }
}