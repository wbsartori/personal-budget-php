<?php

namespace App\Modules\Utils;

class Constants
{
    const VALIDATE_MSG = [
        'person' => [
            'name' => 'O campo nome precisa estar preenchido!',
            'birthDate' => 'O campo data de nascimento precisa estar preenchido!',
            'gender' => 'O campo genêro precisa estar preenchido!',
            'email' => 'O campo e-mail precisa estar preenchido!'
        ]
    ];

    const SUCCESS_MSG = [
        'person' => [
            'saveRecords' => 'Registro salvo com sucesso!',
            'updateRecords' => 'Registro atualizado com sucesso!',
            'deleteRecords' => 'Registro removido com sucesso!',
        ]
    ];

    const ERROR_MSG = [
        'saveRecords' => 'Erro ao tentar salvar o registro!',
        'updateRecords' => 'Erro ao tentar atualizar o registro!',
        'deleteRecords' => 'Erro ao tentar remover o registro!',
    ];

    const TITLES = [
        'person' => [
            'index' => 'Cadastros\Rendas',
            'new' => 'Cadastros\Rendas\Novo',
            'edit' => '',
        ]
    ];

    const BASE_ROOT = '/var/www';
    const BASE_URL = 'http://localhost:8000';
}
