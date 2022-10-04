<?php

require_once('../../../../vendor/autoload.php');

use Source\Modules\Person\Services\PersonService;

$Person = new PersonService();


$data = [];

$data = [
    'id' => addslashes($_POST['id']),
    'name' => addslashes($_POST['name']),
    'birthDate' => addslashes($_POST['birthDate']),
    'gender' => addslashes($_POST['gender']),
    'email' => addslashes($_POST['email']),
    'status' => addslashes($_POST['status'] === 'on' ? 'A' : 'I'),
];


$persons = $Person->delete($data);

if ($persons) {
    $_SESSION['message'] = 'Pessoa removida com sucesso!';
    $_SESSION['success'] = true;
    header('Location: ../index.php');
} else {
    $_SESSION['message'] = 'Erro ao remover pessoa!';
    $_SESSION['error'] = true;
    header('Location: ../index.php');
}