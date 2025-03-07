<?php

namespace YukataRm\Laravel\Validation\Rule;

use YukataRm\Laravel\Validation\Rule\BaseRule;

/**
 * Implicit Validation Rule
 *
 * @package YukataRm\Laravel\Validation\Rule
 */
abstract class ImplicitRule extends BaseRule
{
    /*----------------------------------------*
     * Required
     *----------------------------------------*/

    /**
     * whether rule is implicit
     *
     * @var bool
     */
    public $implicit = true;
}
