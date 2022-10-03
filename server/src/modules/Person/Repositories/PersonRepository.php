<?php

namespace Server\PersonalBudget\Modules\Person\Repositories;

use Server\PersonalBudget\Core\Database\DB;

class PersonRepository extends DB
{
    protected const TABLE = 'person';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}