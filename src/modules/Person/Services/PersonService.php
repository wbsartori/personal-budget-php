<?php

namespace Source\Modules\Person\Services;

use Source\Modules\Person\Repositories\PersonRepository;

class PersonService
{
    /**
     * @var PersonRepository $PersonRepository
     */
    private PersonRepository $PersonRepository;

    /**
     * @return PersonRepository
     */
    public function getPersonRepository(): PersonRepository
    {
        return $this->PersonRepository;
    }

    /**
     * @param PersonRepository $PersonRepository
     */
    public function setPersonRepository(PersonRepository $PersonRepository): void
    {
        $this->PersonRepository = $PersonRepository;
    }

    public function __construct()
    {
        $this->setPersonRepository((new PersonRepository()));
    }

    public function create($data){
        return true;
    }
    public function read(){
        return $this->getPersonRepository()->select();
    }
    public function update($data){
        return true;
    }
    public function delete(){
        return true;
    }
}