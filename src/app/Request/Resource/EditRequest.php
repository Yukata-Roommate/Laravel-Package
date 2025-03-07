<?php

namespace YukataRm\Laravel\Request\Resource;

use YukataRm\Laravel\Request\BaseRequest;
use YukataRm\Laravel\Facade\Rules;

/**
 * Edit Request
 *
 * @package YukataRm\Laravel\Request\Resource
 */
abstract class EditRequest extends BaseRequest
{
    /**
     * table name
     *
     * @var string
     */
    protected string $tableName;

    /**
     * get Validation Rules array
     *
     * @return array<\YukataRm\Laravel\Interface\Validation\RulesInterface>
     */
    protected function validations(): array
    {
        return [
            Rules::required("id")->id($this->tableName),
        ];
    }

    /**
     * get additional data for validation
     *
     * @return array<string, mixed>
     */
    #[\Override]
    protected function additionalData(): array
    {
        $this->additionalData = array_merge(
            $this->additionalData,
            ["id"]
        );

        return parent::additionalData();
    }
}
