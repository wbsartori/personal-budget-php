<?php

namespace Server\PersonalBudget\Core\Database;

use Server\PersonalBudget\Core\Database\Drivers\ConnectionSQLite;

class DB
{
    private $typeConnection;

    /**
     * @return mixed
     */
    public function getTypeConnection()
    {
        return $this->typeConnection;
    }

    /**
     * @param mixed $typeConnection
     */
    public function setTypeConnection($typeConnection)
    {
        $this->typeConnection = $typeConnection;
    }


    public function __construct($typeConnection)
    {
        echo '<pre>';
        print_r($typeConnection);
        exit;
//        if($typeConnection === 'SQLite'){
//            $this->setTypeConnection((new ConnectionSQLite($typeConnection)));
//        }
    }
}