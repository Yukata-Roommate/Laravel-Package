<?php

namespace YukataRm\Laravel\Validation;

use YukataRm\Laravel\Interface\Validation\BaseRulesInterface;

/**
 * Base Validation Rules
 *
 * @package YukataRm\Laravel\Validation
 */
abstract class BaseRules implements BaseRulesInterface
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * key name
     *
     * @var string
     */
    protected string $key;

    /**
     * constructor
     *
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * get key name
     *
     * @return string
     */
    public function key(): string
    {
        return $this->key;
    }

    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * attribute name
     *
     * @var string|null
     */
    protected string|null $attribute = null;

    /**
     * validation rules
     *
     * @var array<mixed>
     */
    protected array $rules = [];

    /**
     * failed validation messages
     *
     * @var array<string, string>
     */
    protected array $messages = [];

    /**
     * set attribute name
     *
     * @param string $attribute
     * @return static
     */
    protected function setAttribute(string $attribute): static
    {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * get attribute name
     *
     * @return string|null
     */
    public function attribute(): string|null
    {
        return __($this->attribute);
    }

    /**
     * add validation rule
     *
     * @param mixed $rule
     * @param array<mixed> $values
     * @return static
     */
    protected function addRule(mixed $rule, array $values = []): static
    {
        $valueString = implode(",", $values);

        $this->rules[] = empty($valueString) ? $rule : "{$rule}:{$valueString}";

        return $this;
    }

    /**
     * get validation rules
     *
     * @return array<mixed>
     */
    public function rules(): array
    {
        return $this->rules;
    }

    /**
     * add failed validation message
     *
     * @param string $rule
     * @param string $message
     * @return static
     */
    protected function addMessage(string $rule, string $message): static
    {
        $messageKey = "{$this->key}.{$rule}";

        $this->messages[$messageKey] = $message;

        return $this;
    }

    /**
     * get failed validation messages
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return $this->messages;
    }

    /*----------------------------------------*
     * Method
     *----------------------------------------*/

    /**
     * add validation rule and failed validation message
     *
     * @param string $ruleName
     * @param string|null $message
     * @param mixed $values
     * @param mixed $rule
     * @return static
     */
    protected function add(string $ruleName, string|null $message = null, mixed $values = [], mixed $rule = null): static
    {
        $addRule = is_null($rule) ? $ruleName : $rule;

        if (!is_array($values)) $values = [$values];

        $this->addRule($addRule, $values);

        if (!is_null($message)) $this->addMessage($ruleName, $message);

        return $this;
    }

    /**
     * add validation rule string and failed validation message
     *
     * @param string $rule
     * @param string|null $message
     * @param mixed $values
     * @return static
     */
    public function addString(string $rule, string|null $message = null, mixed $values = []): static
    {
        return $this->add($rule, $message, $values);
    }

    /**
     * add validation rule object and failed validation message
     *
     * @param string $ruleName
     * @param object $rule
     * @param string|null $message
     * @return static
     */
    public function addObject(string $ruleName, object $rule, string|null $message = null): static
    {
        return $this->add($ruleName, $message, rule: $rule);
    }
}
