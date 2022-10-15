<?php

require_once ('../../../vendor/autoload.php');

use Source\Modules\Income\Services\IncomeService;

$Income = new IncomeService();
$incomes = $Income->read();