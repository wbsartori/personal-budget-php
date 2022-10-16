<?php

require_once('../../../../vendor/autoload.php');

use Source\Modules\Income\Services\IncomeService;

$Income = new IncomeService();


$data = [];

$data = [
    'idPerson' => addslashes($_POST['idPerson']),
    'description' => addslashes($_POST['description']),
    'incomeDate' => addslashes($_POST['incomeDate']),
    'value' => addslashes($_POST['value']),
];


$incomes = $Income->create($data);

if ($incomes['message'] === 'success') {
    $_SESSION['message'] = 'Pessoa inserida com sucesso!';
    header('Location: ../index.php');
} else {
    $_SESSION['message'] = 'Erro ao inserir pessoa!';
    header('Location: ../_new.php');
}