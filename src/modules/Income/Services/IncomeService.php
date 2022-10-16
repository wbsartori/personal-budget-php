<?php

namespace Source\Modules\Income\Services;

use Exception;
use Source\Modules\Income\Repositories\IncomeRepository;

class IncomeService
{
    /**
     * @var IncomeRepository
     */
    private IncomeRepository $IncomeRepository;

    /**
     * @author Wesley Bonfim Sartóri wbsartori@gmail.com
     */
    public function __construct()
    {
        $this->IncomeRepository = new IncomeRepository();
    }

    /**
     * @param $data
     * @return string[]
     * @throws Exception
     * @author Wesley Bonfim Sartóri wbsartori@gmail.com
     */
    public function create($data)
    {
        $person = $this->IncomeRepository->insert(['idPerson','description', 'incomeDate', 'value'], $data);

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
    public function read($id = null, $incomeDate = null)
    {
        $columns = 'person.id as personId, person.name as personName, income.*';
        $join[] = ['TBR' => 'person' , 'CR' => 'id', 'TBD' => 'income', 'CD' => 'idPerson'];

        if ($id > 0) {
            $where[] = ['P' => 'income.id', 'OP' => '=', 'V' => $id];
            $where[] = ['P' => 'incomeDate', 'OP' => '=', 'V' => "'".$incomeDate."'"];
            return $this->IncomeRepository->select($columns, $where, $join)[0];
        }

        return $this->IncomeRepository->select($columns, '', $join);
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

        $person = $this->IncomeRepository->update($where, ['id','idPerson','description', 'incomeDate', 'value'], $data);

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
        return $this->IncomeRepository->delete($where);
    }
}