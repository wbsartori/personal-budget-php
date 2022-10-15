<?php

namespace Source\Modules\Person\Services;

use Exception;
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

    /**
     * @param $data
     * @return string[]
     * @throws Exception
     */
    public function create($data){
        $person = $this->getPersonRepository()->insert(['name','birthDate','gender','email','status'], $data);

        if($person){
            return [
                'message' => 'success'
            ];
        }

        throw new Exception('Ocorreu um erro ao criar o usuário!');
    }
    public function read($id = null){
        if($id > 0){
            $where[] = ['P' => 'id' , 'OP' => '=', 'V' => $id];
            return $this->getPersonRepository()->select('*', $where)[0];
        }

        return $this->getPersonRepository()->select();
    }
    public function update($data){
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        $where[] = ['P' => 'id' , 'OP' => '=', 'V' => $id];
        return $this->getPersonRepository()->delete($where);
    }
}