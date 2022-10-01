<?php

require_once ('vendor/autoload.php');

use Server\PersonalBudget\Core\Database\Drivers\ConnectionSQLite;
use Server\PersonalBudget\Modules\Income\Models\IncomeModel;

$teste = new ConnectionSQLite();
$retorno = $teste->connection();

#SELECT
//$where[] = ['P' => 'id' , 'OP' => '=', 'V' => '2'];
//$sql = $teste->select('income', '', $where);

#INSERT
//$sql = $teste->insert('income', ['idPerson','description','incomeDate','value'], ['1','Wesley','2022-01-01',3500.55]);

#UPDATE
//$sql = $teste->update(
//    'income',
//    '',
//    ['idPerson','description','incomeDate','value'],
//    ['1','Allan','2022-02-02',5500.55]
//);

#DELETE
//$sql = $teste->delete('income', $where);

#JOIN
//$join[] = ['TBR' => 'person' , 'CR' => 'id', 'TBD' => 'income', 'CD' => 'idPerson'];
//$join[] = ['TBR' => 'person' , 'CR' => 'id', 'TBD' => 'income', 'CD' => 'idPerson'];

//$sql = $teste->join($join);

//$where[] = ['P' => 'id' , 'OP' => '=', 'V' => '2'];
//$where[] = ['P' => 'id' , 'OP' => '=', 'V' => '3'];
//$sql = $teste->where($where);

echo '<pre>';
print_r('');
exit;

