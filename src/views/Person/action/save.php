<?php

require_once('../../../../vendor/autoload.php');

use Source\Modules\Person\Services\PersonService;

$Person = new PersonService();


$data = [];

$data = [
    'name' => addslashes($_POST['name']),
    'birthDate' => addslashes($_POST['birthDate']),
    'gender' => addslashes($_POST['gender']),
    'email' => addslashes($_POST['email']),
    'status' => addslashes($_POST['status'] === 'on' ? 'A' : 'I'),
];


$persons = $Person->create($data);

if ($persons['message'] === 'success') {
    $_SESSION['message'] = 'Pessoa inserida com sucesso!';
    header('Location: ../index.php');
} else {
    $_SESSION['message'] = 'Erro ao inserir pessoa!';
    header('Location: ../_new.php');
}