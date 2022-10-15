<?php


require_once('../../../../vendor/autoload.php');

use Source\Modules\Income\Services\IncomeService;

$Income = new IncomeService();

$id = addslashes($_POST['id']);


$incomes = $Income->delete($id);

if ($incomes > 0) {
    $_SESSION['message'] = 'Renda removida com sucesso!';
    $_SESSION['success'] = true;
    header('Location: ../index.php');
} else {
    $_SESSION['message'] = 'Erro ao remover renda!';
    $_SESSION['error'] = true;
    header('Location: ../index.php');
}