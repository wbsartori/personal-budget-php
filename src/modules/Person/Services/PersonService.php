<?php

namespace Source\Modules\Person\Services;

use Exception;
use Source\Modules\Person\Repositories\PersonRepository;

/**
 * @description Classe para ações referentes a pessoas
 * @author Wesley Bonfim Sartóri wbsartori@gmail.com
 */
class PersonService
{
    /**
     * @var PersonRepository $PersonRepository
     * @author Wesley Bonfim Sartóri wbsartori@gmail.com
     */
    private PersonRepository $PersonRepository;

    /**
     * @return PersonRepository
     * @author Wesley Bonfim Sartóri wbsartori@gmail.com
     */
    public function getPersonRepository(): PersonRepository
    {
        return $this->PersonRepository;
    }

    /**
     * @param PersonRepository $PersonRepository
     * @author Wesley Bonfim Sartóri wbsartori@gmail.com
     */
    public function setPersonRepository(PersonRepository $PersonRepository): void
    {
        $this->PersonRepository = $PersonRepository;
    }

    /**
     * @author Wesley Bonfim Sartóri wbsartori@gmail.com
     */
    public function __construct()
    {
        $this->setPersonRepository((new PersonRepository()));
    }

    /**
     * @param $data
     * @return string[]
     * @throws Exception
     * @author Wesley Bonfim Sartóri wbsartori@gmail.com
     */
    public function create($data)
    {
        $person = $this->getPersonRepository()->insert(['name', 'birthDate', 'gender', 'email', 'status'], $data);

        if ($person) {
            return [
                'message' => 'success'
            ];
        }

        throw new Exception('Ocorreu um erro ao criar o usuário!');
    }

    /**
     * @param null $id
     * @return mixed
     * @author Wesley Bonfim Sartóri wbsartori@gmail.com
     */
    public function read($id = null)
    {
        if ($id > 0) {
            $where[] = ['P' => 'id', 'OP' => '=', 'V' => $id];
            return $this->getPersonRepository()->select('*', $where)[0];
        }

        return $this->getPersonRepository()->select();
    }

    /**
     * @param $data
     * @return string[]
     * @throws Exception
     * @author Wesley Bonfim Sartóri wbsartori@gmail.com
     */
    public function update($data)
    {
        $where[] = ['P' => 'id', 'OP' => '=', 'V' => $data['id']];
        $person = $this->getPersonRepository()->update($where, ['id', 'name', 'birthDate', 'gender', 'email', 'status'], $data);

        if ($person > 0) {
            return [
                'message' => 'success'
            ];
        }

        throw new Exception('Ocorreu um erro ao editar o usuário!');
    }

    /**
     * @param $id
     * @return bool
     * @author Wesley Bonfim Sartóri wbsartori@gmail.com
     */
    public function delete($id): bool
    {
        $where[] = ['P' => 'id', 'OP' => '=', 'V' => $id];
        return $this->getPersonRepository()->delete($where);
    }
}