<?php

namespace App\Modules\Movement\Services;

use App\Modules\Movement\Repositories\MovementRepository;
use App\Modules\Movement\Validators\MovementValidator;
use App\Modules\Validators\ModulesValidator;
use Illuminate\Support\Collection;

class MovementService
{
    /**
     * @var ModulesValidator
     */
    private ModulesValidator $modulesValidator;

    /**
     * @var MovementValidator
     */
    private MovementValidator $movementValidator;

    /**
     * @var MovementRepository
     */
    private MovementRepository $movementRepository;


    public function __construct()
    {
        $this->movementRepository = new MovementRepository();
        $this->modulesValidator = new ModulesValidator();
        $this->movementValidator = new MovementValidator();
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
        $this->movementValidator->validateFields($request);
        return $this->movementRepository->insert($data);
    }

    /**
     * @return Collection
     */
    public function read(): Collection
    {
        return $this->movementRepository->getAll();
    }

    /**
     * @param $id
     * @return Collection
     */
    public function edit($id): Collection
    {
        return $this->movementRepository->getById($id);
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
        return $this->movementRepository->update($data, $id);
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id): int
    {
        return $this->movementRepository->delete($id);
    }
}
