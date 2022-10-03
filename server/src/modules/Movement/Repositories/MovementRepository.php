<?php

namespace Server\PersonalBudget\Modules\Movement\Repositories;

use Server\PersonalBudget\Core\Database\DB;

class MovementRepository extends DB
{
    protected const TABLE = 'movement';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}