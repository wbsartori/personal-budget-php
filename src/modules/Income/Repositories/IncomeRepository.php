<?php

namespace Source\Modules\Income\Repositories;


use Source\Core\Database\Drivers\DriverConnectionSQLite;
use Source\Core\Database\Interfaces\InterfaceDriverConnection;

class IncomeRepository extends DriverConnectionSQLite implements InterfaceDriverConnection
{
    protected const TABLE = 'income';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}