<?php

namespace YukataRm\Laravel\Interface\Validation;

/**
 * Base Validation Rules Interface
 *
 * @package YukataRm\Laravel\Interface\Validation
 */
interface BaseRulesInterface
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * get key name
     *
     * @return string
     */
    public function key(): string;

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * get attribute name
     *
     * @return string|null
     */
    public function attribute(): string|null;

    /**
     * get validation rules
     *
     * @return array<mixed>
     */
    public function rules(): array;

    /**
     * get failed validation messages
     *
     * @return array<string, string>
     */
    public function messages(): array;

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * add validation rule string and failed validation message
     *
     * @param string $rule
     * @param string|null $message
     * @param mixed $values
     * @return static
     */
    public function addString(string $rule, string|null $message = null, mixed $values = []): static;

    /**
     * add validation rule object and failed validation message
     *
     * @param string $ruleName
     * @param object $rule
     * @param string|null $message
     * @return static
     */
    public function addObject(string $ruleName, object $rule, string|null $message = null): static;
}
