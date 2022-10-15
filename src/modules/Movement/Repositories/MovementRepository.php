<?php

namespace Source\Modules\Movement\Repositories;



use Source\Core\Database\Drivers\DriverConnectionSQLite;
use Source\Core\Database\Interfaces\InterfaceDriverConnection;

class MovementRepository extends DriverConnectionSQLite implements InterfaceDriverConnection
{
    protected const TABLE = 'movement';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}