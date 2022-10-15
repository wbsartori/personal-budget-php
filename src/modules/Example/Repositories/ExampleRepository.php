<?php

namespace Source\Modules\Example\Repositories;


use Source\Core\Database\Drivers\DriverConnectionSQLite;
use Source\Core\Database\Interfaces\InterfaceDriverConnection;

class ExampleRepository extends DriverConnectionSQLite implements InterfaceDriverConnection
{
    protected const TABLE = 'example';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}