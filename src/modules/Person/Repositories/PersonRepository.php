<?php

namespace Source\Modules\Person\Repositories;

use Source\Core\Database\Drivers\DriverConnectionSQLite;
use Source\Core\Database\Interfaces\InterfaceDriverConnection;

class PersonRepository extends DriverConnectionSQLite implements InterfaceDriverConnection
{
    protected const TABLE = 'person';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}