<?php

namespace YukataRm\Laravel\Repository;

use YukataRm\Laravel\Repository\BaseRepository;

use YukataRm\Laravel\Interface\Repository\ModelInterface;
use YukataRm\Laravel\Interface\Repository\EntityInterface;

use Illuminate\Support\Collection;

/**
 * Custom Repository
 *
 * @package YukataRm\Laravel\Repository
 */
abstract class CustomRepository extends BaseRepository
{
    /*----------------------------------------*
     * Common
     *----------------------------------------*/

    /**
     * common query
     *
     * @return static
     */
    abstract protected function commonQuery(): static;

    /**
     * get all records
     *
     * @return \Illuminate\Support\Collection<\YukataRm\Laravel\Interface\Repository\EntityInterface>
     */
    protected function allRecords(): Collection
    {
        $models = $this->commonQuery()->get();

        return $this->toEntities($models);
    }

    /**
     * find raw record by primary key
     *
     * @param int|string|array $primaryKey
     * @return \YukataRm\Laravel\Interface\Repository\ModelInterface|null
     */
    protected function findRecordRawByPrimaryKey(int|string|array $primaryKey): ModelInterface|null
    {
        return $this
            ->commonQuery()
            ->where($this->model()->getKeyName(), $primaryKey)
            ->first();
    }

    /**
     * find record by primary key
     *
     * @param int|string|array $primaryKey
     * @return \YukataRm\Laravel\Interface\Repository\EntityInterface|null
     */
    protected function findRecordByPrimaryKey(int|string|array $primaryKey): EntityInterface|null
    {
        $model = $this->findRecordRawByPrimaryKey($primaryKey);

        return is_null($model) ? null : $model->toEntity();
    }

    /*----------------------------------------*
     * Search
     *----------------------------------------*/

    /**
     * search query
     *
     * @param array<string, mixed> $search
     * @return static
     */
    abstract protected function searchQuery(array $search): static;

    /**
     * search raw records
     *
     * @param array<string, mixed> $search
     * @param int|null $limit
     * @param int|null $offset
     * @return \Illuminate\Support\Collection<\YukataRm\Laravel\Interface\Repository\ModelInterface>
     */
    protected function searchRawRecords(array $search, int|null $limit = null, int|null $offset = null): Collection
    {
        $query = $this->searchQuery($search);

        if (!is_null($limit)) $query->limit($limit);

        if (!is_null($offset)) $query->offset($offset);

        return $query->get();
    }

    /**
     * search records
     *
     * @param array<string, mixed> $search
     * @param int|null $limit
     * @param int|null $offset
     * @return \Illuminate\Support\Collection<\YukataRm\Laravel\Interface\Repository\EntityInterface>
     */
    protected function searchRecords(array $search, int|null $limit = null, int|null $offset = null): Collection
    {
        $models = $this->searchRawRecords($search, $limit, $offset);

        return $this->toEntities($models);
    }

    /**
     * search count
     *
     * @param array<string, mixed> $search
     * @return int
     */
    public function searchCount(array $search): int
    {
        return $this->searchQuery($search)->count();
    }
}
