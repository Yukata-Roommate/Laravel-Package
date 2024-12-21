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

        if (is_null($key)) $this->throwTooFewArgumentsException();

        $instance = $this->make($key);

        if (!method_exists($instance, $name)) $this->throwBadMethodCallException($name);

        $instance = $instance->$name(...$arguments);

        if (!($instance instanceof Rules)) $this->throwBadMethodCallException($name);

        return $instance;
    }

    /**
     * throw Too Few Arguments Exception
     *
     * @return void
     */
    protected function throwTooFewArgumentsException(): void
    {
        throw new \BadMethodCallException("too few arguments to function " . static::class . "::make(), 0 passed in. exactly 1 expected.");
    }

    /**
     * throw Bad Method Call Exception
     *
     * @param string $name
     * @return void
     */
    protected function throwBadMethodCallException(string $name): void
    {
        throw new \BadMethodCallException("method " . Rules::class . "::{$name}() does not exist.");
    }
}
