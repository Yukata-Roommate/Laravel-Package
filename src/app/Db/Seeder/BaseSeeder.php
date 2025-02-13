<?php

namespace YukataRm\Laravel\Db\Seeder;

use Illuminate\Database\Seeder;

/**
 * Base Seeder
 *
 * @package YukataRm\Laravel\Db\Seeder
 */
abstract class BaseSeeder extends Seeder
{
    /*----------------------------------------*
     * Run
     *----------------------------------------*/

    /**
     * run
     */
    public function run(): void
    {
        $this->prepare();

        $this->execute();

        $this->passed();
    }

    /**
     * prepare seeding
     *
     * @return void
     */
    protected function prepare(): void {}

    /**
     * execute seeding
     *
     * @return void
     */
    abstract protected function execute(): void;

    /**
     * passed seeding
     *
     * @return void
     */
    protected function passed(): void {}
}
