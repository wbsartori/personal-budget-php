<?php

namespace App\Modules\Person\Services;

use App\Modules\Person\Repositories\PersonRepository;
use App\Modules\Person\Validators\PersonValidator;
use App\Modules\Validators\ModulesValidator;
use Illuminate\Support\Collection;

class PersonService
{
    /**
     * @var PersonRepository
     */
    private PersonRepository $personRepository;

    /**
     * @var PersonValidator
     */
    private PersonValidator $personValidator;

    /**
     * @var ModulesValidator
     */
    private ModulesValidator $modulesValidator;

    public function __construct()
    {
        $this->personRepository = new PersonRepository();
        $this->personValidator = new PersonValidator();
        $this->modulesValidator = new ModulesValidator();
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
        $this->personValidator->validateFields($request);
        return $this->personRepository->insert($data);
    }

    /**
     * @return Collection
     */
    public function read(): Collection
    {
        return $this->personRepository->getAll();
    }

    /**
     * @param $id
     * @return Collection
     */
    public function edit($id): Collection
    {
        return $this->personRepository->getById($id);
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
        return $this->personRepository->update($data, $id);
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id): int
    {
        return $this->personRepository->delete($id);
    }
}
