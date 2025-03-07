<?php

namespace YukataRm\Laravel\Validation\Rule;

use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Base Validation Rule
 *
 * @package YukataRm\Laravel\Validation\Rule
 */
abstract class BaseRule implements ValidationRule
{
    /*----------------------------------------*
     * Required
     *----------------------------------------*/

    /**
     * validate attribute
     *
     * @param string $attribute
     * @param mixed $value
     * @param \Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        $this->attribute = $attribute;
        $this->value     = $value;
        $this->fail      = $fail;

        $result = $this->execute();

        if (!$result) $this->failed();
    }

    /*----------------------------------------*
     * Extended
     *----------------------------------------*/

    /**
     * attribute name
     *
     * @var string
     */
    protected string $attribute;

    /**
     * attribute value
     *
     * @var mixed
     */
    protected mixed $value;

    /**
     * fail callback
     *
     * @var \Closure
     */
    protected \Closure $fail;

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * failure lang
     *
     * @var string
     */
    protected string $lang;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * execute validation
     *
     * @return bool
     */
    abstract protected function execute(): bool;

    /**
     * validation failed
     *
     * @return void
     */
    protected function failed(): void
    {
        $fail = $this->fail;

        $fail($this->lang)->translate();
    }
}
