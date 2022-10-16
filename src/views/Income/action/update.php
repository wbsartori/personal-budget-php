<?php

require_once('../../../../vendor/autoload.php');

use Source\Modules\Income\Services\IncomeService;

$Income = new IncomeService();

$data = [];

$data = [
    'id' => addslashes($_POST['_id']),
    'idPerson' => addslashes($_POST['idPerson']),
    'description' => addslashes($_POST['description']),
    'incomeDate' => addslashes($_POST['incomeDate']),
    'value' => addslashes($_POST['value']),
];


$incomes = $Income->update($data);

if ($incomes > 0) {
    $_SESSION['message'] = 'Pessoa atualizada com sucesso!';
    header('Location: ../index.php');
} else {
    $_SESSION['message'] = 'Erro ao atualizar pessoa!';
    header('Location: ../_edit.php');
}