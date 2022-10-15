<?php

require_once('../../../../vendor/autoload.php');

use Source\Modules\Person\Services\PersonService;

$Person = new PersonService();


$data = [];

$data = [
    'id' => addslashes($_POST['_id']),
    'name' => addslashes($_POST['name']),
    'birthDate' => addslashes($_POST['birthDate']),
    'gender' => addslashes($_POST['gender']),
    'email' => addslashes($_POST['email']),
    'status' => addslashes(isset($_POST['status']) ? 'A' : 'I'),
];


$persons = $Person->update($data);

if ($persons) {
    $_SESSION['message'] = 'Pessoa atualizada com sucesso!';
    header('Location: ../index.php');
} else {
    $_SESSION['message'] = 'Erro ao atualizar pessoa!';
    header('Location: ../_edit.php');
}