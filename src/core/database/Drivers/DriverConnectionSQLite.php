<?php

namespace Source\Core\Database\Drivers;

use DateTime;
use Exception;
use PDO;


/**
 * @description Classe de conexão com Driver SQLite
 * @author Wesley Bonfim Sartóri wbsartori@gmail.com
 */
class DriverConnectionSQLite
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

    private $table = '';

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
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @param string $table
     */
    public function setTable(string $table): void
    {
        $this->table = $table;
    }

    public function __construct($table)
    {
        $this->setTable($table);
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
     * @param $fields
     * @param $values
     * @return bool
     */
    public function insert($fields, $values): bool
    {
        $db = $this->connection();

        $date = new DateTime();
        array_push($fields, 'createdAt', 'updatedAt');
        array_push($values, $date->format('Y-m-d'), $date->format('Y-m-d'));
        $statement = $db->query('INSERT INTO ' . $this->getTable() . ' (' . implode(',', $fields) . ') VALUES ("' . implode('","', $values) . '")');

        if ($statement) {
            return true;
        }

        return false;
    }

    /**
     * @param string $fields
     * @param null $where
     * @param null $join
     * @param null $order
     * @param null $limit
     * @param bool $fetchAll
     * @return mixed
     */
    public function select(string $fields = '*', $where = null, $join = null, $order = null, $limit = null, bool $fetchAll = true): mixed
    {
        $data = [];
        $db = $this->connection();

        if(!empty($where)){
            $where = $this->where($where);
        }

        if(!empty($join)){
            $join = $this->join($join);
        }

        if($fields < 0)
        {
            $fields = '*';
        }

        $statement = $db->query('SELECT ' . $fields . ' FROM ' . $this->getTable() . $join . $where . $order . $limit);
        
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
     * @param null $where
     * @param array $fields
     * @param array $values
     * @return bool
     */
    public function update($where = null, array $fields = [], array $values = []): bool
    {
        $db = $this->connection();
        $query = [];
        $date = new DateTime();
        array_push($fields, 'updatedAt');
        array_push($values, $date->format('Y-m-d'));

        foreach ($fields as $fieldkey => $field) {
            $newField[] = $field;
        }
        foreach ($values as $valueKey => $value) {
            $newValue[] = $value;
        }

        foreach ($newField as $key => $nField){
            foreach ($newValue as $key2 => $nValue){
                if($key === $key2 && $nField !== 'id'){
                    $query[] = $nField . ' = "' . $nValue . '"';
                }
            }
        }

        $queryString = implode(',', $query);
        $statement = $db->query('UPDATE ' . $this->getTable() . ' SET ' . $queryString . $this->where($where));

        if ($statement->execute()) {
            return true;
        }

        return false;
    }

    /**
     * @param null $where
     * @return bool
     */
    public function delete($where = null): bool
    {
        $db = $this->connection();
        $statement = $db->query('DELETE FROM ' . $this->getTable() . $this->where($where));

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
                $sql = ' LEFT JOIN '  . $item['TBR'] . ' on ' . $item['TBR'] . '.' . $item['CR'] . ' = ' . $item['TBD'] . '.' . $item['CD'];
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