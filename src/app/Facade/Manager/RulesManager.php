<?php

namespace YukataRm\Laravel\Facade\Manager;

use YukataRm\Laravel\Interface\Validation\RulesInterface;
use YukataRm\Laravel\Validation\Rules;

/**
 * Validation Rules Facade Manager
 *
 * @package YukataRm\Laravel\Facade\Manger
 */
class RulesManager
{
    /**
     * make Rules instance
     *
     * @param string $key
     * @return \YukataRm\Laravel\Interface\Validation\RulesInterface
     */
    public function make(string $key): RulesInterface
    {
        return new Rules($key);
    }

    /**
     * call Validation method
     *
     * @param string $name
     * @param array<mixed> $arguments
     * @return \YukataRm\Laravel\Interface\Validation\RulesInterface
     */
    public function __call(string $name, array $arguments): RulesInterface
    {
        $key = array_shift($arguments);

        $instance = $this->make($key);

        $instance = $instance->$name(...$arguments);

        return $instance;
    }
}
