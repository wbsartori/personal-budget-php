<?php

require_once ('vendor/autoload.php');

use Server\PersonalBudget\Core\Database\Drivers\ConnectionSQLite;
use Server\PersonalBudget\Modules\Income\Models\IncomeModel;

echo '<pre>';

$teste = new ConnectionSQLite();
$retorno = $teste->connection();
//$sql = $teste->select('income');
$sql = $teste->insert('income', ['idPerson','description','incomeDate','value'], ['1','Wesley','2022-01-01',3500.55]);
var_dump($sql);

