<?php

namespace YukataRm\Laravel\Db\Seeder;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

/**
 * Base Seeder
 *
 * @package YukataRm\Laravel\Db\Seeder
 */
abstract class BaseSeeder extends Seeder
{
    /*----------------------------------------*
     * Abstract
     *----------------------------------------*/

    /**
     * execute seeding
     *
     * @return void
     */
    abstract protected function execute(): void;

    /*----------------------------------------*
     * Required
     *----------------------------------------*/

    /**
     * run
     *
     * @param array<mixed> $parameters
     */
    public function run(...$parameters): void
    {
        $this->setParameters($parameters);

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
     * passed seeding
     *
     * @return void
     */
    protected function passed(): void {}

    /*----------------------------------------*
     * Parameter
     *----------------------------------------*/

    /**
     * parameters
     *
     * @var array<int|string, mixed>
     */
    protected array $parameters;

    /**
     * set parameters
     *
     * @param array<mixed> $parameters
     * @return void
     */
    protected function setParameters(array $parameters = []): void
    {
        $this->parameters = $parameters;
    }

    /**
     * get parameter
     *
     * @param int|null $key
     * @return mixed
     */
    protected function parameters(int|null $index = null): mixed
    {
        if (is_null($index)) return $this->parameters;

        if (isset($this->parameters[$index])) return $this->parameters[$index];

        return null;
    }

    /**
     * get string parameter
     *
     * @param int $index
     * @return string|null
     */
    protected function string(int $index): string|null
    {
        $value = $this->parameters($index);

        return is_null($value) ? null : (string) $value;
    }

    /**
     * get integer parameter
     *
     * @param int $index
     * @return int|null
     */
    protected function integer(int $index): int|null
    {
        $value = $this->parameters($index);

        return is_null($value) ? null : (int) $value;
    }

    /**
     * get boolean parameter
     *
     * @param int $index
     * @return bool|null
     */
    protected function boolean(int $index): bool|null
    {
        $value = $this->parameters($index);

        return is_null($value) ? null : (bool) $value;
    }

    /**
     * get array parameter
     *
     * @param int $index
     * @return array<mixed>|null
     */
    protected function array(int $index): array|null
    {
        $value = $this->parameters($index);

        return is_null($value) ? null : (array) $value;
    }

    /**
     * get object parameter
     *
     * @param int $index
     * @return object|null
     */
    protected function object(int $index): object|null
    {
        $value = $this->parameters($index);

        return is_null($value) ? null : (object) $value;
    }

    /**
     * get float parameter
     *
     * @param int $index
     * @return float|null
     */
    protected function float(int $index): float|null
    {
        $value = $this->parameters($index);

        return is_null($value) ? null : (float) $value;
    }

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

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
