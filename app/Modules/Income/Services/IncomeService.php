<?php

namespace App\Modules\Income\Services;

use App\Modules\Income\Repositories\IncomeRepository;
use App\Modules\Income\Validators\IncomeValidator;
use App\Modules\Validators\ModulesValidator;
use Illuminate\Support\Collection;

class IncomeService
{

    /**
     * @var ModulesValidator
     */
    private ModulesValidator $modulesValidator;

    /**
     * @var IncomeValidator
     */
    private IncomeValidator $incomeValidator;

    /**
     * @var IncomeRepository
     */
    private IncomeRepository $incomeRepository;


    public function __construct()
    {
        $this->modulesValidator = new ModulesValidator();
        $this->incomeValidator = new IncomeValidator();
        $this->incomeRepository = new IncomeRepository();
    }

    /**
     * @param $request
     * @return bool
     */
    public function create($request): bool
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['_id']);
        $data['status'] = $this->modulesValidator->validatorFieldStatus($data);
        $this->incomeValidator->validateFields($request);
        return $this->incomeRepository->insert($data);
    }

    /**
     * @return Collection
     */
    public function read(): Collection
    {
        return $this->incomeRepository->getAll();
    }

    /**
     * @param $id
     * @return Collection
     */
    public function edit($id): Collection
    {
        return $this->incomeRepository->getById($id);
    }

    /**
     * @param $data
     * @param $id
     * @return int
     */
    public function update($data, $id): int
    {
        unset($data['_token']);
        unset($data['_method']);
        unset($data['_id']);
        $data['status'] = $this->modulesValidator->validatorFieldStatus($data);
        return $this->incomeRepository->update($data, $id);
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id): int
    {
        return $this->incomeRepository->delete($id);
    }
}
