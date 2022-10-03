<?php

namespace Server\PersonalBudget\Modules\Income\Repositories;

use Server\PersonalBudget\Core\Database\DB;

class IncomeRepository extends DB
{
    protected const TABLE = 'income';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function insertIncome(){
        #Implementar regras
    }
}