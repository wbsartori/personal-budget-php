<?php

require_once ('../../../vendor/autoload.php');

use Source\Modules\Income\Services\IncomeService;
use Source\Modules\Person\Services\PersonService;

$Income = new IncomeService();
$Person = new PersonService();
$incomes = $Income->read();
$persons = $Person->read();