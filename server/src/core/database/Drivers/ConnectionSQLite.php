<?php

namespace Server\PersonalBudget\Core\Database\Drivers;

use DateTime;
use Exception;
use PDO;
use Server\PersonalBudget\Core\Database\DB;
use Server\PersonalBudget\Modules\Income\Models\IncomeModel;

class ConnectionSQLite
{
    private $path = '';

    private $databaseName = '';

    private $db = null;

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getDatabaseName()
    {
        return $this->databaseName;
    }

    /**
     * @param string $databaseName
     */
    public function setDatabaseName($databaseName)
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

    public function insert($table, $fields, $values)
    {
        $db = $this->connection();

        $date = new DateTime();
        array_push($fields, 'createdAt', 'updatedAt');
        array_push($values, $date->format('Y-m-d'), $date->format('Y-m-d'));
        $statement = $db->query('INSERT INTO ' . $table . ' ('. implode(',',$fields) .') VALUES ("' . implode('","', $values) .'")');
        if($statement->execute()){
            return true;
        }

        return false;
    }

    public function select($table, $where = null, $join = null, $order = null, $limit = null, $fetchAll = true)
    {
        $data = [];
        $db = $this->connection();
        $statement = $db->query('SELECT * FROM ' . $table . $where . $join . $order . $limit);
        $list = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($list as $item){
            $data[] = $item;
        }

        if(!$fetchAll){
            return $data[0];
        }

        return $data;
    }

    public function update($table, $classObject, $where = null, $fields = [], $values = [])
    {
        $db = $this->connection();
        $statement = $db->query('UPDATE ' . $table . ' SET ' . $fields .' = '. $values . $where);
        $statement->execute($statement);
    }

    public function delete($table, $classObject, $where = null)
    {
        $db = $this->connection();
        $statement = $db->query('DELTE FROM ' . $table . $where);
        $statement->execute($statement);
    }

    public function where($where){}
    public function join($join){}
    public function order($order){}
    public function limit($limit){}
}