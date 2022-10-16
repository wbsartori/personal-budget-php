<?php

require_once ('../../../vendor/autoload.php');

use Source\Modules\Income\Services\IncomeService;
use Source\Modules\Person\Services\PersonService;

$Income = new IncomeService();
$Person = new PersonService();

$id = addslashes($_GET['id']);
$incomeDate = addslashes($_GET['incomeDate']);

if($id){
    $incomes = $Income->read($id, $incomeDate);
    $persons = $Person->read();
}
