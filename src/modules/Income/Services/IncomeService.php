<?php

namespace Source\Modules\Income\Services;

use Exception;
use Source\Modules\Income\Repositories\IncomeRepository;

class IncomeService
{

    /**
     * @var $IncomeRepository
     */
    private mixed $IncomeRepository;

    /**
     * @return mixed
     */
    public function getIncomeRepository(): mixed
    {
        return $this->IncomeRepository;
    }

    /**
     * @param IncomeRepository $IncomeRepository
     * @return IncomeService
     */
    public function setIncomeRepository(IncomeRepository $IncomeRepository): IncomeService
    {
        $this->IncomeRepository = $IncomeRepository;
        return $this;
    }

    /**
     * @author Wesley Bonfim Sartóri wbsartori@gmail.com
     */
    public function __construct()
    {
        $this->setIncomeRepository((new IncomeRepository()));
    }

    /**
     * @param $data
     * @return string[]
     * @throws Exception
     * @author Wesley Bonfim Sartóri wbsartori@gmail.com
     */
    public function create($data)
    {
        $person = $this->getIncomeRepository()->insert(['name', 'birthDate', 'gender', 'email', 'status'], $data);

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
            return $this->getIncomeRepository()->select('*', $where)[0];
        }

        return $this->getIncomeRepository()->select();
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
        $person = $this->getIncomeRepository()->update($where, ['id', 'name', 'birthDate', 'gender', 'email', 'status'], $data);

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
        return $this->getIncomeRepository()->delete($where);
    }
}