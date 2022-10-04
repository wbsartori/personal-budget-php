<?php

namespace Source\Modules\Movement\Repositories;

use Source\Core\Database\DB;

class MovementRepository extends DB
{
    protected const TABLE = 'movement';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}