<?php

namespace App\Modules\Income\Repositories;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class IncomeRepository extends DB
{
    const TABLE = 'income';

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return DB::table(self::TABLE)
            ->get();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function insert(array $data): bool
    {
        return DB::table(self::TABLE)
            ->insert($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return int
     */
    public function update(array $data, int $id): int
    {
        return DB::table(self::TABLE)
            ->where('id', '=', $id)
            ->update($data);
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        return DB::table(self::TABLE)
            ->where('id', '=', $id)
            ->delete($id);
    }

    /**
     * @param $id
     * @return Collection
     */
    public function getById($id): Collection
    {
        return DB::table(self::TABLE)
            ->where('id', '=', $id)
            ->get();
    }
}
