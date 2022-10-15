<?php

require_once('../../../../vendor/autoload.php');

use Source\Modules\Person\Services\PersonService;

$Person = new PersonService();
$id = addslashes($_POST['id']);


$persons = $Person->delete($id);

if ($persons > 0) {
    $_SESSION['message'] = 'Pessoa removida com sucesso!';
    $_SESSION['success'] = true;
    header('Location: ../index.php');
} else {
    $_SESSION['message'] = 'Erro ao remover pessoa!';
    $_SESSION['error'] = true;
    header('Location: ../index.php');
}