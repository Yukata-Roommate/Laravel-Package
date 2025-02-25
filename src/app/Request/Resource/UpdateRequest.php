<?php

namespace YukataRm\Laravel\Request\Resource;

use YukataRm\Laravel\Request\BaseRequest;
use YukataRm\Laravel\Facade\Rules;

/**
 * Update Request
 *
 * @package YukataRm\Laravel\Request\Resource
 */
abstract class UpdateRequest extends BaseRequest
{
    /**
     * table name
     *
     * @var string
     */
    protected string $tableName;

    /**
     * set Validation array
     *
     * @return void
     */
    #[\Override]
    protected function setValidations(): void
    {
        parent::setValidations();

        $this->validations = array_merge(
            $this->validations,
            [
                Rules::required("id")->id($this->tableName),
            ]
        );
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
