<?php

require_once ('vendor/autoload.php');

use Server\PersonalBudget\Core\Database\Drivers\ConnectionSQLite;
use Server\PersonalBudget\Modules\Income\Models\IncomeModel;

$teste = new ConnectionSQLite();
$retorno = $teste->connection();
//$sql = $teste->select('income');
//$sql = $teste->insert('income', ['idPerson','description','incomeDate','value'], ['1','Wesley','2022-01-01',3500.55]);
//$sql = $teste->update(
//    'income',
//    '',
//    ['idPerson','description','incomeDate','value'],
//    ['1','Allan','2022-02-02',5500.55]
//);

$where[] = ['P' => 'id' , 'OP' => '=', 'V' => '2'];
$where[] = ['P' => 'id' , 'OP' => '=', 'V' => '3'];
$sql = $teste->delete('income', $where);
echo '<pre>';
print_r($sql);
exit;

