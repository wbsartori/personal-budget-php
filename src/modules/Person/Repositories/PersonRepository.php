<?php

namespace Source\Modules\Person\Repositories;

use Source\Core\Database\DB;

class PersonRepository extends DB
{
    protected const TABLE = 'person';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}