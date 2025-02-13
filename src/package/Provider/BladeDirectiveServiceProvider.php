<?php

namespace YukataRm\Laravel\Package\Provider;

use YukataRm\Laravel\Provider\BladeDirectiveServiceProvider as ServiceProvider;

/**
 * Blade Directive Service Provider
 *
 * @package YukataRm\Laravel\Package\Provider
 */
class BladeDirectiveServiceProvider extends ServiceProvider
{
    /*----------------------------------------*
     * If
     *----------------------------------------*/

    /**
     * get if directives
     *
     * @return array<string, \Closure>
     */
    #[\Override]
    protected function ifDirectives(): array
    {
        return [
            "isNull"    => $this->isNullDirective(),
            "isNotNull" => $this->isNotNullDirective(),
            "isNotSet"  => $this->isNotSetDirective(),
            "notEmpty"  => $this->notEmptyDirective(),
        ];
    }

    /**
     * get isNull directive
     *
     * @return \Closure
     */
    protected function isNullDirective(): \Closure
    {
        return function (mixed $value): bool {
            return is_null($value);
        };
    }

    /**
     * get isNotNull directive
     *
     * @return \Closure
     */
    protected function isNotNullDirective(): \Closure
    {
        return function (mixed $value): bool {
            return !is_null($value);
        };
    }

    /**
     * get isNotSet directive
     *
     * @return \Closure
     */
    protected function isNotSetDirective(): \Closure
    {
        return function (mixed $value): bool {
            return !isset($value);
        };
    }

    /**
     * get notEmpty directive
     *
     * @return \Closure
     */
    protected function notEmptyDirective(): \Closure
    {
        return function (mixed $value): bool {
            return !empty($value);
        };
    }
}
