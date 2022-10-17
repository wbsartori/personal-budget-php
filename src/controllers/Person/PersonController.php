<?php

namespace Source\Controllers\Person;


use Source\Controllers\Controller;
use Source\Helpers\Constants;
use Source\Modules\Person\Services\PersonService;

class PersonController extends Controller
{
    /**
     * @var PersonService
     */
    private PersonService $PersonService;

    public function index($data = null)
    {
        $this->PersonService = new PersonService();
        $persons = $this->PersonService->read();
        return $this->load('Person/index',
            [
                "title" => Constants::PERSON_TITLE_READ,
                "persons" => $persons
            ]);
    }

    public function new(){
        return $this->load("Person/_new", [
            "title" => Constants::PERSON_TITLE_NEW
        ]);
    }

    public function save($data){
        echo 'save';
    }

    public function edit($data){
        $this->PersonService = new PersonService();
        $persons = $this->PersonService->read($data['id']);
        return $this->load('Person/index',
            [
                "title" => Constants::PERSON_TITLE_EDIT,
                "persons" => $persons
            ]);
    }

    public function update($data){
        echo 'update';
    }

    public function delete($data){
        echo 'delete';
    }
}

