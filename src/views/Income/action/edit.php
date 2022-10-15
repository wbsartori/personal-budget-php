<?php

require_once ('../../../vendor/autoload.php');

use Source\Modules\Income\Services\IncomeService;

$Income = new IncomeService();

$id = addslashes($_GET['id']);

if($id){
    $incomes = $Income->read($id);
}
