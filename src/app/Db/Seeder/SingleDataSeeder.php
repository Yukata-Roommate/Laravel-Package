<?php

namespace YukataRm\Laravel\Db\Seeder;

use YukataRm\Laravel\Db\Seeder\InsertDataSeeder;

use Illuminate\Support\Collection;

/**
 * Single Data Seeder
 *
 * @package YukataRm\Laravel\Db\Seeder
 */
abstract class SingleDataSeeder extends InsertDataSeeder
{
    /*----------------------------------------*
     * Abstract
     *----------------------------------------*/

    /**
     * data
     *
     * @return array<string, mixed>|\Illuminate\Support\Collection
     */
    abstract protected function data(): array|Collection;

    /*----------------------------------------*
     * Required
     *----------------------------------------*/

    /**
     * execute seeding
     */
    protected function execute(): void
    {
        $data = $this->data();

        $data = $this->formatData($data);

        $this->set($data);
    }
}
