<?php

namespace YukataRm\Laravel\Db\Seeder;

use YukataRm\Laravel\Db\Seeder\BaseSeeder;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

/**
 * Insert Data Seeder
 *
 * @package YukataRm\Laravel\Db\Seeder
 */
abstract class InsertDataSeeder extends BaseSeeder
{
    /*----------------------------------------*
     * Run
     *----------------------------------------*/

    /**
     * prepare seeding
     *
     * @return void
     */
    #[\Override]
    protected function prepare(): void
    {
        $this->flush();
    }

    /**
     * passed seeding
     *
     * @return void
     */
    #[\Override]
    protected function passed(): void
    {
        $this->insert();
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * model class
     *
     * @var string
     */
    protected string $modelClass;

    /**
     * has created_at
     *
     * @var bool
     */
    protected bool $hasCreatedAt = true;

    /**
     * has updated_at
     *
     * @var bool
     */
    protected bool $hasUpdatedAt = true;

    /*----------------------------------------*
     * Data
     *----------------------------------------*/

    /**
     * data
     *
     * @var \Illuminate\Support\Collection
     */
    protected Collection $data;

    /**
     * set data
     *
     * @param \Illuminate\Support\Collection $data
     * @return void
     */
    protected function set(Collection $data): void
    {
        $this->data = $data;
    }

    /**
     * push data
     *
     * @param \Illuminate\Support\Collection $data
     * @return void
     */
    protected function push(Collection $data): void
    {
        $this->data->push($data);
    }

    /**
     * insert data
     *
     * @return void
     */
    protected function insert(): void
    {
        if ($this->data->isEmpty()) return;

        $this->modelClass::insert($this->data->toArray());
    }

    /**
     * flush data
     *
     * @return void
     */
    protected function flush(): void
    {
        $this->set(collect());
    }

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * format data
     *
     * @param array<string, mixed>|Collection $data
     * @return \Illuminate\Support\Collection
     */
    protected function formatData(array|Collection $data): Collection
    {
        if (is_array($data)) $data = collect($data);

        if ($this->hasCreatedAt) $data->put("created_at", now());

        if ($this->hasUpdatedAt) $data->put("updated_at", now());

        return $data;
    }

    /**
     * hash text
     *
     * @param string $text
     * @return string
     */
    protected function hash(string $text): string
    {
        return Hash::make($text);
    }
}
